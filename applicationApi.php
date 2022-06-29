<?php 
	header("Allow-Access-Control-Origin: *");
	header("Content-Type: application/json; charset: UTF-8");
	header("Access-Control-Allow-Methods: POST");
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "EWU_DB";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$p = JSON_Decode(file_get_contents("php://input"));
	$id= $p->studentId;
	$sql = "SELECT * FROM application where studentId='$id'";
//	$sql = "SELECT * FROM person WHERE FirstName='Peter'";
	$result = mysqli_query($conn, $sql);
	$persons = array();

	if (mysqli_num_rows($result)> 0) {
		
		while($row = mysqli_fetch_assoc($result)) {
		   	$person = array(
			   	"studentId" => $row["studentId"],
			   	"fullName" => $row["fullName"],
			   	"email" => $row["email"],
				"dob" => $row["dob"],
				"cgpa" => $row["cgpa"],
				"phoneNo" => $row["phoneNo"]
		   	);
		   	array_push($persons, $person); 
		}
	} else {
		echo "0 results";
	}
	
	mysqli_close($conn);
	
	http_response_code(200);
	echo json_encode($persons);
?>