<?php

namespace Admingenerator\GeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Admingenerator\GeneratorBundle\ClassLoader\AdmingeneratedClassLoader;
use Admingenerator\GeneratorBundle\DependencyInjection\Compiler\ValidatorCompilerPass;
use Admingenerator\GeneratorBundle\DependencyInjection\Compiler\FormCompilerPass;

class AdmingeneratorGeneratorBundle extends Bundle
{
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\HttpKernel\Bundle\Bundle::build()
     */
    public function build(ContainerBuilder $container)
    {
        $AdmingeneratedClassLoader = new AdmingeneratedClassLoader();
        $AdmingeneratedClassLoader->setBasePath($container->getParameter('kernel.cache_dir'));
        $AdmingeneratedClassLoader->register();

        parent::build($container);

        $container->addCompilerPass(new ValidatorCompilerPass());
        $container->addCompilerPass(new FormCompilerPass());
    }
}
