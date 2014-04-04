<?php

namespace Pfe\Bundle\ReclamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclam
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ReclamBundle\Entity\ReclamRepository")
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
}
