<?php

namespace Albegali\AclBundle\Driver\Annotation;

use Doctrine\Common\Annotations\Reader;
use Albegali\AclBundle\Driver\DriverInterface;

class AnnotationDriver implements DriverInterface
{
    protected $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function readMetaData(\ReflectionClass $class)
    {
        $data = null;
        $annotation = $this->reader->getClassAnnotation($class, 'Albegali\AclBundle\Mapping\Annotation\DomainObject');

        if ($annotation) {
            $data = array(
                'remove' => $annotation->getRemove(),
                'permissions' => array(),
                'properties' => array()
            );

            // get class properties
            foreach ($annotation->getClassPermissions() as $permission) {
                foreach ($permission->getRoles() as $role => $mask) {
                    $data['permissions'][] = array($role, $mask);
                }
            }

            // get property permissions
            $properties = $class->getProperties();

            foreach ($properties as $property) {
                $propAnnotation = $this->reader->getPropertyAnnotation($property, 'Albegali\AclBundle\Mapping\Annotation\PropertyPermission');

                if ($propAnnotation) {
                    foreach ($propAnnotation->getRoles() as $role => $mask) {
                        $data['properties'][$property->getName()] = array($role, $mask);
                    }
                }
            }
        }

        return $data;
    }
}
