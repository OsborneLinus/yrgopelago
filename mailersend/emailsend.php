<?php
require 'vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;



$mailersend = new MailerSend(['api_key' => 'key']);

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
