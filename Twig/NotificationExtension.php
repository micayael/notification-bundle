<?php

namespace Micayael\NotificationBundle\Twig;

use Micayael\NotificationBundle\Manager\NotificationManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NotificationExtension extends AbstractExtension
{
    protected $twig;

    protected $notificationManager;

    public function __construct(\Twig_Environment $twig, NotificationManager $notificationManager)
    {
        $this->twig = $twig;

        $this->notificationManager = $notificationManager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('notification_get_all', [$this, 'getAllNotificationsFunction']),
            new TwigFunction('notification_render', [$this, 'renderNotificationsFunction'], ['is_safe' => ['html']]),
            new TwigFunction('notification_count_unread', [$this, 'countUnreadNotificationsFunction']),
        ];
    }

    public function getAllNotificationsFunction(string $receptorTipo, string $receptorId)
    {
        return $this->notificationManager->getAllNotifications($receptorTipo, $receptorId);
    }

    public function renderNotificationsFunction(string $receptorTipo, string $receptorId, array $options = [])
    {
        $notifications = $this->notificationManager->getAllNotifications($receptorTipo, $receptorId);

        $template = array_key_exists('template', $options) ? $options['template'] : '@MicayaelNotification/list.html.twig';

        return $this->twig->render($template, [
                'notifications' => $notifications,
                'receptor_tipo' => $receptorTipo,
                'receptor_id' => $receptorId,
            ]
        );
    }

    public function countUnreadNotificationsFunction($receptorTipo, $receptorId, array $options = [])
    {
        $count = $this->notificationManager->countUnread($receptorTipo, $receptorId);

        return $count;
    }
}
