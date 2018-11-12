<?php
/**
 * Doctrine Aware Initializer
 *
 * @since     Sep 2016
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent\Doctrine;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

trait ObjectManagerAwareTrait
{
    protected $objectManager;

    public function setObjectManager(EntityManager $em): void
    {
        $this->objectManager = $em;
    }

    public function getObjectManager(): EntityManager
    {
        return $this->objectManager;
    }


    protected function getDoctrineHydrator(bool $byValue = true): DoctrineObject
    {
        return new DoctrineObject($this->getObjectManager(), $byValue);
    }

    protected function beginTransaction(): void
    {
        $this->getObjectManager()->getConnection()->beginTransaction();
    }

    /**
     * @throws ConnectionException
     */
    protected function rollback(): void
    {
        $this->getObjectManager()->getConnection()->rollBack();
    }

    /**
     * @throws ConnectionException
     */
    protected function commit(): void
    {
        $this->getObjectManager()->getConnection()->commit();
    }
}
