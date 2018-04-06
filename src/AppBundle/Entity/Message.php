<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Message
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sentMessages")
     */
    private $srcUser;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="receivedMessages")
     */
    private $destUser;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="relatedMessages")
     */
    private $relatedOffer;

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
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Message
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
     * @return Message
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
     * Set srcUser
     *
     * @param \AppBundle\Entity\User $srcUser
     *
     * @return Message
     */
    public function setSrcUser(\AppBundle\Entity\User $srcUser = null)
    {
        $this->srcUser = $srcUser;

        return $this;
    }

    /**
     * Get srcUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getSrcUser()
    {
        return $this->srcUser;
    }

    /**
     * Set destUser
     *
     * @param \AppBundle\Entity\User $destUser
     *
     * @return Message
     */
    public function setDestUser(\AppBundle\Entity\User $destUser = null)
    {
        $this->destUser = $destUser;

        return $this;
    }

    /**
     * Get destUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getDestUser()
    {
        return $this->destUser;
    }

    /**
     * Set relatedOffer
     *
     * @param \AppBundle\Entity\Offer $relatedOffer
     *
     * @return Message
     */
    public function setRelatedOffer(\AppBundle\Entity\Offer $relatedOffer = null)
    {
        $this->relatedOffer = $relatedOffer;

        return $this;
    }

    /**
     * Get relatedOffer
     *
     * @return \AppBundle\Entity\Offer
     */
    public function getRelatedOffer()
    {
        return $this->relatedOffer;
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
