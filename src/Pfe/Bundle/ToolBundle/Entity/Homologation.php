<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Homologation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\Repository\HomologationRepository")
 */
class Homologation
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
     * @ORM\Column(name="fil_type", type="string", length=255)
     */
    private $fil_type;

    /**
     * @var float
     *
     * @ORM\Column(name="section", type="float")
     */
    private $section;

    /**
     * @var string
     *
     * @ORM\Column(name="standard", type="string", length=255)
     */
    private $standard;

    /**
     * @var string
     *
     * @ORM\Column(name="fil", type="string", length=100)
     */
    private $fil;

    /**
     * @var string
     *
     * @ORM\Column(name="fil_width", type="string", length=100)
     */
    private $filWidth;

    /**
     * @var string
     *
     * @ORM\Column(name="isolation_height", type="string", length=100)
     */
    private $isolationHeight;

    /**
     * @var string
     *
     * @ORM\Column(name="isolation_width", type="string", length=100)
     */
    private $isolationWidth;

    /**
     * @var string
     *
     * @ORM\Column(name="step_dch", type="string", length=10)
     */
    private $stepDch;

    /**
     * @var string
     *
     * @ORM\Column(name="step_ich", type="string", length=10)
     */
    private $stepIch;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Tool", inversedBy="homologation")
     * @ORM\JoinTable(name="Homologation_Tool",
     *      joinColumns={@ORM\JoinColumn(name="Homologation_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Tool_id", referencedColumnName="id")}
     *      )
     */
    private $tools;


    public function setTool(\Pfe\Bundle\ToolBundle\Entity\Tool $tools )
    {
        $this->tools = $tools;
        return $this;
    }

    /**
     * @return \Pfe\Bundle\ToolBundle\Entity\Tool
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
     * Set pos
     *
     * @param string $pos
     * @return Homologation
     */
    public function setFilType($fil_type)
    {
        $this->fil_type = $fil_type;
    
        return $this;
    }

    /**
     * Get pos
     *
     * @return string 
     */
    public function getFilType()
    {
        return $this->fil_type;
    }

    /**
     * Set section
     *
     * @param float $section
     * @return Homologation
     */
    public function setSection($section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return float 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set standard
     *
     * @param string $standard
     * @return Homologation
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
    
        return $this;
    }

    /**
     * Get standard
     *
     * @return string 
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Set fil
     *
     * @param string $fil
     * @return Homologation
     */
    public function setFil($fil)
    {
        $this->fil = $fil;
    
        return $this;
    }

    /**
     * Get fil
     *
     * @return string 
     */
    public function getFil()
    {
        return $this->fil;
    }

    /**
     * Set filWidth
     *
     * @param string $filWidth
     * @return Homologation
     */
    public function setFilWidth($filWidth)
    {
        $this->filWidth = $filWidth;
    
        return $this;
    }

    /**
     * Get filWidth
     *
     * @return string 
     */
    public function getFilWidth()
    {
        return $this->filWidth;
    }

    /**
     * Set isolationHeight
     *
     * @param string $isolationHeight
     * @return Homologation
     */
    public function setIsolationHeight($isolationHeight)
    {
        $this->isolationHeight = $isolationHeight;
    
        return $this;
    }

    /**
     * Get isolationHeight
     *
     * @return string 
     */
    public function getIsolationHeight()
    {
        return $this->isolationHeight;
    }

    /**
     * Set isolationWidth
     *
     * @param string $isolationWidth
     * @return Homologation
     */
    public function setIsolationWidth($isolationWidth)
    {
        $this->isolationWidth = $isolationWidth;
    
        return $this;
    }

    /**
     * Get isolationWidth
     *
     * @return string 
     */
    public function getIsolationWidth()
    {
        return $this->isolationWidth;
    }

    /**
     * Set stepDch
     *
     * @param string $stepDch
     * @return Homologation
     */
    public function setStepDch($stepDch)
    {
        $this->stepDch = $stepDch;
    
        return $this;
    }

    /**
     * Get stepDch
     *
     * @return string 
     */
    public function getStepDch()
    {
        return $this->stepDch;
    }

    /**
     * Set stepIch
     *
     * @param string $stepIch
     * @return Homologation
     */
    public function setStepIch($stepIch)
    {
        $this->stepIch = $stepIch;
    
        return $this;
    }

    /**
     * Get stepIch
     *
     * @return string 
     */
    public function getStepIch()
    {
        return $this->stepIch;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Homologation
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Homologation
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
