<?php
	if (isset($_POST["submit"])) {
		$name = $_POST["name"];
		$username = $_POST["username"];                   
		$password = $_POST["password"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$photo = "upload/avatar.jpg";   
        
		$sql2_u= mysqli_query($link,"select * from lib_registration where username= '$username'");
        $sql2_e= mysqli_query($link,"select * from lib_registration where email= '$email'");
        $sql2_p= mysqli_query($link,"select * from lib_registration where phone= '$phone'");
	
        if(mysqli_num_rows($sql2_u) > 0){
			$error_uname = "Username already exists";
		}
        elseif(mysqli_num_rows($sql2_e) > 0){
            $error_email = "Email already exists";
        }
		elseif(mysqli_num_rows($sql2_p) > 0){
            $error_phone = "Phone number already registered";
        }
        elseif(strlen($username) < 6){
            $error_ua ="<b>Username too short !</b> <span>Your username must be 6-10 character </span>";
        }
		elseif(strlen($username) > 10){
            $error_ua ="<b>Username too big !</b> <span>Your username must be 6-10 character </span>";
        }
		elseif (filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
			$e_msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Valid</div>";
		} 
		else{
		    $insert = mysqli_query($link, "insert into lib_registration values('','$name','$username','$password','$email','$phone','$address','$photo')");
		}	
	}

