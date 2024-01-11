<?php

require 'vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Attachment;
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

        $attachments = [
            new Attachment(file_get_contents('https://bucket.mailersendapp.com/0p7kx4xmrvl9yjre/z3m5jgr19dm4dpyo/images/9b10c279-a96a-4a8c-bdf0-1332359c1954.jpg'), 'attachment.jpg')
        ];
        $emailParams = (new EmailParams())
            ->setFrom('admin@theduckside.se')
            ->setFromName('Casa Olive')
            ->setRecipients($recipients)
            ->setSubject('Booking')
            ->setHtml($body)
            ->setText($body)
            ->setAttachments($attachments);

        if ($mailersend->email->send($emailParams)) {
            return true;
        } else {
            return false;
        }
    }
}
