<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Ninja Gold - MVC</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

 </head>
 <body>
  <div class='container'>
   <div class='row'>
    <h1>
        <span>Your Gold:</span>
        <input type="text" value="<?php echo $this->session->userdata('gold_count') ?>  " disabled>
    </h1>
   </div>

   <div class='row'>

    <div class='col-md-3'>
    <p>Farm</p>
    <p>Earn 10-20</p>
    <form action='/process_money/process' method='post'>
     <input type='hidden' name='building' value='farm'>
     <button class='btn btn-success' value="Find Gold">Find Gold</button>
    </form>
   </div>

   <div class='col-md-3'>
   <p>Cave</p>
   <p>Earn 5-10</p>
   <form action='/process_money/process' method='post'>
    <input type='hidden' name='building' value='cave'>
    <button class='btn btn-success'>Find Gold</button>
   </form>
  </div>

  <div class='col-md-3'>
  <p>House</p>
  <p>Earn 2-5</p>
  <form action='/process_money/process' method='post'>
   <input type='hidden' name='building' value='house'>
   <button class='btn btn-success'>Find Gold</button>
  </form>
 </div>

 <div class='col-md-3'>
 <p>Casino</p>
 <p>Earn/lose 0-50</p>
 <form action='/process_money/process' method='post'>
  <input type='hidden' name='building' value='casino'>
  <button class='btn btn-success'>Find Gold</button>
 </form>
</div>


   </div>

   <hr>

   <div class='row' style='border: 2px solid black; height:300px; overflow: scroll'>
    <?php if($this->session->userdata('activity'))
    {
      foreach ($this->session->userdata('activity') as $activity) {
        echo $activity . "<br>";
      }
    }
    ?>

   </div>

   <div class='col-md-3'>
    <form action='/process_money/process' method='post'>
     <input type='hidden' name='action' value='restart_form'>
     <button class='btn btn-primary' value="Find Gold">Start Over</button>
    </form>
   </div>



  </div>

 </body>
</html>
