<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{

    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(Request $request ): Response
    {
        return $this->render("base.html.twig"
//                , [
//            "firstName" => "franck"
//            ]
            );
    }

}
