<?php
/**
 * PiyangoAdapter
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Adapter;

use Sanssendecom\LotteryResultBundle\Connection\MpiConnection;
use Sanssendecom\LotteryResultBundle\Mapping\District;
use Sanssendecom\LotteryResultBundle\Mapping\Piyango;
use Sanssendecom\LotteryResultBundle\Mapping\Province;
use Sanssendecom\LotteryResultBundle\Mapping\TicketResult;

class PiyangoAdapter extends TicketAdapter
{
    /**
     * @var Piyango
     */
    private $lottery;
    /**
     * @var TicketResult
     */
    private $ticketResult;
    /**
     * @var array
     */
    private $provinces;

    public function __construct(MpiConnection $connection)
    {
        $connection->connected();
        parent::__construct($connection->getResponse());
        $this->setDataToLottery();
    }

    private function createResultObject()
    {
        $this->lottery = new Piyango();
    }

    private function createTicketResultObject()
    {
        $this->ticketResult = new TicketResult();
    }

    private function setDataToLottery()
    {

        $this->createResultObject();

        $this->lottery->setRaffleName($this->raffleName);
        $this->lottery->setRaffleDate($this->raffleDate);
        $this->lottery->setNumberOfDigits($this->numberOfDigits);
        $this->setProvinces();
        foreach ($this->result as $result)
        {
            $this->createTicketResultObject();

            $this->ticketResult->setNumberOfDigits($result->haneSayisi);
            $this->ticketResult->setJackpot($result->ikramiye);
            $this->ticketResult->setType($result->tip);
            $this->ticketResult->setNumbers($result->numaralar);

            $this->lottery->addResult($this->ticketResult);
        }
    }

    private function setProvinces()
    {
        if ($this->hasDistricts())
        {
            foreach ($this->winningDistricts as $provinceData)
            {
                $province = $this->lottery->getWinningProvinces()->get($provinceData->il);
                if (empty($province))
                {
                    $province = new Province();
                    $province->setCode($provinceData->il);
                    $province->setName($provinceData->ilView);
                }
                $district = $province->getDistricts()->get($provinceData->ilce);
                if (empty($district))
                {
                    $district = new District();
                    $district->setCode($provinceData->ilce);
                    $district->setName($provinceData->ilceView);
                }

                $district->setNumberOfPeople($district->getNumberOfPeople() + 1);
                $province->getDistricts()->set($district->getCode(), $district);

                $this->lottery->getWinningProvinces()->set($province->getCode(), $province);
            }
        }
    }

    private function hasDistricts()
    {
        $hasDistricts = $this->winningDistricts;

        return !empty($hasDistricts);
    }

    public function getResult()
    {
        return $this->lottery;
    }

}