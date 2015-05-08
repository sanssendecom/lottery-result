<?php
/**
 * LotteryAdapter
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Adapter;

class LotteryAdapter extends DataAdapter
{

    public function __construct($jsonString)
    {
        parent::__construct($jsonString);
    }

    public function success()
    {
        return ($this->toObject()->success ? true : false);
    }

    public function __get($variable)
    {
        if (isset($this->toObject()->data->{$variable}))
        {
            if (empty($this->toObject()->data->{$variable}))
            {
                $data = NULL;
            }
            else
            {
                $data = $this->toObject()->data->{$variable};
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

    public function handed()
    {
        return (empty($this->devretti) ? 0 : 1);
    }

    public function speed()
    {
        return intval($this->devirSayisi);
    }

    public function cyprusRevenue()
    {
        return floatval($this->kibrisHasilati);
    }

    public function transferAmount()
    {
        return floatval($this->devirTutari);
    }

    public function numberOfColumn()
    {
        return intval($this->kolonSayisi);
    }

    public function tax()
    {
        return floatval($this->kdv);
    }

    public function bonusEh()
    {
        return floatval($this->ikramiyeEH);
    }

    public function week()
    {
        return intval($this->hafta);
    }

    public function totalRevenue()
    {
        return floatval($this->toplamHasilat);
    }

    public function revenues()
    {
        return floatval($this->hasilat);
    }

    public function gameOfChanceTax()
    {
        return floatval($this->sov);
    }

    public function jackpot()
    {
        return floatval($this->buyukIkramiye);
    }

    public function weekRollovers()
    {
        return floatval($this->haftayaDevredenTutar);
    }

    public function raffleDate()
    {
        $dateArray = explode('/', $this->cekilisTarihi);

        return new \DateTime(implode('-', array_reverse($dateArray)));
    }

    public function numbers()
    {
        $dataArray = explode('-', $this->rakamlarNumaraSirasi);
        array_walk($dataArray, create_function('&$val', '$val = intval(trim(strip_tags($val)));'));

        return $dataArray;
    }

    public function jackpotWinners()
    {
        return $this->bilenKisiler;
    }

    public function amountOfNextCycle()
    {
        return $this->haftayaDevredenTutar;
    }

}