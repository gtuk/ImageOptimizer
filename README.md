ImageOptimizer
===========
PHP image optimizer for png, jpeg and gif files. It uses mozjpeg, pngquant and gifsicle for the optimization process.

**This guide assumes you have mozjpeg, pngquant and gifsicle installed.**

Installation
----------- 
You can install this library with composer or include it manually in your project.

Quick start
-----------

```php
 $optimizer = new Optimizer(
    array(
        Optimizer::PNGQUANT_PATH => '/usr/local/bin/pngquant',
        Optimizer::MOZJPEG_PATH => '/usr/local/bin/cjpeg',
        Optimizer::GIFSICLE_PATH => '/usr/local/bin/gifsicle'
    )
);
```

After this you can run the optimization process. If the optimization failed the method will throw an Exception, otherwise it returns TRUE.

```php
$optimizer->optimize('example.jpg', 'example-optimized.jpg'));
```
  