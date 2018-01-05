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

    //List avalaible countries
    $countries = array(
      'france' => 'fr-FR',
      'belgique' => 'fr-BE',
      'suisse' => 'fr-CH',
      'luxembourg' => 'fr-LU',
      'united-states' => 'en-US',
      'united-kingdom' => 'en-GB',
      'australia' => 'en-AU',
      'new-zealand' => 'en-NZ',
      'canada' => 'en-CA',
      'ireland' => 'en-IE',
      'deutschland' => 'de-DE',
      'schweiz' => 'de-CH',
      'osterreich' => 'de-AT',
      'nederland' => 'nl-NL',
      'belgie' => 'nl-BE');

      //Add countries to Twig
      $this->twig->addGlobal('countries',$countries);

      //Switch language
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

        default:
        $request->setLocale('en');
        $this->twig->addGlobal('lang','en-US');
      }
    }
  }
