<?php

// src/EventListener/RequestListener.php
namespace App\EventListener;

use App\Entity\Country;
use App\Entity\Language;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    protected $twig;

    public function __construct(\Twig_Environment $twig, EntityManager $em)
    {
        $this->twig = $twig;
        $this->em = $em;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $countryRepository = $this->em->getRepository(Country::class);
        $languageRepository = $this->em->getRepository(Language::class);


        $request = $event->getRequest();
        $url = $request->getHost();
        list($sub, $domain, $tld) = explode(".", $url);

        $country = $countryRepository->findOneBy(array(
            'country' => $sub
        ));

        $countries = $countryRepository->findAll();
        $lang = $languageRepository->findOneBy(array(
            'country' => $country
        ));

        //Add countries to Twig
        $this->twig->addGlobal('countries', $countries);
        $this->twig->addGlobal('desc', $lang->getDescription());
        $this->twig->addGlobal('keywords', $lang->getKeywords());

        //Switch language
        switch ($sub) {
            case 'france':
                $request->setLocale('fr');
                $this->twig->addGlobal('lang', 'fr-FR');
                break;

            case 'belgique':
                $request->setLocale('fr');
                $this->twig->addGlobal('lang', 'fr-BE');
                break;

            case 'suisse':
                $request->setLocale('fr');
                $this->twig->addGlobal('lang', 'fr-CH');
                break;

            case 'luxembourg':
                $request->setLocale('fr');
                $this->twig->addGlobal('lang', 'fr-LU');
                break;

            case 'united-states':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-US');
                break;

            case 'united-kingdom':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-GB');
                break;

            case 'australia':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-AU');
                break;

            case 'new-zealand':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-NZ');
                break;

            case 'canada':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-CA');
                break;

            case 'ireland':
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-IE');
                break;

            case 'deutschland':
                $request->setLocale('de');
                $this->twig->addGlobal('lang', 'de-DE');
                break;

            case 'schweiz':
                $request->setLocale('de');
                $this->twig->addGlobal('lang', 'de-CH');
                break;

            case 'osterreich':
                $request->setLocale('de');
                $this->twig->addGlobal('lang', 'de-AT');
                break;

            case 'nederland':
                $request->setLocale('de');
                $this->twig->addGlobal('lang', 'nl-NL');
                break;

            case 'belgie':
                $request->setLocale('de');
                $this->twig->addGlobal('lang', 'nl-BE');
                break;

            default:
                $request->setLocale('en');
                $this->twig->addGlobal('lang', 'en-US');
        }
    }
}
