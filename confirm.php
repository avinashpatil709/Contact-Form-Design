<?php
	session_start();
	if($_REQUEST["captcha_code"]==$_SESSION["captcha_code"]){
		$name =  $_REQUEST['name'];
		$email =  $_REQUEST['email'];
		$subject =  $_REQUEST['subject'];
		$content =  $_REQUEST['content'];
		$domain = $_SERVER['SERVER_NAME'];
		$ch = curl_init();
		$url = "https://bbmanage.codemskyapp.com/warmupAPI/InsertResponse.php";
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, true);
      	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&email=$email&subject=$subject&content=$content&src=$domain");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec ($ch);
		curl_close ($ch);
		echo "success";
		exit(1);
	} else{
		echo $error_message = "error";exit;
	}
?> 