<?php
require_once(__DIR__ . '/vendor/autoload.php');
$email = $_GET['email'];
echo $email;
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);
$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
$sendSmtpEmail['subject'] = 'Notice';
$sendSmtpEmail['htmlContent'] = '<html><body><h1>This is final test</h1></body></html>';
$sendSmtpEmail['sender'] = array('name' => 'Chatrapur Primary School', 'email' => 'baust.cse.200201008@gmail.com');
$sendSmtpEmail['to'] = array(
    array('email' => $email, 'name' => 'Teacher')
);
try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
    echo "EMAIL SENT";
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
