<?php
	date_default_timezone_set('Etc/UTC');
	require 'PHPMailer/src/PHPMailer.php';
	require("PHPMailer/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true; 
	//--------------------------------------------------------//
    $mail->Username = "Your Email"; 
    $mail->Password = "Password"; 
	//-------------------------------------------------------//
	$name = filter_input(INPUT_POST, 'name');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = md5(filter_input(INPUT_POST, 'password'));
	$course = filter_input(INPUT_POST, 'course');
	$year = filter_input(INPUT_POST, 'year');
	$branch = filter_input(INPUT_POST, 'branch');
	$college = filter_input(INPUT_POST, 'college');
	$collegeName = filter_input(INPUT_POST, 'collegename');
	$colid = filter_input(INPUT_POST, 'colid');
	$city = filter_input(INPUT_POST, 'city');
	$accommondation = filter_input(INPUT_POST, 'accommondation');
	$register = filter_input(INPUT_POST, 'register');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
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
			$en1 = encryptIt($colid);
			if($college == "MNIT"){
				$table = "MNIT";
				$en2 = encryptIt($table);
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql = "INSERT INTO MNIT (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
					if($conn->query($sql)){
						//----------------------------------------------------------//
						$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
						//----------------------------------------------------------//
                        $mail->addAddress($email, $name); //
                        $mail->Subject = 'Successfull Registration'; 
                        $mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
                        if ($mail->send()) {
                            echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
                        } else {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
						
						echo"success";
						
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}		
				}
				else{
					$table = "MNIT";
					$en2 = encryptIt($table);
					$sql1 = "CREATE TABLE MNIT (colid varchar(20) PRIMARY KEY, name varchar(50), email varchar(40), phone varchar(10), password varchar(40), course varchar(40), year varchar(20), branch varchar(40), collegeName varchar(40), city varchar(40), accommondation varchar(40))";
					if($conn->query($sql1)){
						$sql = "INSERT INTO MNIT (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
						if($conn->query($sql)){
							//----------------------------------------------------------//
							$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
							//----------------------------------------------------------//
							$mail->addAddress($email, $name); //
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}";
							if ($mail->send()) {
								echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
							} else {
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql1 ."<br>". $conn->error;
					}	
				}	
					
			}
			else if($college == "IIIT Kota"){
				$table = "IIITK";
				$en2 = encryptIt($table);
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql = "INSERT INTO IIITK (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
					if($conn->query($sql)){
						//----------------------------------------------------------//
						$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
						//----------------------------------------------------------//
                        $mail->addAddress($email, $name); //
                        $mail->Subject = 'Successfull Registration'; 
                        $mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
						if ($mail->send()) {
                            echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
                        } else {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
						echo"success";
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}		
				}
				else{
					$table = "IIITK";
					$en2 = encryptIt($table);
					$sql1 = "CREATE TABLE IIITK (colid varchar(10) PRIMARY KEY, name varchar(50), email varchar(40), phone varchar(10), password varchar(40), course varchar(20), year varchar(20), branch varchar(40), collegeName varchar(40), city varchar(40), accommondation varchar(40))";
					if($conn->query($sql1)){
						$sql = "INSERT INTO IIITK (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
						if($conn->query($sql)){
							//----------------------------------------------------------//
							$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
							//----------------------------------------------------------//
							$mail->addAddress($email, $name); //
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
							if ($mail->send()) {
								echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
							} else {
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql1 ."<br>". $conn->error;
					}	
				}
			}
			else if($college == "NIT UK"){
				$table = "NITUK";
				$en2 = encryptIt($table);
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql = "INSERT INTO NITUK (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
					if($conn->query($sql)){
						//----------------------------------------------------------//
						$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
						//----------------------------------------------------------//
                        $mail->addAddress($email, $name); //
                        $mail->Subject = 'Successfull Registration'; 
                        $mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
						if ($mail->send()) {
                            echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
                        } else {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
						echo"success";
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}		
				}
				else{
					$table = "NITUK";
					$en2 = encryptIt($table);
					$sql1 = "CREATE TABLE NITUK (colid varchar(20) PRIMARY KEY, name varchar(50), email varchar(40), phone varchar(10), password varchar(40), course varchar(40), year varchar(20), branch varchar(40), collegeName varchar(40), city varchar(40), accommondation varchar(40))";
					if($conn->query($sql1)){
						$sql = "INSERT INTO NITUK (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
						if($conn->query($sql)){
							//----------------------------------------------------------//
							$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
							//----------------------------------------------------------//
							$mail->addAddress($email, $name); //
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
							if ($mail->send()) {
								echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
							} else {
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql1 ."<br>". $conn->error;
					}	
				}
			}
			else{
				$table = "otherCollage";
				$en2 = encryptIt($table);
				$college = $collegeName;
				if(($conn->query("SHOW TABLES LIKE '".$table."'"))->num_rows == 1){
					$sql = "INSERT INTO otherCollage (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
					if($conn->query($sql)){
						//----------------------------------------------------------//
						$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
						//----------------------------------------------------------//
                        $mail->addAddress($email, $name); //
                        $mail->Subject = 'Successfull Registration'; 
                        $mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
						if ($mail->send()) {
                            echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
                        } else {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
						echo"success";
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}		
				}
				else{
					$table = "otherCollage";
					$en2 = encryptIt($table);
					$sql1 = "CREATE TABLE otherCollage (colid varchar(20) PRIMARY KEY, name varchar(50), email varchar(40), phone varchar(10), password varchar(40), course varchar(40), year varchar(20), branch varchar(40), collegeName varchar(40), city varchar(40), accommondation varchar(40))";
					if($conn->query($sql1)){
						$sql = "INSERT INTO otherCollage (colid, name, email, phone, password, course, year, branch, collegeName, city, accommondation)
							values('$colid', '$name', '$email', '$phone', '$password', '$course', '$year', '$branch', '$college', '$city', 'accommondation');";
						if($conn->query($sql)){
							//----------------------------------------------------------//
							$mail->setFrom('sat.test1000@gmail.com', 'Blitzchlag'); 
							//----------------------------------------------------------//
							$mail->addAddress($email, $name); //
							$mail->Subject = 'Successfull Registration'; 
							$mail->Body = "Congratulation, {$name} \t\t\t\t\n Your are successfully registered in Blitzchlag20.0 \n verify your email http://localhost/blitz-20/email.php?en1={$en1}&en2={$en2}"; 
							if ($mail->send()) {
								echo "Congratulation, You are successfull registered in Blitzchlag20.0!";
							} else {
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							echo"success";
						}
						else{
							echo "Error: ". $sql ."<br>". $conn->error;
						}
					}
					else{
						echo "Error: ". $sql1 ."<br>". $conn->error;
					}	
				}
			}
		}
		$conn->close();
	}
	function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Blitzschlag'20 | MNIT Jaipur</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.html">
                <img src="images/trblitz3.png" alt="Homepage">
            </a>
        </div> <!-- end header-logo -->

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span></span></a>

            <div class="header-nav__content">
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                    <li><a class="smoothscroll"  href="#theme" title="services">Theme</a></li>
                    <li><a class="smoothscroll"  href="#events" title="works">Events</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                </ul>
                <ul class="header-nav__social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>

                </ul>

            </div>

        </nav>

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header>


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images/header.png" data-natural-width=3000 data-natural-height=2000 data-position-y=top>
        
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">
                <p>
                    <h2 style="font-family:'Girassol'">Get your ticket for Blitzschlag'20</h2><hr style="width: 47%;" color="black">
                        <form class="form" method="post" action="login.php">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Full Name <span class="mendatri-field">*</span></label>
                                <input type="text" class="form-control txtOnly" value="" placeholder="Enter your full name" required="" name="name">
                            </div>
                                </div>
    
                            </div>
                            <div class="row">
    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Email <span class="mendatri-field">*</span></label>
                                <input type="email" class="form-control" value="" name="email" placeholder="Enter your email address" required="">
                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Phone No <span class="mendatri-field">*</span></label>
                                <input type="text" class="form-control TxtNumbers" data-parsley-length="[10, 10]" data-parsley-error-message="Enter valid phone no" maxlength="10" placeholder="Enter your phone no" required="" name="phone" value="">
                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Password <span class="mendatri-field">*</span></label>
                                <input type="password" class="form-control" id="pass" placeholder="Enter your password" required="">
                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Confirm Password <span class="mendatri-field">*</span></label>
                                <input type="password" name="password" class="form-control" data-parsley-equalto="#pass" placeholder="Enter confirm password" required="">
                            </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Course</label>
                                <select class="form-control" name="course">
                                    <option>-Select Course-</option>
                                    <option value="B-Tech">B-Tech</option>
                                    <option value="B-Arch">B-Arch</option>
                                    <option value="PHD">PHD</option>
                                    <option value="M-Tech">M-Tech</option>
                                    <option value="M-Plan">M-Plan</option>
                                    <option value="OTHER">OTHER</option>
                                </select>
                            </div>
                                </div>
    
                                <div class="col-sm-10">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Year</label>
                                <select class="form-control" name="year">
                                    <option>-Select Year-</option>
                                    <option value="I Year">I Year</option>
                                    <option value="II Year">II Year</option>
                                    <option value="III Year">III Year</option>
                                    <option value="IV Year">IV Year</option>
                                    <option value="V Year">V Year</option>
                            <option value="OTHER">OTHER</option>
                                </select>
                            </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Branch</label>
                                <input type="text" class="form-control txtOnly" name="branch" value="" placeholder="Enter Branch">
                            </div>
                                </div>
                            </div>
    
                            <div class="row">
                                   
    
                                <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">College <span class="mendatri-field">*</span></label>
                                        <select class="form-control" name="college" id="collegeoption" onchange="checkcollege(this)">
                                            <option value="MNIT" selected="">MNIT</option>
                                            <option value="NIT UK"> NIT UK </option>
                                                    <option value="IIIT Kota">IIIT Kota</option>
                                                    <option value="Others"> Others </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">If Others, Specify name</label>
                                    <input type="text" id="othercollege" class="form-control txtOnly" name="collegename" value="" placeholder="Enter your college">
                                    </div>
                                </div>
                                <div class="col-sm-17">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">College Id <span class="mendatri-field">*</span></label>
                                <input type="text" class="form-control" value="" name="colid" placeholder="Enter your college id" required="">
                            </div>
                                </div>
                            </div>
    
    
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label for="recipient-name" class="form-control-label">City <span class="mendatri-field">*</span></label>
                                <input type="text" class="form-control txtOnly" value="" name="city" placeholder="Enter city" required="">
                            </div>
                                </div>
    
    
    
    
                            <div class="col-sm-6">
                                    <div class="form-group">
    
                                <label for="recipient-name" class="form-control-label">Accommodation Needed <span class="mendatri-field">*</span></label>
                                <div class="checkbox_wrp">
                                    <label class="checkbox"><input type="radio" name="accommondation" value="Yes" required=""> <span>Yes</span></label>
                                    <label class="checkbox"><input type="radio" name="accommondation" value="No"> <span>No</span></label>
                                </div> <br>
                                <input type="submit" name="register" value="register" class="btn btn-input">
    
                            </div>
                                </div>
                                    </div>
                        </div>
                        </form>
                </p>
                <h1>
            
                </h1>
            </div> <!-- end home-content__main -->

        </div> <!-- end home-content -->

        <ul class="home-sidelinks">
            <li><a class="smoothscroll" href="#about">About<span>About Blitzschlag</span></a></li>
            <li><a class="smoothscroll" href="#theme">Theme<span>About the edition's theme</span></a></li>
            <li><a  class="smoothscroll" href="#contact">Contact<span>Get in touch</span></a></li>
            <li><a href="./login.html">Register</a></li>
        </ul> <!-- end home-sidelinks -->

        <ul class="home-social">
            <li class="home-social-title">Follow Us</li>
            <li><a href="#0">
                <i class="fab fa-facebook"></i>
                <span class="home-social-text">Facebook</span>
            </a></li>
            <li><a href="#0">
                <i class="fab fa-instagram"></i>
                <span class="home-social-text">Instagram</span>
            </a></li>
            <li><a href="#0">
                <i class="fab fa-linkedin"></i>
                <span class="home-social-text">LinkedIn</span>
            </a></li>
        </ul> <!-- end home-social -->

        <a href="#contact" class="home-scroll smoothscroll">
            <span class="home-scroll__text">Scroll Down</span>
            <span class="home-scroll__icon"></span>
        </a> <!-- end home-scroll -->

    </section> <!-- end s-home -->


    


    <!-- contact
        ================================================== -->
        <section id="contact" class="s-contact">
            <div class="row">

                <div class="col-full contact-main" data-aos="fade-up">
                    <p>
                    <a href="mailto:#0" class="contact-email">contact@blitzschlag.org</a>
                    <span class="contact-number"></span>
                    </p>
                </div> <!-- end contact-main -->

            </div> <!-- end row -->

            <div class="row">

                <div class="col-five tab-full contact-secondary" data-aos="fade-up">
                    <h3 class="subhead subhead--light">Where To Find Us</h3>

                    <p class="contact-address">
                        MNIT Jaipur campus <br>
                        Malviya Nagar <br>
                        Jaipur - 302017
                    </p>
                </div> <!-- end contact-secondary -->

                <div class="col-five tab-full contact-secondary" data-aos="fade-up">
                    <h3 class="subhead subhead--light">Links</h3>

                    <p class="contact-address">
                        <li><a href="login.html"><strong>REGISTER</strong></a></li>
                    </p>
                </div> <!-- end contact-secondary -->

                <div class="col-five tab-full contact-secondary" data-aos="fade-up">
                    <h3 class="subhead subhead--light">Learn More</h3>

                    <p class="contact-address">
                        <li><a href="events.html"><strong>EVENTS</strong></a></li>
                        <li><a href="pronites.html"><strong>PRONITES</strong></a></li>
                        <li><a href="#"><strong>ACCOMMODATION</strong></a></li>
                    </p>
                </div> <!-- end contact-secondary -->

                <div class="col-five tab-full contact-secondary" data-aos="fade-up">
                    <h3 class="subhead subhead--light">SOCIAL MEDIA</h3>

                    <ul class="contact-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul> <!-- end contact-social -->

                    <div class="contact-subscribe">
                    
                    </div> <!-- end contact-subscribe -->
                </div> <!-- end contact-secondary -->

            </div> <!-- end row -->

            <div class="row">
                <div class="col-full cl-copyright">
                    <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Sanatan Shrivastava</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
                </div>
            </div>

            <div class="cl-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
            </div>

        </section> <!-- end s-contact -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">            
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>