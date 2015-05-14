<?php
/**
 * Province
 *
 * Powered by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Mapping;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

class Province
{
    private $code;
    private $name;
    private $districts;

    public function __construct()
    {
        $this->districts = new ArrayCollection();
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Add result
     *
     * @param District $district
     * @return Province
     */
    public function addDistrict(District $district)
    {
        $this->districts[] = $district;

        return $this;
    }

    /**
     * Remove result
     *
     * @param Districts $district
     */
    public function removeDistrict(District $district)
    {
        $this->districts->removeElement($district);
    }

    /**
     * Get districts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDistricts()
    {
        return $this->districts;
    }

    public function getNumberOfPeopleFromDistricts()
    {
        $numberOfPeoples = 0;
        foreach ($this->getDistricts() as $district)
        {
            $numberOfPeoples += $district->getNumberOfPeople();
        }

        return $numberOfPeoples;
    }

    public function getDistrictsByCode($code)
    {
        $criteria = Criteria::create()->where(Criteria::expr()->eq('code', $code));

        return $this->getDistricts()->matching($criteria);
    }
}