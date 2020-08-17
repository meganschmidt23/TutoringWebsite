<?php 

$month = $_POST['month'];
$days = implode(",", $_POST['day']);
$times = implode(",", $_POST['times']);
$subject = $_POST['subject'];
$tutorPref = $_POST['tutorPref'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$confEmail = $_POST['confEmail'];
 

function newApptReq($month, $days, $times, $subject, $tutorPref, $fullName, $email, $phoneNumber, $confEmail){
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

	$sql = "INSERT INTO TutoringWebsiteAppointmentRequest (ReqMonth, ReqDate, ReqTime, Subject, TutorPref, FullName, PhoneNumber, Email) VALUES ('$month', '$days', '$times', '$subject', '$tutorPref', '$fullName', '$phoneNumber', '$email');";

    if ($conn->query($sql) === TRUE) {
		echo "Thank you for your submission. ";
		echo "Someone will contact you within 24 hours. ";
		if ($confEmail == "Yes") {
			$message = 'Thank you for submitting an apppointment request. Please allow a few hours for us to confirm your appointment. Sincerely, The Math Tutors';
			$message = wordwrap($message,70); 
			mail($email, "Appointment Request Confirmation", $message, 'From: the.np.math.tutors@gmail.com');
		}
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}	

newApptReq($month, $days, $times, $subject, $tutorPref, $fullName, $email, $phoneNumber, $confEmail)

?>