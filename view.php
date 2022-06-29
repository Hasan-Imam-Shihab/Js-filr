<!DOCTYPE html>
<html>
<head>

</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "EWU_DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM application where cgpa>3.02 ORDER BY cgpa DESC";
$result = mysqli_query($conn, $sql);

echo "<table id='myTable' border='1' >";
echo "<tr>";
echo "<th>studentId</th><th>fullName</th><th>email</th><th>dob</th><th>cgpa</th><th>phoneNo</th>";
echo "</tr>";


if (mysqli_num_rows($result) >=20) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td>" . $row['studentId'] . "</td>";
			//echo "<td>" . $row['pwd'] . "</td>";
			echo "<td>" . $row['fullName'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['dob'] . "</td>";
			echo "<td>" . $row['cgpa'] . "</td>";
			echo "<td>" . $row['phoneNo'] . "</td>";
			
			echo "</tr>";

    }
} else {
    echo "Need more tuples in the table";
}

echo "</table>";


mysqli_close($conn);




?>

</body>
</html>