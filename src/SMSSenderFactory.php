<?php
namespace bright\sms_sender;
require_once dirname(__FILE__).'/senders/SendCloud.php';;


class SMSSenderFactory
{
    const SENDER_SENDCLOUD = '\bright\sms_sender\senders\SendCloud';
    public static function getSender( $senderClass, $param){
        $sender = new $senderClass($param);
        return $sender;
    }
}

