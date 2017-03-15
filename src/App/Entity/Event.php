<?php
namespace CodeExperts\App\Entity;

use CodeExperts\App\Entity\Contract\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;


/**
 * Class Event
 * @ORM\Table("events")
 * @ORM\Entity
 */
class Event implements Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @JMS\Groups({"list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $venue;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $endDate;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $startTime;

    /**
     * @ORM\Column(type="string")
     *
     * @JMS\Groups({"list"})
     */
    private $endTime;

    /**
     * @ORM\Column(type="boolean")
     *
     * @JMS\Groups({"list"})
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime")
     *
     * @JMS\Groups({"list"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     *
     * @JMS\Groups({"list"})
     */
    private $updatedAt;

    /**
     * @var ArrayCollection
     */
    private $userCollection;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->userCollection = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Event
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
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Event
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param mixed $venue
     * @return Event
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Event
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     * @return Event
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     * @return Event
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     * @return Event
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return Event
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return Event
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getUserCollection()
    {
        return $this->userCollection;
    }

    /**
     * @param ArrayCollection $userCollection
     * @return Event
     */
    public function setUserCollection($userCollection)
    {
        $this->userCollection = $userCollection;
        return $this;
    }
}