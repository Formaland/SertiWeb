<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Terminal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\TerminalRepository")
 */
class Terminal
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
     * @ORM\Column(name="Nbr", type="string", length=100)
     */
    private $nbr;

    /**
     * @var string
     *
     * @ORM\Column(name="supplierName", type="string", length=100)
     */
    private $supplierName;

    /**
     * @var string
     *
     * @ORM\Column(name="leoniNbr", type="string", length=100)
     */
    private $leoniNbr;

    /**
     * @var string
     *
     * @ORM\Column(name="crossSection", type="string", length=100)
     */
    private $crossSection;



    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Terminal", inversedBy="terminals")
     * @ORM\JoinTable(name="Terminal_Type",
     *      joinColumns={@ORM\JoinColumn(name="Terminal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="TerminalType_id", referencedColumnName="id")}
     *      )
     */
    private  $type;

    public function setType(\Pfe\Bundle\ToolBundle\Entity\Tool $type = NULL)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Pfe\Bundle\ToolBundle\Entity\Terminal
     */
    public function getType()
    {
        return $this->type;
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
     * Set nbr
     *
     * @param string $nbr
     * @return Terminal
     */
    public function setNbr($nbr)
    {
        $this->nbr = $nbr;
    
        return $this;
    }

    /**
     * Get nbr
     *
     * @return string 
     */
    public function getNbr()
    {
        return $this->nbr;
    }

    /**
     * Set supplierName
     *
     * @param string $supplierName
     * @return Terminal
     */
    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
    
        return $this;
    }

    /**
     * Get supplierName
     *
     * @return string 
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * Set leoniNbr
     *
     * @param string $leoniNbr
     * @return Terminal
     */
    public function setLeoniNbr($leoniNbr)
    {
        $this->leoniNbr = $leoniNbr;
    
        return $this;
    }

    /**
     * Get leoniNbr
     *
     * @return string 
     */
    public function getLeoniNbr()
    {
        return $this->leoniNbr;
    }

    /**
     * Set crossSection
     *
     * @param string $crossSection
     * @return Terminal
     */
    public function setCrossSection($crossSection)
    {
        $this->crossSection = $crossSection;
    
        return $this;
    }

    /**
     * Get crossSection
     *
     * @return string 
     */
    public function getCrossSection()
    {
        return $this->crossSection;
    }
}
