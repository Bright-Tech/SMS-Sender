<?php
namespace bright\SMS_Sender\Senders;
require_once dirname(__FILE__).'/SenderInterface.php';

class SendCloud implements SenderInterface
{
    public static $ApiEndpoint =  'http://sendcloud.sohu.com/smsapi/send';
    public static $SMSUser = '';
    public static $SMSKey = '';
    public static $debug = false;
    
    
//     const SMS_USER = 'ggrxyj';
//     const SMS_KEY = 'qg6vrfjdJKvbdTGnneO9NaRj5hbJORNC';

    
    public function __construct($param){
        self::$SMSUser = $param['SMSUser'];
        self::$SMSKey = $param['SMSKey'];
    }
    /**
     *  $param = array(
            'smsUser' => self::SMS_USER,
            'templateId' => '1', //模板ID
            'msgType' => '0', //0表示短信, 1表示彩信, 默认值为0
            'phone' => '13412345678', //收信人手机号,多个手机号用逗号,分隔, 号码最多不能超过100
            'vars' => '{"%code%":"123456"}' //	替换变量的json串
        );
     */
    public function send($param){
   
        $param['smsUser'] = self::$SMSUser;
        
        $param['signature'] = $this->generateSignature($param);
        
        
        $data = http_build_query($param);
        if (self::$debug){
            echo $data;
        }
        
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type:application/x-www-form-urlencoded',
                'content' => $data
        
            ));
        $context  = stream_context_create($options);
        $result = file_get_contents(self::$ApiEndpoint, FILE_TEXT, $context);
        
        return $result;
    }
    
    public function generateSignature($param){
        $sParamStr = "";
        ksort($param);
//         $sParamStr = http_build_query($param);
        foreach ($param as $sKey => $sValue) {
            $sParamStr .= $sKey . '=' . $sValue . '&';
        }
        
        $sParamStr = trim($sParamStr, '&');
        $sSignature = md5(self::$SMSKey."&".$sParamStr."&".self::$SMSKey);
        return $sSignature;
    }
}
