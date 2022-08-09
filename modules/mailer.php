<?php
    require_once 'modules/PHPMailer/src/PHPMailer.php';
    require_once 'modules/PHPMailer/src/SMTP.php';
    require_once 'modules/PHPMailer/src/Exception.php';
    include 'modules/info.php';

    use PHPMailer\PHPMailer\PHPMailer;
    
    function sendMail($address, $body) {
        $mail = new PHPMailer(true);
        $mail->ContentType = "text/html";
        $mail->CharSet = "utf-8";
        $mail->IsSMTP(); // enable SMTP
        $info = getInfo();

        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = $info->host;
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = $info->username;
        $mail->Password = $info->password;
        $mail->SetFrom($info->username, "ALife");
        $mail->AddAddress($address);
        $mail->Subject = "ALIFE 이메일 인증";
        $mail->Body = $body;

        if(!$mail->Send()) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

?>
