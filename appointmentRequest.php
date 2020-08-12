<?php 

$month = $_POST['month'];
$day = $_POST['day'];
$times = $_POST['times'];
$subject = $_POST['subject'];
$tutorPref = $_POST['tutorPref'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$confEmail = $_POST['confEmail'];

function newApptReq($month, $day, $times, $subject, $tutorPref, $fullName, $email, $phoneNumber, $confEmail){
	/*Database INFO*/
	$servername="localhost";
	$username="schmidtm6";
	$password="3mpshh";
	$dbname="schmidtm6_db";

    
	//Create connection
	$conn=new mysqli($servername, $username, $password, $dbname);
	//Check connection
	if($conn->connect_error){
		die("Connection failed: " .$conn->connect_error);
	}

	$sql = "INSERT INTO TutoringWebsiteContactPage (FullName, PhoneNumber, Email, Subject, Message, PrefContact) VALUES ('$fullName', '$phoneNumber', '$email', '$subject', '$message', '$prefContact');";

    if ($conn->query($sql) === TRUE) {
		echo "Thank you for your submission. ";
		echo "Someone will contact you within 24 hours. ";
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}	

newContactRequest($fullName, $phoneNumber, $email, $subject, $message, $prefContact)

?>