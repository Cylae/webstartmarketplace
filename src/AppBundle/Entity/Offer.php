<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OfferRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Offer
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

    /**
     * @var int
     *
     * @ORM\Column(name="views", type="integer")
     */
    private $views;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Offer image is required")
     * @Assert\Image()
     */
    private $offerImg;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="relatedOffer")
     */
    private $relatedMessages;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="offers")
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="OfferBookmark", mappedBy="offer")
     */
    private $offerBookmarks;

    /**
     * @ORM\ManyToOne(targetEntity="OfferSubCategory", inversedBy="offers")
     */
    private $subCategory;

    /**
     * @ORM\OneToOne(targetEntity="Transaction", mappedBy="offer")
     */
    private $transaction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->views = 0;
        $this->relatedMessages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offerBookmarks = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Offer
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Offer
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Offer
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Offer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Offer
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
     * Get offerImg
     *
     * @return Offer
     */
    public function setOfferImg($offerImg) {
        $this->offerImg = $offerImg;

        return $this;
    }

    /**
     * Set offerImg
     *
     * @return string
     */
    public function getOfferImg() {
        return $this->offerImg;
    }

    /**
     * Add relatedMessage
     *
     * @param \AppBundle\Entity\Offer $relatedMessage
     *
     * @return Offer
     */
    public function addRelatedMessage(\AppBundle\Entity\Offer $relatedMessage)
    {
        $this->relatedMessages[] = $relatedMessage;

        return $this;
    }

    /**
     * Remove relatedMessage
     *
     * @param \AppBundle\Entity\Offer $relatedMessage
     */
    public function removeRelatedMessage(\AppBundle\Entity\Offer $relatedMessage)
    {
        $this->relatedMessages->removeElement($relatedMessage);
    }

    /**
     * Get relatedMessages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRelatedMessages()
    {
        return $this->relatedMessages;
    }

    /**
     * Set author
     *
     * @param \AppBundle\Entity\User $author
     *
     * @return Offer
     */
    public function setAuthor(\AppBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add offerBookmark
     *
     * @param \AppBundle\Entity\OfferBookmark $offerBookmark
     *
     * @return Offer
     */
    public function addOfferBookmark(\AppBundle\Entity\OfferBookmark $offerBookmark)
    {
        $this->offerBookmarks[] = $offerBookmark;

        return $this;
    }

    /**
     * Remove offerBookmark
     *
     * @param \AppBundle\Entity\OfferBookmark $offerBookmark
     */
    public function removeOfferBookmark(\AppBundle\Entity\OfferBookmark $offerBookmark)
    {
        $this->offerBookmarks->removeElement($offerBookmark);
    }

    /**
     * Get offerBookmarks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOfferBookmarks()
    {
        return $this->offerBookmarks;
    }

    /**
     * Set subCategory
     *
     * @param \AppBundle\Entity\OfferSubCategory $subCategory
     *
     * @return Offer
     */
    public function setSubCategory(\AppBundle\Entity\OfferSubCategory $subCategory = null)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory
     *
     * @return \AppBundle\Entity\OfferSubCategory
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Set transaction
     *
     * @param \AppBundle\Entity\Offer $transaction
     *
     * @return Offer
     */
    public function setTransaction(\AppBundle\Entity\Offer $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \AppBundle\Entity\Offer
     */
    public function getTransaction()
    {
        return $this->transaction;
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
