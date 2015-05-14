<?php
/**
 * Piyango
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Mapping;

use Doctrine\Common\Collections\ArrayCollection;

class Piyango
{

    private $raffleName;
    private $raffleDate;
    private $numberOfDigits;
    private $result;
    private $winningProvinces;

    public function __construct()
    {
        $this->result = new ArrayCollection();
        $this->winningProvinces = new ArrayCollection();
    }

    public function setRaffleName($raffleName)
    {
        $this->raffleName = $raffleName;

        return $this;
    }

    public function getRaffleName()
    {
        return $this->raffleName;
    }

    public function setRaffleDate(\DateTime $raffleDate)
    {
        $this->raffleDate = $raffleDate;

        return $this;
    }

    public function getRaffleDate()
    {
        return $this->raffleDate;
    }

    public function setNumberOfDigits($numberOfDigits)
    {
        $this->numberOfDigits = $numberOfDigits;

        return $this;
    }

    public function getNumberOfDigits()
    {
        return $this->numberOfDigits;
    }

    /**
     * Add result
     *
     * @param TicketResult $ticketResult
     * @return Piyango
     */
    public function addResult(TicketResult $ticketResult)
    {
        $this->result[] = $ticketResult;

        return $this;
    }

    /**
     * Remove result
     *
     * @param TicketResult $ticketResult
     */
    public function removeResult(TicketResult $ticketResult)
    {
        $this->result->removeElement($ticketResult);

        return $this;
    }

    /**
     * Get result
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Add Province
     *
     * @param Province $province
     * @return Piyango
     */
    public function addWinningProvince(Province $province)
    {
        $this->winningProvinces[] = $province;

        return $this;
    }

    /**
     * Remove province
     *
     * @param Province $province
     */
    public function removeWinningProvince(Province $province)
    {
        $this->winningProvinces->removeElement($province);

        return $this;
    }

    public function getWinningProvinces()
    {
        return $this->winningProvinces;
    }

}