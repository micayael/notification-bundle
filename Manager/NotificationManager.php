<?php

namespace Micayael\NotificationBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Micayael\NotificationBundle\Entity\Notificacion;

class NotificationManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createNotification(string $titulo, string $link = null, array $detalle = []): Notificacion
    {
        $notificacion = new Notificacion();

        $notificacion->setTitulo($titulo);
        $notificacion->setLink($link);
        $notificacion->setDetalle($detalle);

        $notificacion->setTipo(Notificacion::TYPE_APP);

        return $notificacion;
    }

    public function addNotification(Notificacion $notificacion, $flush = false)
    {
        $this->em->persist($notificacion);

        if ($flush) {
            $this->em->flush();
        }
    }

    public function getAllNotifications(string $receptorTipo, string $receptorId)
    {
        // TODO: falta ordenamiento por fecha desc
        $notifications = $this->em->getRepository('MicayaelNotificationBundle:Notificacion')->findBy([
            'receptorTipo' => $receptorTipo,
            'receptorId' => $receptorId,
        ],
        [
           'id' => 'desc',
        ]);

        return $notifications;
    }

    public function countUnread(string $receptorTipo, string $receptorId)
    {
        /**
         * @var QueryBuilder $qb
         */
        $qb = $this->em->getRepository('MicayaelNotificationBundle:Notificacion')->createQueryBuilder('n');

        $count = $qb
            ->select('count(n.id)')
            ->andWhere('n.leido = false')
            ->andWhere('n.receptorTipo = :receptorTipo')
            ->andWhere('n.receptorId = :receptorId')
            ->setParameter('receptorTipo', $receptorTipo)
            ->setParameter('receptorId', $receptorId)
            ->getQuery()
            ->getSingleScalarResult();

        return $count;
    }

    public function markAsSeen(Notificacion $notificacion)
    {
        $notificacion->setLeido(true);

        $this->em->persist($notificacion);
        $this->em->flush();
    }

    public function markAsUnseen(Notificacion $notificacion)
    {
        $notificacion->setLeido(false);

        $this->em->persist($notificacion);
        $this->em->flush();
    }

    public function markAllAsSeen(string $receptorTipo, string $receptorId)
    {
        $qb = $this->em->getRepository('MicayaelNotificationBundle:Notificacion')->createQueryBuilder('n');

        $qb
            ->update()
            ->set('n.leido', $qb->expr()->literal(true))
            ->where('n.receptorTipo = :receptorTipo')
            ->andWhere('n.receptorId = :receptorId')
            ->setParameter('receptorTipo', $receptorTipo)
            ->setParameter('receptorId', $receptorId)
            ->getQuery()
            ->execute();
    }
}
