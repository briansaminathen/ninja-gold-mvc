<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_money extends CI_Controller {

	// we are declaring and initializing our variables here
	protected $gold_count = 0;
	protected $activity = array();

	public function __construct() 
	{

	parent::__construct();

	// we are creating a session variable called gold_count which we set to gold_count
	$this->gold_count = $this->session->userdata('gold_count'); 
	$this->activity = $this->session->userdata('activity');
	}

	
	public function index()
	{
		// this is the first method that will get called anytime our process_money controller gets 
		$this->load->view('display');

	}

	public function process()
	{
		// we are storing the post global variable in a variable called $post_data
		$post_data = $this->input->post();

		if(isset($post_data['action']) && $post_data['action'] == 'restart_form')
		{
			// this will check to see if the submit button is initialized and if
			// the name attribute equals to 'restart_form'. If it is, it will remove
			// all sessions and redirect back to th base_url()
			$this->session->sess_destroy();
			// by doing a redirect base url it will create a new HTTP request which is sent
			// to your index.php
			redirect(base_url());
		}

		if(!$this->gold_count)
		{
			$this->session->set_userdata('gold_count', 0);
		}

		if(isset($post_data['building']))
		{
			$building = $post_data['building'];
			$gold_count = 0;
			$message = '';

			if($building == 'farm')
			{
				$gold_count = rand(10, 20);
			} 
			elseif ($building == 'cave') 
			{
				$gold_count = rand(5, 10);
			}
			elseif ($building == 'house') {
				$gold_count = rand(2, 5);
			}
			elseif ($building == 'casino') {
				$gold_count = rand(-40, -1);
			}
			else
            {
                $percent = rand(0, 100);

                if ($percent <= 70)
                {
                    $gold_count = rand(-50, -1);
                    $message = "Ouch";
                }
                else
                {
                    $gold_count = rand(1, 50);
                    $message = "Nice!"  ;
                }
            }

		}

		

		if($this->activity != false)
		{
			$this->activity = $this->session->userdata('activity');
		}

		$this->activity[] = 'You entered a ' . $building . ' and earned ' . $gold_count . ' golds .
            ' . (($building == 'casino') ? '... '. $message .'. ' : '') .
								' (' . date('M d, Y h:ia') . ')';

		$gold_count += $this->session->userdata('gold_count');
		$this->session->set_userdata('gold_count', $gold_count);
		$this->session->set_userdata('activity', $this->activity);
		redirect(base_url());

	}
}