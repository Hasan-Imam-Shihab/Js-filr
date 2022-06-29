<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
</head>
<body>
	<table align="center" border="2" width="80" >
		<tr>
			<td>
	<h3>Scholarship Application Form</h3>
	<h5>*denotes mandatory field<h5>
	<form id="applicationForm" method="post" name="myform">
		<label>Student Id*</label>
		<input type="text" name="studentId"/>
		<label>Full Name*</label>
		<input type="text" name="fullName"/>
		<label>Email Address*</label>
		<input type="text" name="email"/>
		<label>Date of Birth*</label>
		<input type="datetime" name="dob"/>
		<label>CGPA*</label>
		<input type="text" name="cgpa"/>
		<label>Phone No.*</label>
		<input type="text" name="phoneNo"/>
		<input type="submit" onclick="validate()" />
	</form>
			</td>
		</tr>
	<table>
		<script>
			function validate() {
				var studentId = document.forms["myform"]["studentId"].value;
				var fullName = document.forms["myform"]["fullName"].value;
				var email = document.forms["myform"]["email"].value;
				var dob = document.forms["myform"]["dob"].value;
				var cgpa = document.forms["myform"]["cgpa"].value;
				var phoneNo = document.forms["myform"]["phoneNo"].value;
			}
		</script>
	</body>
</html>

