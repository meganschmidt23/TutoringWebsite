<?php 

$fullName = $_POST['fullName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$prefContact = $_POST['prefContact'];

function newContactRequest($fullName, $phoneNumber, $email, $subject, $message, $prefContact){
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
		echo "New record created successfully";
		echo "Thank you for your submission.";
		echo "Someone will contact you within 24 hours.";
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}	

newContactRequest($fullName, $phoneNumber, $email, $subject, $message, $prefContact)

?>