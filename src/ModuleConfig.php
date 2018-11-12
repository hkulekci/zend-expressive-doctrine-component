<?php
/**
 * Doctrine Component
 *
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent;

/**
 * @package DoctrineComponent
 */
class ModuleConfig
{
    private function dependencies(): array
    {
        return [
            'abstract_factories' => [
                \DoctrineComponent\Doctrine\DoctrineFactory::class,
            ],
            'factories' => [
                //\Doctrine\Common\Cache\Cache::class => \DoctrineComponent\Doctrine\DoctrineFileCacheFactory::class,
                \Doctrine\Common\Cache\Cache::class => \DoctrineComponent\Doctrine\DoctrineArrayCacheFactory::class,
            ],
            'initializers' => [
                \DoctrineComponent\Doctrine\ObjectManagerAwareInitializer::class,
            ],
        ];
    }

    public function __invoke()
    {
        return [
            'dependencies' => $this->dependencies(),
            'doctrine' => [
                'cache' => [
                    'cache_dir' => 'data/cache/annotation',
                ],
                'driver' => [
                    'annotation_driver' => [
                        'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                        'cache' => 'array',
                        'paths' => [
                        ],
                    ],
                ],
            ],
        ];
    }
}
