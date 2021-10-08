<?php
 include('dbConnection.php');
  // stripslashes function can be used to clean up data retrieved from a database or from an HTML form.

  // php://input - This is a read-only stream that allows us to read raw data from the request body. It returns all the raw data after the HTTP-headers of the request, regardless of the content type

  // json_decode - It takes JSON string and converts it into a PHP object or array, if true then associative array

  $data = stripslashes(file_get_contents("php://input"));
  $mydata = json_decode($data, true);
  $id = $mydata['id'];
  $name = $mydata['name'];
  $email = $mydata['email'];
  $password = $mydata['password'];

  // Insert Data
  // if(!empty($name) && !empty($email) && !empty($password)){
  //   $sql = "INSERT INTO student(name, email, password) VALUES('$name', '$email', '$password')";
  //   if($conn->query($sql) == TRUE){
  //     echo "Student Saved Successfully";
  //   } else {
  //     echo "Unable to Save Student";
  //   }
  // } else {
  //   echo "Fill All Fields";
  // }

  // Insert or Update Data
  if(!empty($name) && !empty($email) && !empty($password)){
    $sql = "INSERT INTO student(id, name, email, password) VALUES('$id', '$name', '$email', '$password') ON DUPLICATE KEY UPDATE name= '$name', email = '$email', password = '$password' ";

    if($conn->query($sql) == TRUE){
      echo "Student Saved Successfully";
    } else {
      echo "Unable to Save Student";
    }
  } else {
    echo "Fill All Fields";
  }

?>