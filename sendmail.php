<?php
  function send_mail($email, $receiver, $body){
    include("PHPMailerAutoload.php"); //匯入PHPMailer類別
    $mail= new PHPMailer(); //建立新物件
    $mail->IsSMTP(); //設定使用SMTP方式寄信
    $mail->SMTPAuth = true; //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
    $mail->Port = 465; //Gamil的SMTP主機的SMTP埠位為465埠。
    $mail->CharSet = "utf-8"; //設定郵件編碼
    $mail->Username = "peterpeter031053@gmail.com"; //設定google eamil帳號
    $mail->Password = "A126896696"; //設定google eamil密碼
    $mail->From = "peterpeter031053@gmail.com"; //設定寄件者信箱
    $mail->FromName = "老闆"; //設定寄件者姓名
    $mail->Subject = "忘記密碼"; //設定郵件標題
    $mail->Body = $body; //設定郵件內容
    $mail->IsHTML(true); //設定郵件內容為HTML
    $mail->AddAddress($email); //設定收件者郵件及名稱
    if(!$mail->Send()) {
      return "Mailer Error:"  . $mail->ErrorInfo;
    } else {
      return "信件已寄送";
    }
  }
?>
