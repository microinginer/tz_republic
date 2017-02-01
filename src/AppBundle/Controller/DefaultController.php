<?php

namespace AppBundle\Controller;

use AppBundle\Util\ShortUrl;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \RuntimeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     */
    public function indexAction()
    {
        /**
         * @var $shortUrl ShortUrl
         */
        $shortUrl = $this->get('short_url');

        return $this->render('default/index.html.twig', [
            'shortUrl' => $shortUrl->create(
                'http://stackoverflow.com/questions/13066919/google-api-url-shortener-with-php'
            ),
        ]);
    }
}
