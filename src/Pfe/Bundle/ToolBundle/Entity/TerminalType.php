<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TerminalType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\TerminalTypeRepository")
 */
class TerminalType
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
     * @ORM\Column(name="refTerm", type="string", length=100)
     */
    private $refTerm;


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
     * Set refTerm
     *
     * @param string $refTerm
     * @return TerminalType
     */
    public function setRefTerm($refTerm)
    {
        $this->refTerm = $refTerm;
    
        return $this;
    }

    /**
     * Get refTerm
     *
     * @return string 
     */
    public function getRefTerm()
    {
        return $this->refTerm;
    }
}
