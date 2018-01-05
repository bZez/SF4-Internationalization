<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
  /**
  * @Route("/", name="Homepage",
  * host="{country}.symfony4.challenge")
  */
  public function index()
  {
    return $this->render('index.html.twig');
  }

}
