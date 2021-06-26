<?php
$allotno = filter_input(INPUT_POST, 'allotno');
$token_id = filter_input(INPUT_POST, 'token_id');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$contact = filter_input(INPUT_POST, 'contact');
$parent = filter_input(INPUT_POST, 'parent');
$class = filter_input(INPUT_POST, 'class');
$adt = filter_input(INPUT_POST, 'adt');
if (!empty($allotno)){
if (!empty($token_id)){
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
$sql = "INSERT INTO crowd (allotno, token_id,name,address,contact,parent,class,admissiontype)
values ('$allotno','$token_id','$name','$address','$contact','$parent','$class','$adt')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hssallot";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if($conn->connect_error) {
	die("connection failed :" . $conn->connect_error);
}
$sql = "SELECT Student_id,name FROM `crowd`
WHERE allotno='$allotno' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br><br><br><center><b><font size='60' color='red'> token number: <br>" . $row["Student_id"]."<br>name : <br>" . $row["name"]. "<br> </b></font></center>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
