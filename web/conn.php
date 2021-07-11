<?php  
if (isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['mail'])&& isset($_POST['subject'])) {
	include 'connect.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$firstname = validate($_POST['firstname']);
	$lastname = validate($_POST['lastname']);
	$mail = validate($_POST['mail']);
	$subject = validate($_POST['subject']);

	if (empty($firstname) || empty($lastname)|| empty($mail)|| empty($subject)) {
		header("Location:mehndipage.html");
	}else {

		$sql = "INSERT INTO base(FIRST_NAME,LAST_NAME,EMAIL,FEEDBACK) VALUES('$firstname', '$lastname','$mail','$subject')";
		$res = mysqli_query($conn, $sql);
        header("Location: mehndipage.html");
	}

}else {
	header("Location: mehndipage.html");
}