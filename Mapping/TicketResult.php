<?php
/**
 * TicketResult
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Mapping;

class TicketResult
{

    private $numberOfDigits;
    private $type;
    private $jackpot;
    private $numbers;

    public function setNumberOfDigits($numberOfDigits)
    {
        $this->numberOfDigits = $numberOfDigits;

        return $this;
    }

    public function getNumberOfDigits()
    {
        return $this->numberOfDigits;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
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

    public function setNumbers(array $numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getNumbers()
    {
        return $this->numbers;
    }

}