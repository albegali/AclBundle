<?php

namespace Albegali\AclBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Albegali\AclBundle\DependencyInjection\Compiler\MetaDataCompilerPass;
use Albegali\AclBundle\DependencyInjection\Compiler\OverrideServiceCompilerPass;

class AlbegaliAclBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new OverrideServiceCompilerPass());
        $container->addCompilerPass(new MetaDataCompilerPass());
    }
}
