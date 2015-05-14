<?php
/**
 * TicketAdapter
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Adapter;

class TicketAdapter extends DataAdapter
{
    public function __construct($jsonString)
    {
        parent::__construct($jsonString);
    }

    public function __get($variable)
    {
        if (isset($this->toObject()->{$variable}))
        {
            if (empty($this->toObject()->{$variable}))
            {
                $data = NULL;
            }
            else
            {
                $data = $this->toObject()->{$variable};
            }
        }
        else
        {
            if (method_exists($this, $variable))
            {
                $data = $this->{$variable}();
            }
            else
            {
                $data = NULL;
            }

        }

        return $data;
    }

    public function raffleName()
    {
        return $this->cekilisAdi;
    }

    public function raffleDate()
    {
        return new \DateTime($this->cekilisTarihi);
    }

    public function numberOfDigits()
    {
        return intval($this->haneSayisi);
    }

    public function result()
    {
        return $this->sonuclar;
    }

    public function winningDistricts()
    {
        return $this->buyukIkrKazananIlIlceler;
    }
}