<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfferBookmark
 *
 * @ORM\Table(name="offer_bookmark")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OfferBookmarkRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class OfferBookmark
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cratedAt", type="datetime")
     */
    private $cratedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="offerBookmarks")
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="offerBookmarks")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cratedAt
     *
     * @param \DateTime $cratedAt
     *
     * @return OfferBookmark
     */
    public function setCratedAt($cratedAt)
    {
        $this->cratedAt = $cratedAt;

        return $this;
    }

    /**
     * Get cratedAt
     *
     * @return \DateTime
     */
    public function getCratedAt()
    {
        return $this->cratedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return OfferBookmark
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return OfferBookmark
     */
    public function setOffer(\AppBundle\Entity\Offer $offer = null)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return \AppBundle\Entity\Offer
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return OfferBookmark
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }
}
