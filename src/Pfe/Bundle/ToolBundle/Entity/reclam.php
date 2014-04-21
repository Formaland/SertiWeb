<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclam
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\Repository\ReclamRepository")
 */
class Reclam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reclam_ref", type="string", length=100)
     */
    private $reclamRef;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reclam_date", type="date")
     */
    private $reclamDate;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=100)
     */
    protected $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=100)
     */
    protected $sujet;

    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", inversedBy="reclams")
     * @ORM\JoinTable(name="Reclam_User",
     *      joinColumns={@ORM\JoinColumn(name="Reclam_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="User_id", referencedColumnName="id")}
     *      )
     */
    private $users;


    public function setUser(\Pfe\Bundle\UserBundle\Entity\User $users = NULL)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return Pfe\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->users;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Tool", inversedBy="reclams")
     * @ORM\JoinTable(name="Reclam_Tool",
     *      joinColumns={@ORM\JoinColumn(name="Reclam_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Tool_id", referencedColumnName="id")}
     *      )
     */
    private $tools;


    public function setTool(\Pfe\Bundle\ToolBundle\Entity\Tool $tools = NULL)
    {
        $this->tools = $tools;
        return $this;
    }

    /**
     * @return Pfe\Bundle\ToolBundle\Entity\Tool
     */
    public function getTool()
    {
        return $this->tools;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reclamRef
     *
     * @param string $reclamRef
     * @return Reclam
     */
    public function setReclamRef($reclamRef)
    {
        $this->reclamRef = $reclamRef;

        return $this;
    }

    /**
     * Get reclamRef
     *
     * @return string
     */
    public function getReclamRef()
    {
        return $this->reclamRef;
    }

    /**
     * Set reclamDate
     *
     * @param \DateTime $reclamDate
     * @return Reclam
     */
    public function setReclamDate($reclamDate)
    {
        $this->reclamDate = $reclamDate;

        return $this;
    }

    /**
     * Get reclamDate
     *
     * @return \DateTime
     */
    public function getReclamDate()
    {
        return $this->reclamDate;
    }


    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Reclam
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set Sujet
     *
     * @param string $sujet
     * @return Reclam
     */
    public function setSujet($sujet)
    {
        $sujets = self::getSujets();

        $this->sujet = $sujets[$sujet];

        return $this;
    }

    static public function getSujets()
    {
        return array('Panne', 'Arret', 'NonConforme');
    }

    public function getTextSujets()
    {
        $sujets = self::getSujets();
        return $sujets[$this->sujets];
    }

}