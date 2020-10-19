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
class DetailsController extends AbstractController
{

    /**
     * @Route("/detail", name="detail")
     * @return Response
     */
    public function index(Request $request ): Response
    {
        return $this->render("details.html.twig"
//                , [
//            "firstName" => "franck"
//            ]
        );
    }

}
