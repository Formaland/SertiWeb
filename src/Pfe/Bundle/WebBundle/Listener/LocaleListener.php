<?php

namespace Pfe\Bundle\WebBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocaleListener implements EventSubscriberInterface {

    private $container;
    private $current_user;

    public function getContainer() {
        return $this->container;
    }

    public function setContainer($container) {
        $this->container = $container;
    }

    public function getCurrentUser(){
        return $this->current_user;
    }

    public function setCurrentUser($security_context) {
        $this->current_user = $security_context->getToken();
    }

    public function onKernelRequest(GetResponseEvent $event) {

        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        if ($this->getCurrentUser()) {
            $locale = $this->getCurrentUser()->getDefaultLocale();
            $request->setLocale($locale);
        }
        else{
            $request->setLocale($this->container->getParameter('locale'));
        }
    }

    static public function getSubscribedEvents() {
        return array(
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        );
    }

}
