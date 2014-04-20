<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CheckList
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\Repository\CheckListRepository")
 */
class CheckList
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
     * @var float
     *
     * @ORM\Column(name="ch", type="float")
     */
    private $ch;

    /**
     * @var float
     *
     * @ORM\Column(name="cb", type="float")
     */
    private $cb;

    /**
     * @var boolean
     *
     * @ORM\Column(name="attributif", type="boolean")
     */
    private $attributif;

    /**
     * @var boolean
     *
     * @ORM\Column(name="abstreifer", type="boolean")
     */
    private $abstreifer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="guide_finger", type="boolean")
     */
    private $guideFinger;

    /**
     * @var boolean
     *
     * @ORM\Column(name="messer", type="boolean")
     */
    private $messer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="drahtcrimp", type="boolean")
     */
    private $drahtcrimp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isocrimp", type="boolean")
     */
    private $isocrimp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ambos", type="boolean")
     */
    private $ambos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cale", type="boolean")
     */
    private $cale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="niederhalter", type="boolean")
     */
    private $niederhalter;

    /**
     * @var boolean
     *
     * @ORM\Column(name="position", type="boolean")
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fpr", type="boolean")
     */
    private $fpr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pdek", type="boolean")
     */
    private $pdek;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lpr", type="boolean")
     */
    private $lpr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="annexe5", type="boolean")
     */
    private $annexe5;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * Set ch
     *
     * @param float $ch
     * @return CheckList
     */
    public function setCh($ch)
    {
        $this->ch = $ch;
    
        return $this;
    }

    /**
     * Get ch
     *
     * @return float 
     */
    public function getCh()
    {
        return $this->ch;
    }

    /**
     * Set cb
     *
     * @param float $cb
     * @return CheckList
     */
    public function setCb($cb)
    {
        $this->cb = $cb;
    
        return $this;
    }

    /**
     * Get cb
     *
     * @return float 
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * Set attributif
     *
     * @param boolean $attributif
     * @return CheckList
     */
    public function setAttributif($attributif)
    {
        $this->attributif = $attributif;
    
        return $this;
    }

    /**
     * Get attributif
     *
     * @return boolean 
     */
    public function getAttributif()
    {
        return $this->attributif;
    }

    /**
     * Set abstreifer
     *
     * @param boolean $abstreifer
     * @return CheckList
     */
    public function setAbstreifer($abstreifer)
    {
        $this->abstreifer = $abstreifer;
    
        return $this;
    }

    /**
     * Get abstreifer
     *
     * @return boolean 
     */
    public function getAbstreifer()
    {
        return $this->abstreifer;
    }

    /**
     * Set guideFinger
     *
     * @param boolean $guideFinger
     * @return CheckList
     */
    public function setGuideFinger($guideFinger)
    {
        $this->guideFinger = $guideFinger;
    
        return $this;
    }

    /**
     * Get guideFinger
     *
     * @return boolean 
     */
    public function getGuideFinger()
    {
        return $this->guideFinger;
    }

    /**
     * Set messer
     *
     * @param boolean $messer
     * @return CheckList
     */
    public function setMesser($messer)
    {
        $this->messer = $messer;
    
        return $this;
    }

    /**
     * Get messer
     *
     * @return boolean 
     */
    public function getMesser()
    {
        return $this->messer;
    }

    /**
     * Set drahtcrimp
     *
     * @param boolean $drahtcrimp
     * @return CheckList
     */
    public function setDrahtcrimp($drahtcrimp)
    {
        $this->drahtcrimp = $drahtcrimp;
    
        return $this;
    }

    /**
     * Get drahtcrimp
     *
     * @return boolean 
     */
    public function getDrahtcrimp()
    {
        return $this->drahtcrimp;
    }

    /**
     * Set isocrimp
     *
     * @param boolean $isocrimp
     * @return CheckList
     */
    public function setIsocrimp($isocrimp)
    {
        $this->isocrimp = $isocrimp;
    
        return $this;
    }

    /**
     * Get isocrimp
     *
     * @return boolean 
     */
    public function getIsocrimp()
    {
        return $this->isocrimp;
    }

    /**
     * Set ambos
     *
     * @param boolean $ambos
     * @return CheckList
     */
    public function setAmbos($ambos)
    {
        $this->ambos = $ambos;
    
        return $this;
    }

    /**
     * Get ambos
     *
     * @return boolean 
     */
    public function getAmbos()
    {
        return $this->ambos;
    }

    /**
     * Set cale
     *
     * @param boolean $cale
     * @return CheckList
     */
    public function setCale($cale)
    {
        $this->cale = $cale;
    
        return $this;
    }

    /**
     * Get cale
     *
     * @return boolean 
     */
    public function getCale()
    {
        return $this->cale;
    }

    /**
     * Set niederhalter
     *
     * @param boolean $niederhalter
     * @return CheckList
     */
    public function setNiederhalter($niederhalter)
    {
        $this->niederhalter = $niederhalter;
    
        return $this;
    }

    /**
     * Get niederhalter
     *
     * @return boolean 
     */
    public function getNiederhalter()
    {
        return $this->niederhalter;
    }

    /**
     * Set position
     *
     * @param boolean $position
     * @return CheckList
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return boolean 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set fpr
     *
     * @param boolean $fpr
     * @return CheckList
     */
    public function setFpr($fpr)
    {
        $this->fpr = $fpr;
    
        return $this;
    }

    /**
     * Get fpr
     *
     * @return boolean 
     */
    public function getFpr()
    {
        return $this->fpr;
    }

    /**
     * Set pdek
     *
     * @param boolean $pdek
     * @return CheckList
     */
    public function setPdek($pdek)
    {
        $this->pdek = $pdek;
    
        return $this;
    }

    /**
     * Get pdek
     *
     * @return boolean 
     */
    public function getPdek()
    {
        return $this->pdek;
    }

    /**
     * Set lpr
     *
     * @param boolean $lpr
     * @return CheckList
     */
    public function setLpr($lpr)
    {
        $this->lpr = $lpr;
    
        return $this;
    }

    /**
     * Get lpr
     *
     * @return boolean 
     */
    public function getLpr()
    {
        return $this->lpr;
    }

    /**
     * Set annexe5
     *
     * @param boolean $annexe5
     * @return CheckList
     */
    public function setAnnexe5($annexe5)
    {
        $this->annexe5 = $annexe5;
    
        return $this;
    }

    /**
     * Get annexe5
     *
     * @return boolean 
     */
    public function getAnnexe5()
    {
        return $this->annexe5;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return CheckList
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
