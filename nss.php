<?php
$token_id=filter_input(INPUT_POST, 'token');
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="hssallot";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if($conn->connect_error){
  die("connection failed :" . $conn->connect_error);

}
$sql="SELECT * FROM `crowd` WHERE Student_id='$token_id' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row["name"];
$address=$row["address"];
$parent=$row["parent"];
$contact=$row["contact"];
$allotno=$row["allotno"];
$class=$row["class"];
$student_id=$row["student_id"];
$admtype=$row["admissiontype"];
$conn->close();
if($admtype=="Permenent"){
$dbname="nss";
$conn= new mysqli ($host, $dbusername, $dbpassword, $dbname);
$sql= "INSERT INTO nssapplication (allotno, name, address, contact, parent, class, student_id)
values ('$allotno' , '$name' , '$address' , '$contact' , '$parent' , '$class', '$student_id'    )";
if($conn->query($sql)){
  echo "new record inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;}
$conn->close();}
elseif ($admtype=="Temporory"){
  echo "You Have A TEMPORORY Admission";
}
else{echo "You Have <h1><font color='red'> NO </font></h3> Admission in This School";}

 ?>
