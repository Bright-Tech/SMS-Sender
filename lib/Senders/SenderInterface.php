<?php
namespace SMSSender\Senders;
interface SenderInterface
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