<?php
// Include the database connection
include('../link/desigene/db.php');

// Retrieve posted data
$Id = $_POST['Id'];
$Email = $_POST['Email'];
$Gmailemp = $_POST['Gmailemp'];
$Password = $_POST['Password'];
$IdUpdateemp = $_POST['IdUpdateemp'];
// Update login details
$insert = mysqli_query($conn, "UPDATE `login` SET `Email`='$Email', `Password`='$Password' WHERE `Id`=$Id");
if ($insert) {
    // Update forget password status
    $updateForget = mysqli_query($conn, "UPDATE `forgetpassword` SET `Status`='Completed' WHERE `Id`=$IdUpdateemp");
    if ($updateForget) {
        echo "Password and email are updated. ";
        // Email message with HTML formatting
        $message = '
        <html>
        <head>
            <style>
                body {font-family: Arial, sans-serif; margin: 0; padding: 0;}
                .header, .footer {background-color: #003366; color: #ffffff; text-align: center; padding: 10px;}
                .footer {font-size: 12px;}
                .content {padding: 20px;}
                .logo {width: 150px; margin: 20px 0;}
            </style>
        </head>
        <body>
            <div class="header">
                <img src="../image/1662096718940.jpg" alt="Logo" class="logo">
                <h1>Password Reset</h1>
            </div>
            <div class="content">
                <p>Your email has been updated to: <strong>' . htmlspecialchars($Email) . '</strong></p>
                <p>Your new password is: <strong>' . htmlspecialchars($Password) . '</strong></p>
            </div>
            <div class="footer">
                <p>Software by Kurtlar Developer</p>
                <p><a href="http://www.kurtlardeveloper.com" style="color: #ffffff;">www.kurtlardeveloper.com</a></p>
            </div>
        </body>
        </html>';

        $from = "shayans1215225@gmail.com";
        $subject = "Restore email / Password";
        // To send HTML mail, the Content-type header must be set
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        // Send the email
        if (mail($Gmailemp, $subject, $message, $headers)) {
            echo "An email has been sent to the user.";
        } else {
            echo "But the email was not sent due to a server error.";
        }
    } else {
        echo "Forget password status update failed.";
    }
} else {
    echo "Password update failed.";
}
?>