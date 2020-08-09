<?php 
function post_contactForm($fullName, $phoneNumber, $email, $subject, $message, $prefContact)
{
	/*Database INFO*/
	$servername="localhost";
	$username="schmidtm6";
	$password="3mpshh";
	$dbname="schmidtm6_db";
	$fullName = $fullName;
	$phoneNumber = $phoneNumber;
	$email = $email;
	$subject = $subject;
	$message = $message;
	$prefContact = $prefContact;
    
	//Create connection
	$conn=new mysqli($servername, $username, $password, $dbname);
	//Check connection
	if($conn->connect_error){
		die("Connection failed: " .$conn->connect_error);
	}

	$sql = "INSERT INTO TutoringWebsiteContactPage 
    (FullName, PhoneNumber, Email, Subject, Message, PrefContact)
    VALUES ($fullName, $phoneNumber, $email, $subject, $message, $prefContact)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
}

print "Thank you for your submission, ";$name ;
print "Someone will contact you using your ";$prefContact;" within 24 hours.";

?>