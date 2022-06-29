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



$studentId = $fullName = $email = $dob = $cgpa = $phoneNo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$studentId = test_input($_POST["studentId"]);
	$fullName = test_input($_POST["fullName"]);
	$email = test_input($_POST["email"]);
	$dob = test_input($_POST["dob"]);
	$cgpa = test_input($_POST["cgpa"]);
	$phoneNo = test_input($_POST["phoneNo"]);


	if (preg_match("/\d{3}-\d{2}-\d{4}-(A|B)/", $studentId)) {
			
	} else {
		echo 'Student Id Does not match';
		return ;
	}
	if (preg_match("/([a-zA-Z]{1,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]?\s?[a-zA-Z]?)/", $fullName)) {
		if(strlen($fullName)<10 or strlen($fullName)>30)
		{
		echo 'Name Does not match';
		return ;
		}
		
	} else {
		
		echo 'Name Does not match';
		return ;
	}
	if (preg_match("/(ewubd\.edu)\b/", $email)) {
		
	} else {
		echo 'Email Does not match';
		return ;
	}if (preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])\/((0[1-9])|(1(0|1|2)))\/2\d{3}/", $dob)) {
		
	} else {
		echo 'Date of Birth Does not match';
		return ;
	}if (preg_match("/\b[123].(([0-8]\d)|[0-8])\b/", $cgpa)) {
		
	} else {
		echo 'CGPA Does not match';
		return ;
	}if (preg_match("/(^(\+88017|\+88019|\+88016|\+88013|\+88014)\d{8})|(^(|017|019|013|014 )\d{10})/", $phoneNo)) {
		
	} else {
		echo 'Phone number Does not match';
		return ;
	}
	

	$qurry = "insert into application (studentId,fullName,email,dob,cgpa,phoneNo) values ('$studentId','$fullName','$email','$dob','$cgpa','$phoneNo')";



	$is_insert = $conn->query($qurry) === TRUE;

	if ($is_insert) {
		echo "done";
	}
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



?>


<!DOCTYPE html>
<html>

<head>
	<title>Application</title>
</head>

<body>
	<table align="center" border="2" width="80">
		<tr>
			<td>
				<h3>Scholarship Application Form</h3>
				<h5>*denotes mandatory field<h5>
						<form id="applicationForm" method="post" name="myform" onsubmit="validate(event)">
							<label>Student Id*</label>
							<input type="text" name="studentId" />
							<label>Full Name*</label>
							<input type="text" name="fullName" />
							<label>Email Address*</label>
							<input type="text" name="email" />
							<label>Date of Birth*</label>
							<input type="datetime" name="dob" />
							<label>CGPA*</label>
							<input type="text" name="cgpa" />
							<label>Phone No.*</label>
							<input type="text" name="phoneNo" />
							<input type="submit" name="submit" />
						</form>
			</td>
		</tr>
		<table>
			<script>
				function validate(event) {
					var studentId = document.forms["myform"]["studentId"].value;
					var fullName = document.forms["myform"]["fullName"].value;
					var email = document.forms["myform"]["email"].value;
					var dob = document.forms["myform"]["dob"].value;
					var cgpa = document.forms["myform"]["cgpa"].value;
					var phoneNo = document.forms["myform"]["phoneNo"].value;
					
					var re = /\d{3}-\d{2}-\d{4}-(A|B)/g;

					if (studentId.match(re) == null) {
						alert("id not match");
						event.preventDefault();

					}
					re = /([a-zA-Z]{1,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]?\s?[a-zA-Z]?)/g;
					if (fullName.match(re) == null || fullName.length<10 || fullName.length>30) {
						alert("fullName not match");

						event.preventDefault();
					}
					re = /(ewubd\.edu)\b/g;

					if (email.match(re) == null) {
						alert("email not match");
						event.preventDefault();

					}
					re = /(0[1-9]|[1-2][0-9]|3[0-1])\/((0[1-9])|(1(0|1|2)))\/2\d{3}/g;


					if (dob.match(re) == null) {
						alert("dob not match");
						event.preventDefault();

					}

					re = /\b[123].(([0-8]\d)|[0-8])\b/g;
					if (cgpa.match(re) == null) {
						alert("cgpa not match");

						event.preventDefault();
					}

					re = /(^(\+88017|\+88019|\+88016|\+88013|\+88014)\d{8})|(^(|017|019|013|014 )\d{10})/g;
					if (phoneNo.match(re) == null) {
						alert("phoneNo not match");

						event.preventDefault();
					}



				}
			</script>
</body>

</html>