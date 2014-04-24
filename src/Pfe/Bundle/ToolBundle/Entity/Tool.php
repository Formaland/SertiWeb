<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tool
 *
 * @ORM\Table(name="pfe_tools")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\Repository\ToolRepository")
 */
class Tool
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
     * @ORM\Column(name="toolname", type="string", length=100)
     */
    private $toolname;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_name", type="string", length=100)
     */
    private $supplierName;

    /**
     * @var string
     *
     * @ORM\Column(name="inventory_number", type="string", length=100)
     */
    private $inventoryNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="leoni_nbr", type="string", length=100)
     */
    private $leoniNbr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="enabled", type="string", length=100)
     */
    protected  $enabled;

    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Homologation", inversedBy="tool")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
    private $homologation;

    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", inversedBy="tool")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\ToolBundle\Entity\Reclam", inversedBy="tools")
     * @ORM\JoinTable(name="Tool_Reclam",
     *      joinColumns={@ORM\JoinColumn(name="Tool_id", referencedColumnName="id")},
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
     * @return Pfe\Bundle\ToolBundle\Entity\Reclam
     */
    public function getReclam()
    {
        return $this->reclams;
    }

    public function __construct(){
        $this->enabled = false;
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
     * Set toolname
     *
     * @param string $toolname
     * @return Tool
     */
    public function setToolname($toolname)
    {
        $this->toolname = $toolname;
    
        return $this;
    }

    /**
     * Get toolname
     *
     * @return string 
     */
    public function getToolname()
    {
        return $this->toolname;
    }

    /**
     * Set supplierName
     *
     * @param string $supplierName
     * @return Tool
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
     * Set inventoryNumber
     *
     * @param string $inventoryNumber
     * @return Tool
     */
    public function setInventoryNumber($inventoryNumber)
    {
        $this->inventoryNumber = $inventoryNumber;
    
        return $this;
    }

    /**
     * Get inventoryNumber
     *
     * @return string 
     */
    public function getInventoryNumber()
    {
        return $this->inventoryNumber;
    }

    /**
     * Set leoniNbr
     *
     * @param string $leoniNbr
     * @return Tool
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
     * Set date
     *
     * @param \DateTime $date
     * @return Tool
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return Tool
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    public function __toString()
    {
        return (string) $this->getToolname();
    }
}
