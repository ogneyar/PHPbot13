<?php
echo '111';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../vendor/autoload.php';
include_once 'a_conect.php';
echo '<br><br>222';
// `true` включает исключения (exceptions)
$mail = new PHPMailer(true);

try {
    
echo '<br><br>333';
    
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    
echo '<br><br>444<br><br>';
    
    $mail->Host       = 'e.mail.ru';                              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ogneyar_ya';                     // SMTP username
    
echo '555<br><br>';
    
    $mail->Password   = $passSMTP;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    
echo '666<br><br>';

    
    //Recipients
    $mail->setFrom('ogneyar_ya@mail.ru', 'Mailer');
//    $mail->addAddress('ya13th@mail.ru', 'Joe User');     // Add a recipient
    $mail->addAddress('ogneyar-ne@yandex.ru');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('ogneyar_ya@mail.ru');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
echo '777<br><br>';
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
echo '888<br><br>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


// Подключаем файл бота
include_once 'botInfoUsers.php';
?>
