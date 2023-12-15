<?php
require_once '../vendor/autoload.php';
require '../input.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;



if (isset($_POST['email'])) {
    $emailAddress = $_POST['email'];

    $mailersend = new MailerSend(['api_key' => '#']);

    $recipients = [
        new Recipient($emailAddress, 'Recipient'),
    ];

    $emailParams = (new EmailParams())
        ->setFrom('admin@theduckside.se')
        ->setFromName('Your Name')
        ->setRecipients($recipients)
        ->setSubject('Subject')
        ->setHtml('This is the HTML content')
        ->setText('This is the text content');
    /* $mailersend->email->send($emailParams); */
}
header("Location: ../index.php");
