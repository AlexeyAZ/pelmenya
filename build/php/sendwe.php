<?php
$sendto = nl2br($_POST['email']);

$content = "Заявка с сайта Пельмения";
// Формирование заголовка письма
$subject  = $content;
$headers  = "From: admin@pelmenia-franchise.ru" . "\r\n";
$headers .= "Reply-To: Без ответа". "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
// Формирование тела письма
$msg  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <style></style>
    </head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailContainer">
                        <tr>
                            <td align="center" valign="top" style="font-size:0;padding-bottom:0;">
                                <span style="color:black; font: 24px Arial, sans-serif; line-height: 30px; -webkit-text-size-adjust:none; display: block;text-align:center;padding: 20px 0;">Добрый день!</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="font-size:0;" width="100%">
                                <img src="http://savepic.ru/13421749.jpg" alt="" alt="" border="0" width="100%" style="display:block;margin:0;padding:0;">
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailContainer">
                        <tr>
                            <td align="center" valign="top" style="font-size:0;" width="50%">
                                <a href="http://xn--e1aajkfhj0i5a.xn--p1ai/" style="color: #333333; font: 0 Arial, sans-serif; -webkit-text-size-adjust:none; display: block;margin:0;padding:0;" target="_blank">
                                    <img src="http://savepic.ru/13412533.jpg" alt="" border="0" width="100%" style="display:block;margin:0;padding:0;">
                                </a>
                            </td>
                            <td align="center" valign="top" style="font-size:0;" width="50%">
                                <a href="https://vk.com/club35096702" style="color: #333333; font: 0 Arial, sans-serif; -webkit-text-size-adjust:none; display: block;margin:0;padding:0;" target="_blank">
                                    <img src="http://savepic.ru/13414581.jpg" alt="" border="0" width="100%" style="display:block;margin:0;padding:0;">
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	echo "true";
} else {
	echo "false";
}

?>



