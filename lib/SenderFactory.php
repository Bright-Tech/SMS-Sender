<?php
namespace bright\SMS_Sender;
require_once dirname(__FILE__).'/Senders/SendCloud.php';;


class SenderFactory
{
    const SENDER_SENDCLOUD = '\bright\SMS_Sender\Senders\SendCloud';
    public static function getSender( $senderClass, $param){
        $sender = new $senderClass($param);
        return $sender;
    }
}

