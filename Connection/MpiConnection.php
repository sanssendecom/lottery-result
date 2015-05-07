<?php

/**
 * MpiConnection
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryBundle
 * Author: denizakturk
 */

namespace Sanssende\LotteryBundle\Connection;

use Symfony\Component\HttpFoundation\Response;

class MpiConnection extends ConnectionConstants
{
    private $connectionHandle;
    private $connectionUrl;
    private $response;
    private $httpCode;

    public function __construct($lotteryType, \DateTime $resultDate)
    {
        parent::__construct($lotteryType);
        $this->connectionUrl = $this->getConnectionUrl($resultDate);
    }

    public function initUrl()
    {
        $this->connectionHandle = curl_init($this->connectionUrl);
    }

    public function setOption()
    {
        curl_setopt($this->connectionHandle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->connectionHandle, CURLOPT_URL, $this->connectionUrl);
        curl_setopt($this->connectionHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->connectionHandle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    }

    public function connected()
    {
        $this->initUrl();
        $this->setOption();
        $this->response = curl_exec($this->connectionHandle);

        if ($this->connectionStatus() != 200)
        {
            throw new \Exception('Connection Error :' . Response::$statusTexts[$this->connectionStatus()]);
        }
        $this->closeConnection();
    }

    public function connectionStatus()
    {
        $this->httpCode = curl_getinfo($this->connectionHandle, CURLINFO_HTTP_CODE);

        return $this->httpCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function closeConnection()
    {
        curl_close($this->connectionHandle);
    }

}