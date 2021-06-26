<?php

$token_no=filter_input(INPUT_POST, 'token');
if (!empty($token_no)){
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "hssallot";
  // Create connection
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
  . mysqli_connect_error());
  }
else{
  $sql = "SELECT * FROM `crowd`
  WHERE Student_id='$token_no'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $admission=$row["admissiontype"];
      if($admission=='Permenent'){
      echo "
<center>
      <h1>GMBHSS Haripad</h1>
      <h2>Identity Card</h2>
      <table>
        <tr>
          <th>Name</th>
          <td>". $row["name"]."</td>
        </tr>
        <tr>
          <th>Class</th>
          <td>". $row["class"]."</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>". $row["address"]."</td>
        </tr>
        <tr>
          <th>Name Of Parent</th>
          <td>". $row["parent"]."</td>
        </tr>
        <tr>
          <th>Contact Number</th>
          <td>". $row["contact"]."</td>
        </tr>
        <tr>
          <th>Admission Number</th>
          <td>". $row["student_id"]."</td>
        </tr>
      </table>

    </center>

       ";} else{echo "You Have A Temporory Admission";}
    }
  } else {
    echo "No Student in This Token";
  }
}}
  $conn->close();
?>
