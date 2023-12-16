<?php

require 'vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;


class MailersendWrapper
{

    function sendEmail($emailAddress, $body)
    {


        $mailersend = new MailerSend(['api_key' => '#']);

        $recipients = [
            new Recipient($emailAddress, 'Recipient'),
        ];


        echo "Jag är här!";
        exit;
        $emailParams = (new EmailParams())
            ->setFrom('admin@theduckside.se')
            ->setFromName('Your Name')
            ->setRecipients($recipients)
            ->setSubject('Subject')
            ->setHtml($body)
            ->setText($body);
        /*
        if($mailersend->email->send($emailParams)){
            return true;
        }else{
            return false;
        }

        */
    }
}
