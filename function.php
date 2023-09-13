<?php
$conn = mysqli_connect("localhost", "root", "", "task1Form");

if(isset($_POST["action"])){
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];
  mysqli_query($conn, "DELETE FROM `task_details` WHERE id = $id");
  echo 1;
}
