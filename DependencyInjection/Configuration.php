<?php

namespace Albegali\AclBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('albegali_acl');

        $rootNode
            ->children()
                ->booleanNode('remove_orphans')->defaultTrue()->end()
                ->enumNode('permission_strategy')
                    ->values(array('any', 'all', 'equal'))
                    ->defaultValue('all')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
