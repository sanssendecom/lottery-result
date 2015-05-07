<?php
/**
 * Sanstopu
 *
 * Powered  by sanssende.com
 * This file part of Sanssende LotteryBundle
 * Author: denizakturk
 */

namespace Sanssende\LotteryBundle\Controller;


use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sanssende\LotteryBundle\Connection\MpiConnection;
use Sanssende\LotteryBundle\Connection\ConnectionConstants;
use Sanssende\LotteryBundle\Adapter\OnNumaraAdapter;

/**
 * @Route("/example")
 * Class TestController
 * @package Sanssende\LotteryBundle\Controller
 */
class TestController extends Controller
{
    /**
     * @Route("/manuel")
     */
    public function manuelConnectionAction()
    {
        $mpiCon = new MpiConnection(new ConnectionConstants(ConnectionConstants::ONNUMARA), new \DateTime('2015-05-04'));
        $onnumara = new OnNumaraAdapter($mpiCon);
        dump($onnumara->getResult());
        exit;
        //return $onnumara->getResult();
    }

    /**
     * @Route("/service")
     */
    public function serviceConnectionAction()
    {
        $sayisalloto = $this->get('sayisalloto');
        $sayisalloto->setRaffleDate(new \DateTime('2015-04-25'));
        dump($sayisalloto->getResultClass());
        exit;
        //return $sayisalloto->getResultClass();
    }

    /**
     * @Route("/otherusingservice")
     */
    public function otherServiceConnectionAction()
    {
        $lottery = $this->get('lottery');
        $results = array();
        $result['sayisalloto'] = $lottery->setOption('SAYISALLOTO', new \DateTime('2015-04-25'))->getResultClass();
        $result['sanstopu'] = $lottery->setOption('SANSTOPU', new \DateTime('2015-05-06'))->getResultClass();
        dump($result);
        exit;

        //return array();

    }
}