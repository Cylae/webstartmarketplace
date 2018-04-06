<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfferSubCategory
 *
 * @ORM\Table(name="offer_sub_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OfferSubCategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class OfferSubCategory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @ORM\ManyToOne(targetEntity="OfferCategory", inversedBy="subCategories")
     */
    private $parentCategory;

    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="subCategory")
     */
    private $offers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->offers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return OfferSubCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return OfferSubCategory
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
     * @return OfferCategory
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
     * Set parentCategory
     *
     * @param \AppBundle\Entity\OfferCategory $parentCategory
     *
     * @return OfferSubCategory
     */
    public function setParentCategory(\AppBundle\Entity\OfferCategory $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \AppBundle\Entity\OfferCategory
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return OfferSubCategory
     */
    public function addOffer(\AppBundle\Entity\Offer $offer)
    {
        $this->offers[] = $offer;

        return $this;
    }

    /**
     * Remove offer
     *
     * @param \AppBundle\Entity\Offer $offer
     */
    public function removeOffer(\AppBundle\Entity\Offer $offer)
    {
        $this->offers->removeElement($offer);
    }

    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffers()
    {
        return $this->offers;
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
