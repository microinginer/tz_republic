<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => $this->container->getParameter('kernel.root_dir'),
        ]);
    }
}
