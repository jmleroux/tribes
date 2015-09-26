<?php
namespace Akeneo\Bundle\PimterestBundle\Twitter;

class Tweet
{
    /** @var Coordinates */
    protected $coordinates;

    /** @var string */
    protected $createdAt;

    /** @var int */
    protected $id;

    /** @var string */
    protected $idStr;

    /** @var \stdClass */
    protected $place;

    /** @var string */
    protected $text;

    /** @var \stdClass */
    protected $user;

    /** @var TwitterMediaEntity[] */
    protected $media;

    /**
     * @return TwitterMediaEntity[]
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param TwitterMediaEntity[] $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdStr()
    {
        return $this->idStr;
    }

    /**
     * @param string $idStr
     */
    public function setIdStr($idStr)
    {
        $this->idStr = $idStr;
    }

    /**
     * @return \stdClass
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param \stdClass $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return \stdClass
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \stdClass $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}