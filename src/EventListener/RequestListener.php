<?php

// src/EventListener/RequestListener.php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Request;

class RequestListener
{
  protected $twig;

  public function __construct(\Twig_Environment $twig)
  {
    $this->twig = $twig;
  }
  public function onKernelRequest(GetResponseEvent $event)
  {
    $request = $event->getRequest();
    $url = $request->getHost();
    list($sub,$domain,$tld) = explode(".",$url);
    switch($sub) {
      case 'france':
      $request->setLocale('fr');
      $this->twig->addGlobal('lang','fr-FR');
      break;

      case 'belgique':
      $request->setLocale('fr');
      $this->twig->addGlobal('lang','fr-BE');
      break;

      case 'suisse':
      $request->setLocale('fr');
      $this->twig->addGlobal('lang','fr-CH');
      break;

      case 'luxembourg':
      $request->setLocale('fr');
      $this->twig->addGlobal('lang','fr-LU');
      break;

      case 'united-states':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-US');
      break;

      case 'united-kingdom':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-GB');
      break;

      case 'australia':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-AU');
      break;

      case 'new-zealand':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-NZ');
      break;

      case 'canada':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-CA');
      break;

      case 'ireland':
      $request->setLocale('en');
      $this->twig->addGlobal('lang','en-IE');
      break;

      case 'deutschland':
      $request->setLocale('de');
      $this->twig->addGlobal('lang','de-DE');
      break;

      case 'schweiz':
      $request->setLocale('de');
      $this->twig->addGlobal('lang','de-CH');
      break;

      case 'osterreich':
      $request->setLocale('de');
      $this->twig->addGlobal('lang','de-AT');
      break;

      case 'nederland':
      $request->setLocale('de');
      $this->twig->addGlobal('lang','nl-NL');
      break;

      case 'belgie':
      $request->setLocale('de');
      $this->twig->addGlobal('lang','nl-BE');
      break;
    }
  }
}
