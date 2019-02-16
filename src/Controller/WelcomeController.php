<?php
/**
 * Class/file WelcomeController.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/16/2019
 * Time: 7:11 PM
 */

namespace App\Controller;

use App\Controller\ApiController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WelcomeController
 * @package App\Controller
 *
 * @Route("/")
 */
class WelcomeController extends ApiController
{
    /**
     * @Route("", name="welcome")
     * @return string
     */
    public function users()
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
