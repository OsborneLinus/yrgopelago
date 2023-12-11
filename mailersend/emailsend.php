<?php
require 'vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

/* $apiKey = 'mlsn.253642605b665b78b0cc775d380ffa1d4139d094a8f7e3f4c9f53da403140605';
 */

$mailersend = new MailerSend(['api_key' => 'mlsn.356a7a7382d0f002758abfcd1201b5a32a50dbd16aa4e91964dc82b58fed53c9']);

$recipients = [
    new Recipient('admin@theduckside.se', 'Recipient'),
];

$emailParams = (new EmailParams())
    ->setFrom('admin@theduckside.se')
    ->setFromName('Your Name')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setHtml('This is the HTML content')
    ->setText('This is the text content');
echo "email sent! ";
/* $mailersend->email->send($emailParams);
 */
