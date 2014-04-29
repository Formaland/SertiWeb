<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\Repository\InterventionRepository")
 */
class Intervention
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
     * @ORM\Column(name="ref", type="string", length=100)
     */
    private $ref;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=100)
     */
    private $contenu;


    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Reclam", inversedBy="interventions")
     * @ORM\JoinTable(name="Intervention_Reclam",
     *      joinColumns={@ORM\JoinColumn(name="Intervention_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Reclam_id", referencedColumnName="id")}
     *      )
     */
    private $reclams;


    public function setReclam(\Pfe\Bundle\ToolBundle\Entity\Reclam $reclams )
    {
        $this->reclams = $reclams;
        return $this;
    }

    /**
     * @return \Pfe\Bundle\ToolBundle\Entity\Reclam
     */
    public function getReclam()
    {
        return $this->reclams;
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
     * Set ref
     *
     * @param string $ref
     * @return Intervention
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    
        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Intervention
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

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Intervention
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
}
