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
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/connectiontest")
     */
    public function connectionTestAction()
    {
        /*
        $mpiCon = new MpiConnection(new ConnectionConstants(ConnectionConstants::ONNUMARA), new \DateTime('2015-05-04'));
        $sanstopu = new OnNumaraAdapter($mpiCon);
        print_r($sanstopu->getResult());exit;*/
        $sayisalloto = $this->get('sayisalloto');
        $sayisalloto->setRaffleDate(new \DateTime('2015-04-25'));
        dump($sayisalloto->getResultClass());exit;

    }
}
