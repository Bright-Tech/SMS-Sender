<?php
namespace SMSSender;
require_once dirname(__FILE__).'/Senders/SendCloud.php';;


class SenderFactory
{
    const SENDER_SENDCLOUD = '\SMSSender\Senders\SendCloud';
    public static function getSender( $senderClass, $param){
        $sender = new $senderClass($param);
        return $sender;
    }
}

