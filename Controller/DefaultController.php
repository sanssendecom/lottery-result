<?php

namespace Sanssendecom\LotteryResultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * @Route("/")
 * Class DefaultController
 * @package Sanssende\LotteryResultBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="_lottery_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

}
