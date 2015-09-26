<?php
namespace Akeneo\Bundle\PimterestBundle\Twitter;

class TwitterMediaEntity
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $idStr;

    /** @var string */
    protected $mediaUrl;

    /** @var string */
    protected $expandedUrl;

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
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param string $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * @return string
     */
    public function getExpandedUrl()
    {
        return $this->expandedUrl;
    }

    /**
     * @param string $expandedUrl
     */
    public function setExpandedUrl($expandedUrl)
    {
        $this->expandedUrl = $expandedUrl;
    }
}