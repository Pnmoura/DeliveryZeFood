<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DependecyInjectionManager
{
    /**
     * @return ContainerInterface
     * @throws \Exception
     */
    public function generateContainer() : ContainerInterface
    {
        return $this->createContainer();
    }

    /**
     * Getter config services yml
     * @return string[]
     */
    public function getConfigContainers() : array
    {
        $config = [];

        foreach (ContainerRegisters::getRegisters() as $container) {
            /** @var  ContainerRegister $containerRegister */
            $containerRegister = new $container();
            $config[] = $containerRegister->getPathContainer();
        }

        return $config;
    }

    private function getRootPath() : string
    {
        return str_replace(['/Public', '\Public'], ['', ''], getcwd());
    }

    private function createContainer() : ContainerBuilder
    {
        $containerBuilder = new ContainerBuilder();
        
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));

        foreach ($this->getConfigContainers() as $config) {
            $loader->load($config);
        }

        return $containerBuilder;
    }
}
