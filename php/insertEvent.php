<?php
/*
 * Get Event Request ready for ajax jQuery call
 */

// Filter out post variables for security
$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
$phone = htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8');
$phone = preg_replace('/[^\d-]+/', '', $phone);
$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
$attending = htmlentities($_POST['attending'], ENT_QUOTES, 'UTF-8');
$major = htmlentities($_POST['major'], ENT_QUOTES, 'UTF-8');
$ohdate = htmlentities($_POST['rsvp'], ENT_QUOTES, 'UTF-8');

// Save new event to database
function InsertOpenHouse($name, $phone, $email, $attending, $major, $ohdate) {
    require_once 'dbConn.php';
    $timestamp = date("Y-m-d H:i:s");

    try {

        $sqlCampus = "SELECT opendates.campus, submissions.ohdate, opendates.eventdate 
                                        FROM submissions, opendates 
                                        WHERE submissions.ohdate = :ohdateCampus AND submissions.ohdate = opendates.eventdate;";
        $stmCampus = $dbhopenhouse->prepare($sqlCampus);
        $stmCampus->bindParam(':ohdateCampus', $ohdate);
        $stmCampus->execute();

        // Fetch the results in a numbered array
        $getstmCampus = $stmCampus->fetchALL(PDO::FETCH_NUM);

        $campus = $getstmCampus[0][0];

        // PHP PDO SQL Statement
        $sql = "INSERT INTO submissions (name,phone,email,attendingguest,major,datesubmitted,campus,ohdate)"
               ."VALUES (:name,:phone,:email,:attending,:major,:timestamp,:campus,:ohdate)";

        $stm = $dbhopenhouse->prepare($sql);

        $stm->bindParam(':name', $name);
        $stm->bindParam(':phone', $phone);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':attending', $attending);
        $stm->bindParam(':major', $major);
        $stm->bindParam(':timestamp', $timestamp);
        $stm->bindParam(':campus', $campus);
        $stm->bindParam(':ohdate', $ohdate);
        $stm->execute();


        // Close the dbh connection 
        $dbhopenhouse = null;

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        //date_default_timezone_set('Etc/UTC');

        require_once 'PHPMailer/PHPMailerAutoload.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "mail.highlands.edu";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 25;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = false;
        //Set who the message is to be sent from
        $mail->setFrom('admitme@highlands.edu', 'Preview Day at GHC');
        //Set an alternative reply-to address
        $mail->addReplyTo('admitme@highlands.edu', 'Preview Day at GHC');
        
        //Set who the message is to be sent to
        $mail->addAddress('admitme@highlands.edu', 'Preview Day');
        $mail->addAddress('jfleming@highlands.edu', 'Preview Day');
        
        //Set the subject line
        $mail->Subject = "New Preview View Submission";
        
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('emailContent/emailContent.html'), dirname(__FILE__));

        // Set email format to HTML
        $mail->isHTML(true);
        $mail->Body = 'A request to attend an Preview Day was submitted from ' . $name . ' for ' . $ohdate;

        //Replace the plain text body with one created manually
        $mail->AltBody = 'A request to attend an Preview Day was submitted from ' . $name . ' for ' . $ohdate;

        //Attach an image file
        // $mail->addAttachment('someFile.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


InsertOpenHouse($name, $phone, $email, $attending, $major, $ohdate);
