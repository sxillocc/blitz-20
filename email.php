<?php
	if($_GET['en1'] && $_GET['en1']){
		$colid = decryptIt($_GET['en1']);
		$table = decryptIt($_GET['en2']);
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "blitzchlag20";
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_error().')'.mysqli_connect_error());
		}
		else{
			$sql = "SELECT * FROM `" . $table . "` WHERE colid = '$colid'";
			if ($conn->query($sql)) {
				echo '<script language="javascript">';
				echo 'alert("Blitzchlag20.0"+ "\n"  +  "Your email is verified successfully"); window.location.href = "index.html"';
				echo '</script>';
			}
			
			else{
				echo "Error: ". $sql ."<br>". $conn->error;
				echo $table."<br>".$colid;
			}
			/*
			else{
				echo '<script language="javascript">';
				echo 'alert("Blitzchlag20.0")';
				echo 'alert("Already verified")';
				echo '</script>';
			}*/   
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Blitzchlag20.0"+ "\n"  +  "Please fill the registration form"); window.location.href = "index.html"';
		echo '</script>';
	}	
	function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
?>