<?php

namespace Micayael\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Notification
{
    const TYPE_APP = 2;
    const TYPE_EMAIL = 4;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="json_unicode")
     */
    private $details;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $receiverType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $receiverId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $seen = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $type = self::TYPE_APP;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Notification
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return Notification
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     *
     * @return Notification
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     *
     * @return Notification
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceiverType()
    {
        return $this->receiverType;
    }

    /**
     * @param mixed $receiverType
     *
     * @return Notification
     */
    public function setReceiverType($receiverType)
    {
        $this->receiverType = $receiverType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * @param mixed $receiverId
     *
     * @return Notification
     */
    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * @param mixed $seen
     *
     * @return Notification
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
