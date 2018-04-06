<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
    * @Assert\NotBlank()
    * @Assert\Length(max=4096)
    */
    private $plainPassword;

    /**
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer")
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

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
     * @ORM\OneToMany(targetEntity="Message", mappedBy="srcUser")
     */
    private $sentMessages;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="destUser")
     */
    private $receivedMessages;

    /**
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="user")
     */
    private $notifications;

    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="author")
     */
    private $offers;

    /**
     * @ORM\OneToMany(targetEntity="OfferBookmark", mappedBy="user")
     */
    private $offerBookmarks;

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="destUser")
     */
    private $acquiredOfferTransactions;


    public function __construct()
    {
        $this->isActive = true;
        $this->sentMessages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->receivedMessages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offerBookmarks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->acquiredOfferTransactions = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set plainPassword
     *
     * @param string $password
     *
     * @return User
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return User
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @return User
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

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Add sentMessage
     *
     * @param \AppBundle\Entity\Message $sentMessage
     *
     * @return User
     */
    public function addSentMessage(\AppBundle\Entity\Message $sentMessage)
    {
        $this->sentMessages[] = $sentMessage;

        return $this;
    }

    /**
     * Remove sentMessage
     *
     * @param \AppBundle\Entity\Message $sentMessage
     */
    public function removeSentMessage(\AppBundle\Entity\Message $sentMessage)
    {
        $this->sentMessages->removeElement($sentMessage);
    }

    /**
     * Get sentMessages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSentMessages()
    {
        return $this->sentMessages;
    }

    /**
     * Add receivedMessage
     *
     * @param \AppBundle\Entity\Message $receivedMessage
     *
     * @return User
     */
    public function addReceivedMessage(\AppBundle\Entity\Message $receivedMessage)
    {
        $this->receivedMessages[] = $receivedMessage;

        return $this;
    }

    /**
     * Remove receivedMessage
     *
     * @param \AppBundle\Entity\Message $receivedMessage
     */
    public function removeReceivedMessage(\AppBundle\Entity\Message $receivedMessage)
    {
        $this->receivedMessages->removeElement($receivedMessage);
    }

    /**
     * Get receivedMessages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReceivedMessages()
    {
        return $this->receivedMessages;
    }

    /**
     * Add notification
     *
     * @param \AppBundle\Entity\Notification $notification
     *
     * @return User
     */
    public function addNotification(\AppBundle\Entity\Notification $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \AppBundle\Entity\Notification $notification
     */
    public function removeNotification(\AppBundle\Entity\Notification $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Add offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return User
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
     * Add offerBookmark
     *
     * @param \AppBundle\Entity\OfferBookmark $offerBookmark
     *
     * @return User
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
     * Add acquiredOfferTransaction
     *
     * @param \AppBundle\Entity\Transaction $acquiredOfferTransaction
     *
     * @return User
     */
    public function addAcquiredOfferTransaction(\AppBundle\Entity\Transaction $acquiredOfferTransaction)
    {
        $this->acquiredOfferTransactions[] = $acquiredOfferTransaction;

        return $this;
    }

    /**
     * Remove acquiredOfferTransaction
     *
     * @param \AppBundle\Entity\Transaction $acquiredOfferTransaction
     */
    public function removeAcquiredOfferTransaction(\AppBundle\Entity\Transaction $acquiredOfferTransaction)
    {
        $this->acquiredOfferTransactions->removeElement($acquiredOfferTransaction);
    }

    /**
     * Get acquiredOfferTransactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAcquiredOfferTransactions()
    {
        return $this->acquiredOfferTransactions;
    }
}
