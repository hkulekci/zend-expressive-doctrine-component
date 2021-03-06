<?php
/**
 * ObjectManager Aware Interface
 *
 * @since     Jul 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent\Doctrine;

use Doctrine\ORM\EntityManager;

interface ObjectManagerAware
{
    public function setObjectManager(EntityManager $em);
    public function getObjectManager();
}
