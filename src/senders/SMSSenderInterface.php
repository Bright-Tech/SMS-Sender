<?php
namespace bright_tech\sms_sender\senders;
interface SMSSenderInterface
{
    /**
     *
     * @param array $param
     */
    public function __construct($param);
    /**
     *
     * @param array $param
     */
    public function send($param);
    /**
     *
     * @param array $param
     */
    public function generateSignature($param);
}