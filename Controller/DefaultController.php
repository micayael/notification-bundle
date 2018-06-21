<?php

namespace Micayael\NotificationBundle\Controller;

use Micayael\NotificationBundle\Entity\Notificacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/{id}/mark-as-read", name="notification.mark_as_read")
     * @Method("POST")
     */
    public function markAsReadAction(Request $request, Notificacion $notificacion)
    {
        $markAsSeen = $request->query->getBoolean('read');

        if ($markAsSeen) {
            $this->get('notification.manager')->markAsSeen($notificacion);
        } else {
            $this->get('notification.manager')->markAsUnseen($notificacion);
        }

        return new JsonResponse([
            'result' => 0,
        ]);
    }

    /**
     * @Route("/mark-all-as-read/{receptorTipo}/{receptorId}", name="notification.mark_all_as_read")
     * @Method("POST")
     */
    public function markAllAsReadAction($receptorTipo, $receptorId)
    {
        $this->get('notification.manager')->markAllAsSeen($receptorTipo, $receptorId);

        return new JsonResponse([
            'result' => 0,
        ]);
    }
}
