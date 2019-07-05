<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function replace($data){
    return str_replace('span','a',$data);
}
// 应用公共文件
function mail_to($to, $title, $content){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->CharSet = 'utf-8';
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.163.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lianlihe@163.com';                     // SMTP username
        $mail->Password   = 'lianlihe=123';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('lianlihe@163.com', 'lib');
        $mail->addAddress($to);     // Add a recipient




        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();

    } catch (Exception $e) {
        exception($mail->ErrorInfo);
    }
}

function mailto($to, $title, $content){

    require_once '/vendor/swiftmailer/swiftmailer/lib/swift_required.php';
// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.163.com', 465))
        ->setUsername('lianlihe@163.com')
        ->setPassword('lianlihe=123')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['lianlihe@163.com' => 'lib'])
        ->setTo(array('lianlihe@163.com' => 'toName'))
        ->setBody($content)
    ;

// Send the message
    $result = $mailer->send($message);
}