Getting Started With NonSenseBundle
==================================

## Prerequisites

This version of the bundle requires Symfony 2.3+.

## Installation

Installation is a quick (I promise!) 3 step process:

1. Download Webonaute\NonSenseBundle using composer
2. Enable the Bundle
3. Generate your sentence

### Step 1: Download Webonaute\NonSenseBundle using composer

Add Webonaute\NonSenseBundle by running the command:

``` bash
$ php composer.phar require Webonaute\NonSenseBundle 'dev-master'
```

Composer will install the bundle to your project's `vendor/Webonaute` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

Be sure to use it only in your dev or test environement.

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Webonaute\NonSenseBundle\NonSenseBundle(),
        // ...
    )
}
```

### Step 3: Generate your sentence.
``` bash
$ php bin/console nonsense:generate:sentence
$ php bin/console nonsense:generate:word
```

Voila!