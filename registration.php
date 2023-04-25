<?php  include "includes/db.php"; ?>
<?php  include_once "includes/header.php" ;?>
<?php  include_once "features/functions.php"; ?>

<?php 

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];



			if (email_exists($email)){

				message_echo_navigation("warning", "Email exists!", 
				"Please enter a different email address!");
				
				redirect("1","includes/register_page.php");


			}

			if (username_exists($username)){

				message_echo_navigation("warning", "Username exists!", 
				"Please enter a different username!");
				
				redirect("1","includes/register_page.php");


			}

			// Generate a unique verification token
			$token = hash('sha256', uniqid());

			register_user($username, $email, $password, $first_name, $last_name, $token);

			send_email_verification($email, $token);

			if (is_email_verified($email)){

				login_user($username, $password);

				message_echo_navigation("success", "Well done!", "You have successfully registered");

				redirect("2","index.php");
			}

			else{

				message_echo_navigation("warning", "Verfication is waiting.", "A verification email has been sent to your email address.");

			}
			






?>
