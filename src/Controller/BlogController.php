<?php


namespace App\Controller;


use App\Entity\Commentaire;
use App\Entity\LikeMedia;
use App\Entity\Media;
use App\FormType\CommentaireType;
use App\FormType\ComType;
use App\Repository\LikeCommentaireRepository;
use App\Repository\LikeMediaRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends  AbstractController
{

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function renderBlog() {

        $em = $this->getDoctrine()->getManager();
//        $query = $em->createQuery(
//            'SELECT m FROM App\Entity\Media m ORDER BY m.date_publication DESC '
//        );

//        $media = $query->getResult();


        $medias = $em ->getRepository('App:Media') ->findAllOrderedByDate_publication();


        return $this->render("blog.html.twig", [

            "medias"=>$medias
        ]);
    }


    /**
     * @Route("/blog/{urlMedia}", name="afficheMedia")
     * @param $urlMedia
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function renderMedia($urlMedia, Request $request) {


            $em = $this->getDoctrine()->getManager();
//        $query = $em->createQuery(
//            'SELECT m FROM App\Entity\Media m ORDER BY m.date_publication DESC '
//        );

//        $media = $query->getResult();
//         $media = new Media();
            $media = $em->getRepository('App:Media')->findOneBy(['url' => $urlMedia]);
            $commentaires = $em->getRepository('App:Commentaire')->findBy(['media' => $media]);


//        $media1 = new Media();
//        $media1 = $media;

            $comment = new Commentaire();
            $comment->setMedia($media);


        $com = new Commentaire();
//        $com->setParent($comment);

            $form = $this->createForm(CommentaireType::class, $comment)->handleRequest($request);
        $form2 = $this->createForm(ComType::class, $com)->handleRequest($request);
        if($request->isMethod('post')) {
            if ($form->isSubmitted() && $form->isValid()) {
                if($this->getUser()){
                    $comment->setAuteur($this->getUser()->getNom());
                }

                $this->getDoctrine()->getManager()->persist($comment);
                $this->getDoctrine()->getManager()->flush();
//             return $this->redirectToRoute("afficheMedia", ["urlMedia" => $media->getUrl()]);
            }
        }

//         $urlMedia = $em->getRepository('App:Media') -> findMediaUrlById($id);

        if($urlMedia = "6-conseils-pour-booster-votre-productivite.html.twig"){
            return $this->render("6-conseils-pour-booster-votre-productivite.html.twig", [

                "media"=>$media,
                "urlMedia"=>$urlMedia,
                "commentaires"=>$commentaires,
                "form" =>$form->createView()
            ]);
        }
        elseif ($urlMedia = "6-conseils-pour-booster-votre-productivite2.html.twig") {
            return $this->render("6-conseils-pour-booster-votre-productivite2.html.twig", [

                "media" => $media,
                "urlMedia" => $urlMedia,
                "commentaires" => $commentaires,
                "form" =>$form->createView()
            ]);
        }

        elseif ($urlMedia = "batissez-votre-carriere.html.twig") {
            return $this->render("batissez-votre-carriere.html.twig", [

                "media" => $media,
                "urlMedia" => $urlMedia,
                "commentaires" => $commentaires,
                "form" =>$form->createView()
            ]);
        }

        else {
            return $this->render("blog.html.twig");
        }

    }


    /**
     * @Route("/comments/{idParent}", name="afficheComments")
     * @param $idParent
     * @param Request $request
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function renderComments($idParent, Request $request) {

        $em = $this->getDoctrine()->getManager();
//        $query = $em->createQuery(
//            'SELECT m FROM App\Entity\Media m ORDER BY m.date_publication DESC '
//        );

//        $media = $query->getResult();
        $comParent = $em->getRepository('App:Commentaire') ->findOneBy(['id'=>$idParent]);

        $com = new Commentaire();
        $com->setParent($comParent);
        $form = $this->createForm(ComType::class, $com)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($com);
            $this->getDoctrine()->getManager()->flush();
//            return $this->redirectToRoute("afficheComments", ["idParent" =>$idParent]);
        }

        $comments = $em ->getRepository('App:Commentaire') ->findBy(['parent' => $comParent  ]);

        if ($request->isXmlHttpRequest()){

            $jsonData = array();
            $idx = 0;
            foreach($comments as $c) {
                $temp = array(
                    'id' => $c->getId(),
                    'contenu' => $c->getContenu(),
                    'children' => $c->getChildren(),
                    'auteur' => $c->getAuteur(),
                    'date' => $c->getDatePublication()
                );
                $jsonData[$idx++] = $temp;
            }
            $this->$form->createView();
            return new JsonResponse($jsonData);
        }



        return $this->render("comment.html.twig", [
            "idParent"=> $idParent,
            "comParent"=>$comParent,

            "comments"=>$comments,
            "form" =>$form->createView()
        ]);
    }



    /**
     * @Route("/commentaires/{idParent}", name="afficheCommentaires")
     * @param $idParent
     * @param Request $request
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function afficheComments($idParent, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $comParent = $em->getRepository('App:Commentaire') ->findOneBy(['id'=>$idParent]);


        $auteur = $request->request->get('auteur');
        $message = $request->request->get('message');

        if($request->isXmlHttpRequest()) {
            $com = new Commentaire();
            $com->setParent($comParent);
            $com->setContenu($message);
            $com->setAuteur($auteur);

            $this->getDoctrine()->getManager()->persist($com);
            $this->getDoctrine()->getManager()->flush();

        }

        return new Response("pas une requete ajax");
    }


    /**
     * @Route("/post/{id}/like", name="post_like")
     * @param Media $media
     * @param Request $request
     * @return Response
     */
    public function likerMedia(Media $media,Request $request) : Response {

        $em = $this->getDoctrine()->getManager();


        $user = $this->getUser();

        if (!$user) return $this->json([
            'message' =>"non Autorisé"
        ], 403);

//        if ($request->isMethod('POST')) {
            if ($media->isLikedByUser($user)) {
                $likeMedia = $em->getRepository('App:LikeMedia')->findOneBy([
                    'media' => $media,
                    "user" => $user
                ]);
                $em->remove($likeMedia);
                $em->flush();

                $this->getDoctrine()->getRepository('App:LikeMedia')->count(['media' => $media]);


                return $this->json([
                    'likes' => $em->getRepository('App:LikeMedia')->count(['media' => $media])
                ], 200);
            }

            $like = new LikeMedia();
            $like->setMedia($media)
                ->setUser($user);

            $em->persist($like);
            $em->flush();
//        }

        return $this->json([
            'likes' => $em->getRepository('App:LikeMedia')->count(['media' => $media])
        ], 200);
    }



}
