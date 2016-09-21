<?php
namespace bright_tech\sms_sender;



class SMSSenderFactory
{
    const SENDER_SENDCLOUD = '\bright\sms_sender\senders\SendCloud';
    public static function getSender( $senderClass, $param){
        $sender = new $senderClass($param);
        return $sender;
    }
}

