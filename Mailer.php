<?php
require 'mail/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        try {
            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host = 'result.demoikeworld.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'your username';
            $this->mail->Password = 'password'; // Replace with the actual email password
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;

            // Sender info
            $this->mail->setFrom('info@result.demoikeworld.com', 'Admin Team');
        } catch (Exception $e) {
            echo "Mailer Initialization Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendMail($to, $toName, $subject, $body) {
        try {
            $this->mail->clearAddresses(); // Clear any previous addresses
            $this->mail->addAddress($to, $toName);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo " {$e->getMessage()}"; // More detailed error message
            return false;
        }
    }

}
?>
