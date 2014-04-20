<?php

namespace Pfe\Bundle\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Pfe\Bundle\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('admin');
        $user->setRegistrationNumber('EM00000');
        $user->setDefaultLocale('fr');
        $user->setFirstName('Oussama');
        $user->setLastName('Lahmar');
        $user->setEmail('oussisgs@gmail.com');
        $user->setRoles(array('ROLE_ADMIN'));

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;
        $user->setPassword($encoder->encodePassword('admin', $user->getSalt()));

        $manager->persist($user);
        $manager->flush();

        for($i = 1; $i <= 5; $i++){
            $user = new User();
            $user->setUsername('admin' . $i);
            $user->setRegistrationNumber('EM0000' . $i);
            $user->setDefaultLocale('en');
            $user->setFirstName('Admin');
            $user->setLastName($i);
            $user->setEmail('admin'. $i .'@test.com');
            $user->setRoles(array('ROLE_ADMIN'));

            $encoder = $this->container
                ->get('security.encoder_factory')
                ->getEncoder($user)
            ;
            $user->setPassword($encoder->encodePassword('admin', $user->getSalt()));

            $manager->persist($user);
            $manager->flush();
        }

        for($i = 6; $i <= 10; $i++){
            $user = new User();
            $user->setUsername('admin' . $i);
            $user->setRegistrationNumber('EM0000' . $i);
            $user->setDefaultLocale('de');
            $user->setFirstName('Admin');
            $user->setLastName($i);
            $user->setEmail('admin'. $i .'@test.com');
            $user->setRoles(array('ROLE_ADMIN'));

            $encoder = $this->container
                ->get('security.encoder_factory')
                ->getEncoder($user)
            ;
            $user->setPassword($encoder->encodePassword('admin', $user->getSalt()));

            $manager->persist($user);
            $manager->flush();
        }
    }
} 