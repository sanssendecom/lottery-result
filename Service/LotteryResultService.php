<?php
/**
 * LotteryResultService
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryBundle
 * Author: denizakturk
 */

namespace Sanssende\LotteryBundle\Service;

use Sanssende\LotteryBundle\Connection\ConnectionConstants;
use Sanssende\LotteryBundle\Connection\MpiConnection;
use Sanssende\LotteryBundle\Adapter\SayisalLotoAdapter;
use Sanssende\LotteryBundle\Adapter\SansTopuAdapter;
use Sanssende\LotteryBundle\Adapter\OnNumaraAdapter;
use Sanssende\LotteryBundle\Adapter\SuperLotoAdapter;
use Sanssende\LotteryBundle\Exception\LotteryTypeException;
use Sanssende\LotteryBundle\Exception\ResultParameterException;

class LotteryResultService
{

    private $lotteryType;
    private $raffleDate;
    private $connection;

    public function __construct($lotteryType = NULL, \DateTime $raffleDate = NULL)
    {
        if (!is_null($lotteryType))
        {
            $this->lotteryType = $lotteryType;
        }
        if (!is_null($raffleDate))
        {
            $this->raffleDate = $raffleDate;
        }

        if (!is_null($this->lotteryType) AND !is_null($this->raffleDate))
        {
            return $this->getResultClass();
        }
    }

    public function getResultClass()
    {
        $this->connection = $this->createConnection();
        $adapter = $this->createAdapter();

        return $adapter->getResult();
    }

    public function setOption($lotteryType, \DateTime $raffleDate)
    {
        $this->lotteryType = $lotteryType;
        $this->raffleDate = $raffleDate;

        return $this;
    }

    public function setRaffleDate(\DateTime $raffleDate)
    {
        $this->raffleDate = $raffleDate;

        return $this;
    }

    private function createConnection()
    {
        if (is_null($this->lotteryType) OR is_null($this->raffleDate))
        {
            throw new ResultParameterException('Lottery type and/or raffle date parameter null, use set parameter with this class setOption method');
        }

        return new MpiConnection(new ConnectionConstants(ConnectionConstants::getConstant($this->lotteryType)), $this->raffleDate);
    }

    private function createAdapter()
    {
        switch (strtolower($this->lotteryType))
        {
            case 'sayisalloto':
                return new SayisalLotoAdapter($this->connection);
                break;
            case 'sanstopu':
                return new SansTopuAdapter($this->connection);
                break;
            case 'onnumara':
                return new OnNumaraAdapter($this->connection);
                break;
            case 'superloto':
                return new SuperLotoAdapter($this->connection);
                break;
            default:
                throw new LotteryTypeException('Not defined lottery type: ' . $this->lotteryType . '. Defined lottery type only SAYISALLOTO, SUPERLOTO, ONNUMARA, SANSTOPU');
                break;
        }
    }

}