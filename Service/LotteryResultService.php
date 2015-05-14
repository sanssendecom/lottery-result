<?php
/**
 * LotteryResultService
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Service;

use Sanssendecom\LotteryResultBundle\Adapter\PiyangoAdapter;
use Sanssendecom\LotteryResultBundle\Connection\ConnectionConstants;
use Sanssendecom\LotteryResultBundle\Connection\MpiConnection;
use Sanssendecom\LotteryResultBundle\Adapter\SayisalLotoAdapter;
use Sanssendecom\LotteryResultBundle\Adapter\SansTopuAdapter;
use Sanssendecom\LotteryResultBundle\Adapter\OnNumaraAdapter;
use Sanssendecom\LotteryResultBundle\Adapter\SuperLotoAdapter;
use Sanssendecom\LotteryResultBundle\Exception\LotteryTypeException;
use Sanssendecom\LotteryResultBundle\Exception\ResultParameterException;

class LotteryResultService
{

    private $lotteryType;
    /**
     * @var \DateTime
     */
    private $raffleDate;
    /**
     * @var MpiConnection
     */
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
            case 'piyango':
                return new PiyangoAdapter($this->connection);
                break;
            default:
                throw new LotteryTypeException('Not defined lottery type: ' . $this->lotteryType . '. Defined lottery type only SAYISALLOTO, SUPERLOTO, ONNUMARA, SANSTOPU, PIYANGO');
                break;
        }
    }

}