<html>
<head>
<meta http-equiv="refresh" content="30">
</head>
<body>


<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "nss";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if($conn->connect_error) {
	die("connection failed :" . $conn->connect_error);
}


$username=$_GET['username'];
$password=$_GET['pass'];
$sql= "SELECT * FROM `login` WHERE username='$username' and password='$password' ";
$result=$conn->query($sql);
$number=$result->num_rows;
	echo $number;

if($number=="1"){
	 $conn->close();
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if($conn->connect_error) {
	die("connection failed :" . $conn->connect_error);
}
$sql = "SELECT * FROM `nssapplication` ORDER BY slno ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		$search=$row["student_id"];

    echo "<table border='2'>
      <tr>
        <th>Name Of Student</th>
        <th>Class</th>
        <th>Name of Parent</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Allotement number</th>

        <th>Token/Admission Number</th>

      </tr>
      <tr>
        <td>".$row["name"]."</td>
        <td>".$row["class"]."</td>
        <td>".$row["parent"]."</td>
        <td>".$row["address"]."</td>
        <td>".$row["contact"]."</td>
        <td>".$row["allotno"]."</td>

        <td>".$row["student_id"]."</td>

      </tr>
    </table>";
  };

} else {
  echo "0 results";
}
$conn->close();}
else {
	echo "<center><b><br><br><br><br><br><br><br><br><font size='50' color='red'>പോടാ പന്ന പൂറീ മോനെ</font></b></center>";
}



 ?>
</body>
</html>
