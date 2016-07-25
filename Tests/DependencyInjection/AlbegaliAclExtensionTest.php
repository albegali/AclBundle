<?php

namespace Albegali\AclBundle\Tests\DependencyInjection;

use Albegali\AclBundle\Tests\Model\AbstractSecurityTest;

class AlbegaliAclExtensionTest extends AbstractSecurityTest
{
    public function testIfTestSuiteLoads()
    {
        $this->assertTrue(true);
    }

    public function testIfOrphanRemovalParameterIsSet()
    {
        $this->assertTrue(is_bool($this->container->getParameter('albegali_acl.remove_orphans')));
    }

    public function testIfPermissionStrategyParameterIsSet()
    {
        $this->assertTrue(
            'any' == $this->container->getParameter('albegali_acl.permission_strategy') ||
            'all' == $this->container->getParameter('albegali_acl.permission_strategy') ||
            'equal' == $this->container->getParameter('albegali_acl.permission_strategy')
        );
    }
}
