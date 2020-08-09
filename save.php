<?php
              // define variables and set to empty values
              $fullName = $phoneNumber = $email = $subject = $message = $prefContact = "";
              $nameErr = $phoneOrEmailErr = $subjErr = $messageErr = "";

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  if (empty($_POST["fullName"])) {
                      $nameErr = "Full name is required";
                    } else {
                      $fullName = test_input($_POST["fullName"]);
                      // check if name only contains letters and whitespace
                      if (!preg_match("/^[a-zA-Z ]*$/",$fullName)) {
                          $nameErr = "Only letters and white space allowed"; 
                      }
                    }
                  if (empty($_POST["phoneNumber"])&& empty($_POST["email"])) {
                      $phoneOrEmailErr = "Phone and/or Email is required";
                    } else {
                      $phoneNumber = test_input($_POST["phoneNumber"]);
                      if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNumber)) {
                          // $phone format is invalid
                          $phoneOrEmailErr = "Invalid format of phone/email input";
                        }
                      $email = test_input($_POST["email"]);
                        // check if e-mail address is well-formed
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                              $phoneOrEmailErr = "Invalid format of phone/email input"; 
                          }
                    }
                  if ($_POST["subject"] = "Select Option") {
                      $subjErr = "Subject is required";
                    } else {
                      $subject = test_input($_POST["subject"]);

                    } 
                    if (empty($_POST["message"])) {
                      $messageErr = "A quick message about your request is required";
                    } else {
                      $message = test_input($_POST["message"]);
                      if (!preg_match("/^[a-zA-Z ]*$/",$message)) {
                          $messageErr = "Only letters and white space allowed"; 
                      }
                    }     
                    if (empty($_POST["prefContact"])) {
                      $prefContact = "";
                    } else {
                      $prefContact = test_input($_POST["prefContact"]);
                    }
              }  

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
?>  