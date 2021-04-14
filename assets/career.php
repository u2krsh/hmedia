<?php
$name=$_REQUEST['career_name'];
$email=$_REQUEST['career_email'];
$phno=$_REQUEST['career_phno'];
$whyshouldwehireyou=$_REQUEST['career_whyshouldwehireyou'];

if(isset($_POST['submit_career']))
{
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

    $subject='Career Form Submission by '.$name;
    $message="Name: ".$name."<br />"."Email: ".$email."<br />"."Phone: ".$phno."<br />"."Wrote the following: "."<br />".$whyshouldwehireyou;

    $mail->Subject = $subject;
    $mail->Body = $message;
    //$mail->AddAddress('lalitkumar2683@gmail.com');
    $mail->AddAddress('info.hypeupmedia@gmail.com');

    //Set BCC address
    //$mail->addBCC("lalitkumar2683@gmail.com");

    // Attachments
    $folder_path = 'resume/';

    $resumef = basename($_FILES['resume']['name']);
    if(isset($resumef) && $resumef!="")
    {
        $newname = $folder_path . $resumef;
        $FileType = pathinfo($newname,PATHINFO_EXTENSION);
        if($FileType == "pdf")
        {
            if (move_uploaded_file($_FILES['resume']['tmp_name'], $newname))
            {
                $mail->addAttachment($newname);         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                //echo '<script language="javascript">alert("Uploaded Thanks for applying. We will contact you soon.'.$name.'"); window.location="index.php"; </script>';
                //$res =mysql_query("insert into career Values ('$name','$email','$phno','$whyshouldwehireyou','$resumef')");
            }
            else
            {
                //echo '<script language="javascript">alert("File Not Uploaded '.$name.'"); window.location="\index.html"; </script>';
            }
        }
        else
        {
            echo '<script language="javascript">alert("File must be Uploaded in Pdf Format"); window.location="\index.html"; </script>';
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
        echo '<script language="javascript">alert("Thanks for applying. We will contact you soon!"); window.location="\index.html"; </script>';
    }

	//$to='sachdevasahil18@gmail.com'; //
	/*$to='sachdevasahil18@gmail.com';
	$subject='Form Submission';
	$message="Name :".$name."\n"."Phone :".$phno."\n"."Wrote the following :"."\n\n".$whyshouldwehireyou;
	//$headers="From: ".$email;
	$headers="From: Hypeup Media <info@hypeup-media.com>";

	if(mail($to, $subject, $message, $headers)){
		echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
	}
	else{
		echo "Something went wrong!";
	}*/
}

/*include ("connect.php");
$reschk =mysql_query("SELECT * FROM career where email  = '$email'");

$numrows=mysql_num_rows($reschk);
if($numrows>0)
{
      echo '<script language="javascript">alert("You have already Registered '.$name.'"); window.location="index.php"; </script>';

}
else
{
	$folder_path = 'resume/';

    $resumef = basename($_FILES['resume']['name']);
    $newname = $folder_path . $resumef;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    if($FileType == "pdf")
    {
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $newname))
        {

         echo '<script language="javascript">alert("Uploaded Thanks for applying. We will contact you soon.'.$name.'"); window.location="index.php"; </script>';
         $res =mysql_query("insert into career Values ('$name','$email','$phno','$whyshouldwehireyou','$resumef')");


        }
        else
        {

            echo '<script language="javascript">alert("File Not Uploaded '.$name.'"); window.location="index.php"; </script>';
        }


    }
    else
    {
         echo '<script language="javascript">alert("File must be Uploaded in Pdf Format'.$name.'"); window.location="index.php"; </script>';
    }



       echo '<script language="javascript">alert("Thanks for applying. We will contact you soon. '.$name.'"); window.location="index.php"; </script>';

}*/
?>
