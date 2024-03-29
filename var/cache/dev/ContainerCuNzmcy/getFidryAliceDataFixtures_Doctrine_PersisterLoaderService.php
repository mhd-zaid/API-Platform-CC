<?php

namespace ContainerCuNzmcy;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFidryAliceDataFixtures_Doctrine_PersisterLoaderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'fidry_alice_data_fixtures.doctrine.persister_loader' shared service.
     *
     * @return \Fidry\AliceDataFixtures\Loader\PersisterLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $container->privates['fidry_alice_data_fixtures.doctrine.persister_loader'] = $container->createProxy('PersisterLoaderGhostA104a95', static fn () => \PersisterLoaderGhostA104a95::createLazyGhost(static fn ($proxy) => self::do($container, $proxy)));
        }

        include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/LoaderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/Persistence/PersisterAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/IsAServiceTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/theofidry/alice-data-fixtures/src/Loader/PersisterLoader.php';

        return ($lazyLoad->__construct(($container->privates['fidry_alice_data_fixtures.loader.simple'] ?? $container->load('getFidryAliceDataFixtures_Loader_SimpleService')), ($container->services['fidry_alice_data_fixtures.persistence.persister.doctrine'] ?? $container->load('getFidryAliceDataFixtures_Persistence_Persister_DoctrineService')), ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)), []) && false ?: $lazyLoad);
    }
}
