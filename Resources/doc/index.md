# Getting started

The AlbegaliAclBundle is a Symfony2 bundle which is primary tested against version 2.3 of the framework. Yet, there is the
possibility that this bundle also works for version 2.1 and following.

## Installation

Installation is as easy as pie! Just follow these three steps to download, install and setup the AlbegaliAclBundle.

* Download the bundle using composer
* Enable the bundle in your AppKernel
* Configure and/or start using it

### Step 1: Download the bundle

Add AlbegaliAclBundle to your composer.json using the following construct:

```js
{
    "require": {
        "albegali/acl-bundle": "~0.10"
    }
}
```

Now tell composer to download the bundle by running the following command:

    $> php composer.phar update albegali/acl-bundle

Composer will now fetch and install this bundle in the vendor directory ```vendor/albegali```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Albegali\AclBundle\AlbegaliAclBundle(),
    );
}
```

### Step 3: Configure and start using the bundle

To create the tables needed, run the following command.

```
$> php app/console init:acl
```

This bundles uses the underneath Acl layer, so enable it by adding the following to your security configuration.

``` yaml
security:
    acl:
        connection: default
```

This bundle was designed to just work out of the box. You actually don't have to configure anything, the AclBundle comes
along with sane defaults.

To use the Acl features this bundle provides, just retrieve the correct manager service.

```php
$manager = $container->get('albegali_acl.manager');
$manager->isGranted('EDIT', $object);
```

## Next steps

After installing and setting up the basic functionality of this bundle you can move on and use some more advanced
features.

* [Use the AclManager](manager.md)
* [Check permissions on controller arguments](controller.md)
* [Define class permissions via annotations](annotation.md)
* [Configure auto removal of Acl entries](removal.md)
* [Preload Acl to a CollectionCache](cache.md)
* [Access all objects for a specific user](find_objects_for_user.md)
* [Configuration reference](configuration_reference.md)
* [Testing the bundle](testing.md)
