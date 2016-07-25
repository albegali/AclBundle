<?php

namespace Albegali\AclBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class MetaDataCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('albegali_acl.driver_chain')) {
            return;
        }

        $definition = $container->getDefinition('albegali_acl.driver_chain');
        $services = $container->findTaggedServiceIds('albegali_acl.driver');

        foreach ($services as $id => $attributes) {
            $definition->addMethodCall('addDriver', array(new Reference($id)));
        }
    }
}
