<?php
    require_once "../static/mailConfig.php";

    require "../static/PHPMailer-master/src/PHPMailer.php";
    require "../static/PHPMailer-master/src/SMTP.php";
    require "../static/PHPMailer-master/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class mailManager{
        public static function sendEmail($body, $mailAdress){
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = mailConfig::host;
                $mail->SMTPAuth = mailConfig::SMTPAuth;
                $mail->Username = mailConfig::Username;
                $mail->Password = mailConfig::Password;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = mailConfig::Port;
                
                //Recipients
                $mail->setFrom('no-reply@ratjetoe.nl', 'Ratjetoe');

                $mail->addAddress($mailAdress);

                //Content
                $mail->isHTML(true);
                $mail->Subject = mailConfig::Subject;
                $mail->Body    = $body;

                $mail->send();
               
            } catch (Exception $e) {
                return "Message could not be sent. Mail Error: {$mail->ErrorInfo}";
            }
        }
    }