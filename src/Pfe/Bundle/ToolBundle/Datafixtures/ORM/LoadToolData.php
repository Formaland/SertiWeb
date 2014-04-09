<?php

namespace Pfe\Bundle\ToolBundle\Datafixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pfe\Bundle\ToolBundle\Entity\Tool;

class LoadToolData implements FixtureInterface {

    public function load(ObjectManager $manager){

        for($i = 1; $i <= 100; $i++){
            $tool = new Tool();
            $tool->setToolname('Outil -' . $i);
            $tool->setDate(new \DateTime());
            $tool->setInventoryNumber(10 * $i);
            $tool->setLeoniNbr('P000' . $i);
            $tool->setSupplierName('LEONI');

            $manager->persist($tool);
            $manager->flush();
        }
    }
} 