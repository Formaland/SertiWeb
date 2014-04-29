<?php

namespace Pfe\Bundle\ToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notif
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ToolBundle\Entity\NotifRepository")
 */
class Notif
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
     * @ORM\Column(name="num", type="string", length=100)
     */
    private $num;


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
     * Set num
     *
     * @param string $num
     * @return Notif
     */
    public function setNum($num)
    {
        $this->num = $num;
    
        return $this;
    }

    /**
     * Get num
     *
     * @return string 
     */
    public function getNum()
    {
        return $this->num;
    }
}
