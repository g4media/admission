<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hssallot";
$adt = filter_input(INPUT_POST, 'adt');
$student_id=filter_input(INPUT_POST, 'student_id');
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if($conn->connect_error) {
	die("connection failed :" . $conn->connect_error);
}
$sql = "UPDATE `crowd`
SET admissiontype='$adt'
WHERE student_id='$student_id' ";

if ($conn->query($sql)){
echo "New record is inserted sucessfully";

}
$conn->close();


 ?>
