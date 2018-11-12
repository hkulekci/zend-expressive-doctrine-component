<?php
/**
 * Doctrine File Cache Factory
 *
 * @since     Sep 2016
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent\Doctrine;

use Doctrine\Common\Cache\FilesystemCache;
use Interop\Container\ContainerInterface;

class DoctrineFileCacheFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config   = $container->has('config') ? $container->get('config') : [];
        $cacheDir = 'data/cache/annotation';

        return new FilesystemCache();
    }
}
