<?php

require 'vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;


class MailersendWrapper
{

    function sendEmail($emailAddress, $body)
    {


        $mailersend = new MailerSend(['api_key' => 'mlsn.a01e8af3952910b2353a27a7affecf391615d73cdf2569eee6c319066fbcc36d']);

        $recipients = [
            new Recipient($emailAddress, 'Recipient'),
        ];

        $emailParams = (new EmailParams())
            ->setFrom('admin@theduckside.se')
            ->setFromName('Your Name')
            ->setRecipients($recipients)
            ->setSubject('Subject')
            ->setHtml($body)
            ->setText($body);

        if ($mailersend->email->send($emailParams)) {
            return true;
        } else {
            return false;
        }
    }
}
