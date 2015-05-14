<?php
/**
 * Sanstopu
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Mapping;

use Doctrine\Common\Collections\ArrayCollection;

class Sanstopu
{
    private $oid;
    private $week;
    private $winningProvinces;
    private $handed;
    private $speed;
    private $cyprusRevenue;
    private $numberOfColumns;
    private $tax;
    private $totalRevenue;
    private $revenues;
    private $gameOfChanceTax;
    private $bonusEh;
    private $jackpot;
    private $weekRollovers;
    private $raffleDate;
    private $numbers;
    private $plusNumber;
    private $jackpotWinners;
    private $amountOfNextCycle;
    private $transferAmount;

    public function __construct()
    {
        $this->winningProvinces = new ArrayCollection();
    }

    public function setId($oid)
    {
        $this->oid = $oid;

        return $this;
    }

    public function getId()
    {
        return $this->oid;
    }

    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    public function getWeek()
    {
        return $this->week;
    }

    public function addWinningProvince(Province $province)
    {
        $this->winningProvinces[] = $province;
    }

    public function removeWinningProvince(Province $province)
    {
        $this->winningProvinces->removeElement($province);
    }

    public function getWinningProvinces()
    {
        return $this->winningProvinces;
    }

    public function setHanded($handed)
    {
        $this->handed = $handed;

        return $this;
    }

    public function getHanded()
    {
        return $this->handed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setCyprusRevenue($cyprusRevenue)
    {
        $this->cyprusRevenue = $cyprusRevenue;

        return $this;
    }

    public function getCyprusRevenue()
    {
        return $this->cyprusRevenue;
    }

    public function setNumberOfColumns($numberOfColumns)
    {
        $this->numberOfColumns = $numberOfColumns;

        return $this;
    }

    public function getNumberOfColumns()
    {
        return $this->numberOfColumns;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function setTotalRevenue($totalRevenue)
    {
        $this->totalRevenue = $totalRevenue;

        return $this;
    }

    public function getTotalRevenue()
    {
        return $this->totalRevenue;
    }

    public function setRevenues($revenues)
    {
        $this->revenues = $revenues;

        return $this;
    }

    public function getRevenues()
    {
        return $this->revenues;
    }

    public function setGameOfChanceTax($gameOfChanceTax)
    {
        $this->gameOfChanceTax = $gameOfChanceTax;

        return $this;
    }

    public function getGameOfChanceTax()
    {
        return $this->gameOfChanceTax;
    }

    public function setBonusEh($bonusEh)
    {
        $this->bonusEh = $bonusEh;

        return $this;
    }

    public function getBonusEh()
    {
        return $this->bonusEh;
    }

    public function setJackpot($jackpot)
    {
        $this->jackpot = $jackpot;

        return $this;
    }

    public function getJackpot()
    {
        return $this->jackpot;
    }

    public function setWeekRollovers($weekRollovers)
    {
        $this->weekRollovers = $weekRollovers;

        return $this;
    }

    public function getWeekRollovers()
    {
        return $this->weekRollovers;
    }

    public function setRaffleDate($raffleDate)
    {
        $this->raffleDate = $raffleDate;

        return $this;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setPlusNumber($plusNumber)
    {
        $this->plusNumber = $plusNumber;

        return $this;
    }

    public function getPlusNumber()
    {
        return $this->plusNumber;
    }

    public function setJackpotWinners($jackpotWinners)
    {
        $this->jackpotWinners = $jackpotWinners;

        return $this;
    }

    public function getJackpotWinners()
    {
        return $this->jackpotWinners;
    }

    public function setAmountOfNextCycle($amountOfNextCycle)
    {
        $this->amountOfNextCycle = $amountOfNextCycle;

        return $this;
    }

    public function getAmountOfNextCycle()
    {
        return $this->amountOfNextCycle;
    }

    public function setTransferAmount($transferAmount)
    {
        $this->transferAmount = $transferAmount;

        return $this;
    }

    public function getTransferAmount()
    {
        return $this->transferAmount;
    }


}