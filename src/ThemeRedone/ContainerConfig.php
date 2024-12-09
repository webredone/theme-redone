<?php

declare(strict_types=1);

namespace ThemeRedone;

use League\Container\Container;
use ThemeRedone\Core\{
    BlockTypesRegistrar,
    Blocks,
    CustomPostTypesRegistrar,
    Dequeues,
    Enqueues,
    LoggerService,
    TemplateEngine,
    ThemeSupport
};
use ThemeRedone\Plugins\{
    AcfSyncManager,
    CptuiSyncManager
};

final class ContainerConfig
{
    public static function build(): Container
    {
        $container = new Container();

        // An array of services that have no constructor arguments or only default ones
        $coreServices = [
            ThemeSupport::class,
            Enqueues::class,
            Dequeues::class,
            BlockTypesRegistrar::class,
            TemplateEngine::class,
            AcfSyncManager::class,
            CptuiSyncManager::class,
            CustomPostTypesRegistrar::class,
            LoggerService::class,
        ];

        // Register simple services (no arguments needed, or only defaults)
        foreach ($coreServices as $service) {
            $container->add($service);
        }

        // Services that require arguments:
        $servicesWithArgs = [
            Blocks::class => [BlockTypesRegistrar::class],
        ];

        // Register services that need constructor arguments
        foreach ($servicesWithArgs as $class => $arguments) {
            $definition = $container->add($class);
            foreach ($arguments as $arg) {
                $definition->addArgument($arg);
            }
        }

        // Register the main ThemeRedone class with its arguments in order
        $themeRedoneArgs = [
            ThemeSupport::class,
            Enqueues::class,
            Dequeues::class,
            Blocks::class,
            TemplateEngine::class,
            CustomPostTypesRegistrar::class,
            AcfSyncManager::class,
            CptuiSyncManager::class,
        ];

        $themeDefinition = $container->add(ThemeRedone::class);
        foreach ($themeRedoneArgs as $arg) {
            $themeDefinition->addArgument($arg);
        }

        return $container;
    }
}
