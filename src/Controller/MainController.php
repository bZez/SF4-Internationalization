<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends Controller
{
  /**
  * @Route("/", name="Francais",
  * host="{sub}.symfony4.challenge",
  * requirements={"sub"="france|belgique|luxembourg|suisse"})
  */
  public function indexFR()
  {
    return $this->render('index.html.twig',array(
      '_locale' => 'fr'
    ));
  }

  /**
  * @Route("/", name="Anglais",
  * host="{sub}.symfony4.challenge",
  * requirements={"sub"="united-kingdom|australia|new-zealand|canada|ireland|united-states"})
  */
  public function indexEN()
  {
    return $this->render('index.html.twig',array(
      '_locale' => 'en'
    ));
  }

  /**
  * @Route("/", name="Allemand",
  * host="{sub}.symfony4.challenge",
  * requirements={"sub"="deutschland|osterreich|schweiz"})
  */
  public function indexDE()
  {
    return $this->render('index.html.twig',array(
      '_locale' => 'de'
    ));
  }

  /**
  * @Route("/", name="Néérlandais",
  * host="{sub}.symfony4.challenge",
  * requirements={"sub"="belgie|nederland"})
  */
  public function indexNL()
  {
    return $this->render('index.html.twig',array(
      '_locale' => 'nl'
    ));
  }

  /**
  * @Route("/", name="Defaut")
  */
  public function index()
  {
    return $this->render('index.html.twig',array(
      '_locale' => 'en'
    ));
  }
}
