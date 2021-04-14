
<?php

$name=$_REQUEST['contact_name'];
$email=$_REQUEST['contact_email'];
$phno=$_REQUEST['contact_phno'];
$disc=$_REQUEST['contact_disc'];
$service=$_REQUEST['contact_service'];
/*include ("connect.php");

$reschk =mysql_query("SELECT * FROM contactus where email  = '$email'");

$numrows=mysql_num_rows($reschk);
if($numrows>0)
{
    echo '<script language="javascript">alert("You have already Registered '.$name.'"); window.location="index.php"; </script>';
}
else
{*/
    if(isset($_POST['submit_contact']))
    {
        /*ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);*/

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        //$mail->IsSMTP(); // enable SMTP

        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        //$mail->SMTPAuth = false; // authentication enabled
        //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "mail.hypeup-media.com";
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mail@hypeup-media.com";
        $mail->Password = "tVk0_IdYQW$2";
        $mail->SetFrom("mail@hypeup-media.com","Hypeup Media");

        $subject='Contact Form Submission by '.$name;
		$message="Name : ".$name."<br />"."Phone: ".$phno."<br />"."Email: ".$email."<br />"."Service: ".$service."<br />"."Wrote the following: "."<br />".$disc;

        $mail->Subject = $subject;
        $mail->Body = $message;
        //$mail->AddAddress('lalitkumar2683@gmail.com');
        $mail->AddAddress('info.hypeupmedia@gmail.com');

        //Set BCC address
        //$mail->addBCC("lalitkumar2683@gmail.com");

        // Attachments
        $folder_path = 'contactus/';
        $filename = basename($_FILES['filename']['name']);
        if(isset($filename) && $filename!="")
        {
            $newname = $folder_path . $filename;
            $FileType = pathinfo($newname,PATHINFO_EXTENSION);
            if($FileType == "pdf")
            {
                if (move_uploaded_file($_FILES['filename']['tmp_name'], $newname))
                {
                    $mail->addAttachment($newname);         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    //echo '<script language="javascript">alert("Uploaded Thanks for applying. We will contact you soon. '.$name.'"); window.location="index.php"; </script>';
                    // $res =mysql_query("insert into contactus Values ('$name','$email','$phno','$disc','$service','$filename')");
                }
                else
                {
                    //echo '<script language="javascript">alert("File Not Uploaded '.$name.'"); window.location="\index.html"; </script>';
                }
            }
            else
            {
                echo '<script language="javascript">alert("File must be Uploaded in Pdf Format'.$name.'"); window.location="\index.html"; </script>';
            }
        }

        if(!$mail->Send())
        {
            //echo "Mailer Error: " . $mail->ErrorInfo;
            echo '<script language="javascript">alert("Something went wrong with mail!"); window.location="\index.html"; </script>';
        }
        else
        {
            //echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";die;
            echo '<script language="javascript">alert("Thanks for contacting us, we will contact you shortly!"); window.location="\index.html"; </script>';
        }

		//$to='sachdevasahil18@gmail.com'; //
		/*$to='lalitkumar2683@gmail.com';
		$subject='Contact Form Submission';
		$message="Name :".$name."\n"."Phone :".$phno."\n"."Email :".$email."\n"."Service :".$service."\n"."Wrote the following :"."\n\n".$disc;
		//$headers="From: ".$email;
		$headers="From: Hypeup Media <info@hypeup-media.com>";

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}*/
	}
	else
	{
	    echo '<script language="javascript">alert("Something went wrong!"); window.location="\index.html"; </script>';
	}




/*}*/

?>
