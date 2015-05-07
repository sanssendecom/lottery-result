<?php
/**
 * DataAdapter
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryBundle
 * Author: denizakturk
 */

namespace Sanssende\LotteryBundle\Adapter;

use Sanssende\LotteryBundle\Exception\JsonException;

class DataAdapter
{
    private $jsonData;
    private $jsonDecode;

    public function __construct($jsonString)
    {
        $this->jsonData = $jsonString;
        $this->jsonValidate();
    }

    protected function jsonValidate()
    {
        $this->jsonDecode = json_decode($this->jsonData);
        if (is_null($this->jsonDecode))
        {
            throw new JsonException('Lottery result data not found or damaged format');
        }
    }

    protected function toObject()
    {
        return $this->jsonDecode;
    }
}