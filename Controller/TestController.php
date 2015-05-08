<?php
/**
 * Sanstopu
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryResultBundle
 * Author: denizakturk
 */

namespace Sanssendecom\LotteryResultBundle\Controller;


use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sanssendecom\LotteryResultBundle\Connection\MpiConnection;
use Sanssendecom\LotteryResultBundle\Connection\ConnectionConstants;
use Sanssendecom\LotteryResultBundle\Adapter\OnNumaraAdapter;

/**
 * @Route("/example")
 * Class TestController
 * @package Sanssende\LotteryResultBundle\Controller
 */
class TestController extends Controller
{
    /**
     * @Route("/manuel", name="_lottery_test_manuel")
     * @Template()
     */
    public function manuelAction()
    {
        $mpiCon = new MpiConnection(new ConnectionConstants(ConnectionConstants::ONNUMARA), new \DateTime('2015-05-04'));
        $onnumara = new OnNumaraAdapter($mpiCon);
        return array('result' => $onnumara->getResult());
    }

    /**
     * @Route("/service", name="_lottery_test_service")
     * @Template()
     */
    public function serviceAction()
    {
        $sayisalloto = $this->get('sayisalloto');
        $sayisalloto->setRaffleDate(new \DateTime('2015-04-25'));

        return array('result' => $sayisalloto->getResultClass());
    }

    /**
     * @Route("/otherusesservice", name="_lottery_test_otherusesservice")
     * @Template()
     */
    public function otherUsesServiceAction()
    {
        $lottery = $this->get('lottery');
        $results = array();
        $result['sayisalloto'] = $lottery->setOption('SAYISALLOTO', new \DateTime('2015-04-25'))->getResultClass();
        $result['sanstopu'] = $lottery->setOption('SANSTOPU', new \DateTime('2015-05-06'))->getResultClass();

        return array('result' => $result);

    }
}