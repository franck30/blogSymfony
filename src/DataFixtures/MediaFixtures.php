<?php


namespace App\DataFixtures;


use App\Entity\Commentaire;
use App\Entity\Media;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $date = new DateTimeImmutable('2017-02-29');
        $url = "6-conseils-pour-booster-votre-productivite.html.twig";
        $media = new Media();

        $media->setUrl($url);
        $media->setDatePublication($date);

        $media->setNomAuteur("Franck");
        $media->setTitre("6 conseils pour booster votre productivite");
        $media->setUrlImage("employe_productif.jpg");
        $media->setTypeMedia(Media::ARTICLE);
        $media->setResume("Vous êtes peut-être salarié dans une entreprise, ou entrepreneur. Peut-être menez-vous tout simplement un projet qui vous tient à cœur, mais vous avez l’impression de ne pas avancer. De ne pas être suffisamment productif. Voici quelques conseils pour vous aider à optimiser votre temps de travail.");

        $manager->persist($media);

        $manager->flush();


        $media1 = new Media();

        $media1->setUrl("6-conseils-pour-booster-votre-productivite2.html.twig");
        $media1->setNomAuteur("Carin");
        $media1->setTitre("6 conseils pour booster votre productivite");
        $media1->setUrlImage("employe_productif.jpg");
        $media1->setTypeMedia(Media::ARTICLE);
        $media1->setResume("Vous êtes peut-être salarié dans une entreprise, ou entrepreneur. Peut-être menez-vous tout simplement un projet qui vous tient à cœur, mais vous avez l’impression de ne pas avancer. De ne pas être suffisamment productif. Voici quelques conseils pour vous aider à optimiser votre temps de travail.");

        $manager->persist($media1);

        $manager->flush();

        $media2 = new Media();

        $media2->setUrl("batissez-votre-carriere.html.twig");
        $media2->setNomAuteur("Carin");
        $media2->setDatePublication(new DateTimeImmutable('2018-04-11'));

        $media2->setTitre("Bâtissez votre carrière, ne la subissez pas !");
        $media2->setUrlImage("careerbuild.jpg");
        $media2->setTypeMedia(Media::ARTICLE);
        $media2->setResume("Chaque étape de l'évolution de votre projet professionnel est précieuse. Du choix de la formation au premier CDI en passant par vos choix de stages.");

        $manager->persist($media2);

        $manager->flush();


        $commentaire = new Commentaire();
        $commentaire->setAuteur("franck carin");
        $commentaire->setContenu("Merci pour cet article tres interessant, ca m'a vraiment permis d'ameliorer ma productivite");
        $commentaire->setMedia($media);

        $manager->persist($commentaire);

        $manager->flush();



    }

}
