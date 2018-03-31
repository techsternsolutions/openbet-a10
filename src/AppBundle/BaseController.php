<?php

namespace AppBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Extends classic Symfony Controller with several shortcut functions.
 */
class BaseController extends Controller
{
    /**
     * Returns absolute filesystem path to the "web" directory.
     *
     * @return  string
     */
    protected function getWebDir()
    {
        return $this->container->getParameter('kernel.root_dir') . '/../web';
    }

    /**
     * Shortcut to return the Entity Manager.
     *
     * @return  \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * Shortcut to return the Logger service.
     *
     * @return  \Symfony\Bridge\Monolog\Logger
     */
    protected function getLogger()
    {
        return $this->container->get('logger');
    }

    /**
     * Shortcut to return the Mailer service.
     *
     * @return  \AppBundle\Service\MailerService
     */
    protected function getMailer()
    {
        return $this->container->get('openbet.mailer');
    }

    /**
     * Shortcut to return the Security Context service.
     *
     * @return  \Symfony\Component\Security\Core\SecurityContext
     */
    protected function getSecurityContext()
    {
        return $this->container->get('security.context');
    }

    /**
     * Shortcut to return the Session service.
     *
     * @return  \Symfony\Component\HttpFoundation\Session\Session
     */
    protected function getSession()
    {
        return $this->container->get('session');
    }

    /**
     * Shortcut to return the Twig service.
     *
     * @return  \Twig_Environment
     */
    protected function getTwig()
    {
        return $this->container->get('twig');
    }

    /**
     * Shortcut to return the Validator service.
     *
     * @return  \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    protected function getValidator()
    {
        return $this->container->get('validator');
    }
}
