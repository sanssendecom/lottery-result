<?php
/**
 * OnNumaraAdapter
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Adapter;

use Sanssendecom\LotteryResultBundle\Connection\MpiConnection;
use Sanssendecom\LotteryResultBundle\Mapping\District;
use Sanssendecom\LotteryResultBundle\Mapping\Onnumara;
use Sanssendecom\LotteryResultBundle\Mapping\Province;

class OnNumaraAdapter extends LotteryAdapter
{
    private $lottery;

    public function __construct(MpiConnection $connection)
    {
        $connection->connected();
        parent::__construct($connection->getResponse());
        $this->setDataToLottery();
    }

    private function createResultObject()
    {
        $this->lottery = new Onnumara();
    }

    private function setDataToLottery()
    {
        if (!$this->success)
        {
            throw new ResultSuccessException('Result not success');
        }

        $this->createResultObject();

        $this->lottery->setId($this->oid);
        $this->setProvinces();
        $this->lottery->setHanded($this->handed);
        $this->lottery->setSpeed($this->speed);
        $this->lottery->setCyprusRevenue($this->cyprusRevenue);
        $this->lottery->setTransferAmount($this->transferAmount);
        $this->lottery->setNumberOfColumns($this->numberOfColumn);
        $this->lottery->setTax($this->tax);
        $this->lottery->setBonusEh($this->bonusEh);
        $this->lottery->setWeek($this->week);
        $this->lottery->setTotalRevenue($this->totalRevenue);
        $this->lottery->setRevenues($this->revenues);
        $this->lottery->setGameOfChanceTax($this->gameOfChanceTax);
        $this->lottery->setJackpot($this->jackpot);
        $this->lottery->setWeekRollovers($this->weekRollovers);
        $this->lottery->setRaffleDate($this->raffleDate);
        $this->lottery->setNumbers($this->numbers);
        $this->lottery->setJackpotWinners($this->jackpotWinners);
        $this->lottery->setAmountOfNextCycle($this->amountOfNextCycle);
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