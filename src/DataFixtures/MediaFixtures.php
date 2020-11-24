<?php


namespace App\DataFixtures;


use App\Entity\Commentaire;
use App\Entity\Media;
use App\Entity\PaysOrigine;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tab_pays = array("Afghanistan ", " Afrique du Sud ", " Albanie ", " Algérie ", " Allemagne ", " Andorre ", " Angola ", " Anguilla ", " Antarctique ", " Antigua-et-Barbuda ", " Antilles néerlandaises ", " Arabie saoudite ", " Argentine ", " Arménie ", " Aruba ", " Australie ", " Autriche ", " Azerbaïdjan ", " Bahamas ", " Bahreïn ", " Bangladesh ", " Barbade ", " Bélarus ", " Belgique ", " Belize ", " Bénin ", " Bermudes ", " Bhoutan ", " Bolivie ", " Bosnie-Herzégovine ", " Botswana ", " Brésil ", " Brunéi Darussalam ", " Bulgarie ", " Burkina Faso ", " Burundi ", " Cambodge ", " Cameroun ", " Canada ", " Cap-Vert ", " Chili ", " Chine ", " Chypre ", " Colombie ", " Comores ", " Congo ", " Corée du nord ", " Corée du sud ", " Costa Rica ", " Côte d’Ivoire ", " Croatie ", " Cuba ", " Danemark ", " Djibouti ", " Dominique ", " Egypte ", " El Salvador ", " Emirats arabes unis ", " Equateur ", " Erythrée ", " Espagne ", " Estonie ", " Etats-Unis d’Amérique ", " Ethiopie ", " Fédération de Russie ", " Fidji ", " Finlande ", " France ", " Gabon ", " Gambie ", " Géorgie ", " Ghana ", " Gibraltar ", " Grèce ", " Groenland ", " Guadeloupe ", " Guam ", " Guatemala ", " Guinée ", " Guinée équatoriale ", " Guinée-Bissau ", " Guyana ", " Guyane française ", " Haïti ", " Honduras ", " Hong Kong ", " Hongrie ", " Ile De Bouvet ", " Ile Norfolk ", " Iles Caïmanes ", " Iles Cook<" , " Iles d’Aland ", " Iles Falkland ", " Iles Féroé ", " Iles Mariannes septentrionales ", " Iles Marshall ", " Iles Salomon ", " Iles Svalbard et Jan Mayen ", " Iles Turques et Caïques ", " Iles Vierges américaines ", " Iles Vierges britanniques ", " Iles Wallis et Futuna ", " Inde ", " Indonésie ", " Iran ", " Iraq ", " Irlande ", " Islande ", " Israel ", " Italie ", " Jamaïque ", " Japon ", " Jordanie ", " Kazakhstan ", " Kenya ", " Kirghizistan ", " Kiribati ", " Koweït ", " Laos ", " Lesotho ", " Lettonie ", " Liban ", " Libéria ", " Libye ", " Liechtenstein ", " Lituanie ", " Luxembourg ", " Macao ", " Madagascar ", " Malaisie ", " Malawi ", " Maldives ", " Mali ", " Malte ", " Maroc ", " Martinique ", " Maurice ", " Mauritanie ", " Mayotte ", " Mexique ", " Micronésie ", " Moldovie ", " Monaco ", " Mongolie ", " Montserrat ", " Mozambique ", " Myanmar ", " Namibie ", " Nauru ", " Népal ", " Nicaragua ", " Niger ", " Nigéria ", " Nioué ", " Norvège ", " Nouvelle-Calédonie ", " Nouvelle-Zélande ", " Oman ", " Ouganda ", " Ouzbékistan ", " Pakistan ", " Palaos ", " Panama ", " Papouasie-Nouvelle-Guinée ", " Paraguay ", " Pays-Bas ", " Pérou ", " Philippines ", " Pitcairn ", " Pologne ", " Polynésie française ", " Porto Rico ", " Portugal ", " Qatar ", " République centrafricaine ", " République démocratique du Congo ", " République dominicaine ", " République tchèque ", " Réunion ", " Roumanie ", " Royaume-Uni ", " Rwanda ", " Saint-Kitts-et-Nevis ", " Saint-Marin ", " Saint-Pierre-et-Miquelon ", " Saint-Siège ", " Saint-Vincent-et-les Grenadines ", " Sainte-Hélène ", " Sainte-Lucie ", " Samoa ", " Samoas américaines ", " Sao Tomé-et-Principe ", " Sénégal ", " Serbie-et-Monténégro ", " Seychelles ", " Sierra Leone ", " Singapour ", " Slovaquie ", " Slovénie ", " Somalie ", " Soudan ", " Sri Lanka ", " Suède ", " Suisse ", " Suriname ", " Swaziland ", " Syrie ", " Tadjikistan ", " Taiwan ", " Tanzanie ", " Tchad ", " Territoire palestinien occupé ", " Thaïlande ", " Timor-Leste ", " Togo ", " Tokélaou ", " Tonga ", " Trinité-et-Tobago ", " Tunisie ", " Turkménistan ", " Turquie ", " Tuvalu ", " Ukraine ", " Uruguay ", " Vanuatu ", " Venezuela ", " Viet Nam ", " Yémen ", " Zambie ", " Zimbabwe ");

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


        foreach ($tab_pays as $pays) {
            $paysOrigine =new PaysOrigine();
            $paysOrigine->setLibelle($pays);
            $manager->persist($paysOrigine);

            $manager->flush();

        }

    }

}
