<?php

if(isset($_POST['input_string']))
{

$str = $_POST['input_string'];

$value = explode("??",$str);
$nu = array();

if(!empty($value))
{
  $cnt_arr = count($value);
  for($k = 0;$k<$cnt_arr;$k++)
  {
    $string = $value[$k];
  for ($i = 0; $i <= strlen($string)-1; $i++) {
    if(is_numeric($string[$i]))  {
      array_push($nu,$string[$i]);
      }
    }
  }

  // print_r($nu);
  $val = 0;
  for($j = 0;$j<count($nu);$j+2)
  {
    $sum = $nu[$j] + $nu[$j+1];
    if($sum != 12)
    {
      ++$val; break;
    }
  }
  if($val ==0 )
  {
    echo "True" ;die;
  }else{
    echo "False";die;
  }
}else{
  echo 'False';
}


}


?>


<html>
<head>
<title> PHP - Assessment </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>

</head>
<body>

  <div class="container row" style="margin-top: 1%;">
    <div class="col-md-12">
      <div class='panel panel-default' style="margin-left: 5%;">
        <div class="panel-heading">
          Assessment 1
        </div>
        <div class="panel-body">
         <h5 > TO <?php echo strtoupper('check if there are exactly 2 question marks between every pair of two numbers'); ?> </h5>
         <hr>
         <form method="post" action="<?=$_SERVER['PHP_SELF']?>" >
         <div class="form-inline col-md-12" style="margin-left : 15%">
           <div class="form-group">
              <label for="pwd">Enter string to find the if it is satisfy the given criteria :</label>
              <input type="text" name='input_string' placeholder='Enter string' id="input_string" class="form-control">
            </div>

            <button type='submit' class="btn btn-primary" >Submit</button>
         </div>
       </form>
        </div>
      </div>
    </div>
    </div>

</body>
</html>
