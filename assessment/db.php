<?php
if(isset($_POST['function']))
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "mobile";
  $table = "product";

  $conn = "";

  if($_POST['function'] == 1)
  {


    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
      echo json_encode(array('status'=> '1','message'=> 'Kindly check the database connectivity on "db.php" file'));
      die;
    }

    if(!$conn->query('use '.$db))
    {
      // Create database
      $sql = "CREATE DATABASE ".$db;
      if ($conn->query($sql) === FALSE) {
        echo json_encode(array('status'=> '1','message'=> "Can't able to create database"));
        die;
      }
    }
    $conn->close();

    //connecting database
    $conn = new mysqli($servername,$username,$password,$db);

    if ($conn->connect_error) {
      echo json_encode(array('status'=> '1','message'=> "Connection failed: " . $conn->connect_error));
      die;
    }

    $query = "CREATE TABLE $table (
                              id int(11) AUTO_INCREMENT,
                              name varchar(255) NOT NULL,
                              address varchar(255) NOT NULL,
                              phone varchar(255) NOT NULL,
                              product varchar(255) NOT NULL,
                              price int(5) NOT NULL,
                              brand varchar(255) NOT NULL,
                              type varchar(255) NOT NULL,
                              status varchar(255) NOT NULL,
                              PRIMARY KEY  (id)
                              )";


        // Create Tabele
        $table_exists = "select 1 from $table LIMIT 1";
      if ($conn->query($table_exists) === FALSE) {
        if ($conn->query($query) === FALSE) {
          echo json_encode(array('status'=> '1','message'=> "Connection failed: " . $conn->connect_error));
          die;
        }
      }

      //inserting initial dataType
      $sql_key = "SELECT * FROM $table ";
      $result = $conn->query($sql_key);

      if ($result->num_rows == 0) {

        $insert_query .= "insert into $table (name,address,phone,product,brand,price,type,status) values ('abc','xyz street,xyz','1234567878','boat rockerz 255','Boat','1200','new','0');";
        $insert_query .= "insert into $table (name,address,phone,product,brand,price,type,status) values ('abc','xyz street,xyz','1234567878','boat rockerz 235','Boat','1200','new','0');";
        $insert_query .= "insert into $table (name,address,phone,product,brand,price,type,status) values ('abc','xyz street,xyz','1234567878','boat rockerz 255 V2','Boat','1200','new','0');";
        $insert_query .= "insert into $table (name,address,phone,product,brand,price,type,status) values ('abc','xyz street,xyz','1234567878','boat rockerz 335','Boat','1700','new','0');";

        if ($conn->multi_query($insert_query) === FALSE) {
          echo json_encode(array('status' => 1,'message' => $conn->error));
        }
    }



   echo json_encode(array('status'=> '0','message' => 'Database and table Created'));
  }

  if($_POST['function'] == 2)
  {

    $conn = new mysqli($servername,$username,$password,$db);
    $sql_key = "SELECT * FROM $table where status = 0 order by CAST(".$_POST['sort_by'] ." as UNSIGNED ) ". $_POST['sort_order'];
    // print_r($sql_key);die;
    $result = $conn->query($sql_key);
    $html_con = '';


    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        $html_con .= '<div class="col-lg-3 panel panel-default" style="margin-left : 7%;padding: unset;">'
        .'<div class="panel-heading">'.$row["product"].'</div>'
        .'<div class="panel-body">'
        .'<div class="card-text">'
        .'<p>Brand : '.$row["brand"].' </p><p> Price : '.$row["price"].'</p>'
        .'<p>Type : '.$row["type"].'</p><hr>'
        .'<p>Seller : '.$row["name"].'</p>'
        .'<p>Addr : '.$row["address"].'</p>'
        .'<p>Phn : '.$row["phone"].'</p>'
        .'</div></div></div>';
      }

    }
    echo json_encode(array('status' => 1,'html_content' => $html_con));
  }

  if($_POST['function'] == 3)
  {

        $conn = new mysqli($servername,$username,$password,$db);
    $insert_query = "insert into $table (name,address,phone,product,brand,price,type,status) values ('".$_POST['name']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['product']."','".$_POST['brand']."','".$_POST['price']."','".$_POST['type']."','0')";
    if ($conn->query($insert_query) === FALSE) {
      echo json_encode(array('status' => 1,'message' => $conn->error));
    }else{
      echo json_encode(array('status' => 0,'message' => 'Ad has been posted successfully'));
    }
  }



}

?>
