<?php
require_once dirname(__FILE__).'/../src/senders/SMSSenderInterface.php';
require_once dirname(__FILE__).'/../src/senders/SendCloud.php';;
require_once dirname(__FILE__).'/../src/SMSSenderFactory.php';
use bright\sms_sender\SMSSenderFactory;

$param = array(
    'templateId' => '1581', //模板ID
    'msgType' => '0', //0表示短信, 1表示彩信, 默认值为0
    'phone' => '13132098330', //收信人手机号,多个手机号用逗号,分隔, 号码最多不能超过100
    'vars' => '{"%code%":"123456"}' //	替换变量的json串
);
$sender = SMSSenderFactory::getSender( SMSSenderFactory::SENDER_SENDCLOUD , [
    'SMSUser' => 'ggrxyj',
    'SMSKey' => 'qg6vrfjdJKvbdTGnneO9NaRj5hbJORNC'
]);
$result = $sender->send($param);
var_dump($result);