<?php

namespace AppBundle\Service;

/**
 * Shortcut service for standard mailer.
 */
class MailerService
{
    protected $mailer;
    protected $twig;

    /**
     * Dependency Injection constructor.
     *
     * @param   \Swift_Mailer     $mailer
     * @param   \Twig_Environment $twig
     */
    public function __construct($mailer, $twig)
    {
        $this->mailer = $mailer;
        $this->twig   = $twig;
    }

    /**
     * Sends email as specified.
     *
     * If multiple recipients need to receive the message an array should be used.
     * Example: array('receiver@domain.org', 'other@domain.org' => 'A name')
     *
     * @param   string       $from_address Sender address.
     * @param   string       $from_name    Sender name.
     * @param   string|array $recipients   Recipient address(es).
     * @param   string       $subject      Email subject.
     * @param   string       $template     Path to Twig template of the email body.
     * @param   array        $args         Twig template parameters.
     *
     * @return  integer      The number of recipients who were accepted for delivery.
     */
    public function send($from_address, $from_name, $recipients, $subject, $template, $args = array())
    {
        $body = $this->twig->render($template, $args);

        $message = \Swift_Message::newInstance($subject, $body, 'text/html')
            ->setFrom($from_address, $from_name)
            ->setTo($recipients);

        return $this->mailer->send($message);
    }
}
