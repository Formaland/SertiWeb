<?php
namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/** 
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="pfe_user")
 */
class User implements AdvancedUserInterface, \Serializable
{

    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $first_name;

    /** 
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $last_name;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $registration_number;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /** 
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $salt;

    /** 
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="array", nullable=false)
     */
    private $roles;

    /**
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;

    function __construct()
    {
        $date = new \DateTime();
        $this->token = base_convert(sha1(uniqid(mt_rand(1, 999) . $date->format('Y-m-d H:i:s'), true)), 16, 36);
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->roles = array();
        $this->locked = false;
        $this->enabled = true;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return $first_name
     */
    public function getFirstName()
    {
        return $this->first_name;
    }


    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $registration_number
     */
    public function setRegistrationNumber($registration_number)
    {
        $this->registration_number = $registration_number;
    }

    /**
     * @return $registration_number
     */
    public function getRegistrationNumber()
    {
        return $this->registration_number;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @internal param mixed $token
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function generateToken()
    {
        $date = new \DateTime();
        $token = sha1(uniqid(rand(1111, 9999) . $date->format('Y-m-d H:i:s'), true));
        $this->setToken = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    /**
     * @param mixed $roles
     * @return $this
     */
    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    public function addRole($role)
    {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return !$this->locked;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isCredentialsExpired()
    {
        return !$this->isCredentialsNonExpired();
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function isExpired()
    {
        return !$this->isAccountNonExpired();
    }

    public function isLocked()
    {
        return !$this->isAccountNonLocked();
    }

    public function eraseCredentials()
    {

    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof User) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        if ($this->registration_number !== $user->getRegistrationNumber()) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        return true;
    }


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

    public function __toString()
    {
        return (string) $this->getUsername();
    }
}