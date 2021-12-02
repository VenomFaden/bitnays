<?php
$conn = new mysqli("localhost", "root", "", "dbtest");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$passw = $fname = "";
if(!empty($_POST['fname'] ))
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
else {
  echo "<script>alert('Girdi Boş Olamaz!');</script>";
}

if(!empty($_POST['passw']))
  $passw = mysqli_real_escape_string($conn, $_POST['passw']);
else {
  echo "<script>alert('Girdi Boş Olamaz!');</script>";
}

$sql = "SELECT id, fname, passw FROM uyeler WHERE fname='$fname' ";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    //echo "<br> id: ". $row["id"]. " - Name: ". $row["fname"]. " " . $row["passw"] . "<br>";
    if( $passw != $row["passw"] || $fname != $row["fname"] )    
    {
    echo "<script>alert('Bilgiler Yanlış');</script>";    
    $error="abc";
    } 
    else
    {
      header("Location: anasayfa.php");

    }
                                       }
  }  
  else {
  //  echo "0 results";
  }
