<?php

namespace Albegali\AclBundle\Driver;

interface DriverInterface
{
    public function readMetaData(\ReflectionClass $class);
}
