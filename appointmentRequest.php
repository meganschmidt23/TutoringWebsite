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

	$sql = "INSERT INTO TutoringWebsiteAppointmentRequest (ReqMonth, ReqDate, ReqTime, Subject, TutorPref, FullName, PhoneNumber, Email) VALUES ('$month', '$day', '$times', '$subject', '$tutorPref', '$fullName', '$phoneNumber', '$email');";

    if ($conn->query($sql) === TRUE) {
		echo "Thank you for your submission. ";
		echo "Someone will contact you within 24 hours. ";
		if ($confEmail == 'Yes') {
			$subject = "Appointment Request Confirmation";
			$message = "You have submitted a request for the following time(s): " + $month + $day + $times;
			mail($email,$subject,$message);
		}
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}	

newApptReq($month, $day, $times, $subject, $tutorPref, $fullName, $email, $phoneNumber, $confEmail)

?>