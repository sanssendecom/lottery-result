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
use Sanssendecom\LotteryResultBundle\Mapping\Onnumara;

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
        $this->lottery->setWinningProvinces($this->buyukIkramiyeKazananIl);
        $this->lottery->setWinningDistricts($this->buyukIkrKazananIlIlceler);
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

    public function getResult()
    {
        return $this->lottery;
    }
}