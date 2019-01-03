<?php
/**
 * Limeberry Framework.
 *
 * A php framework for fast web development.
 *
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */
$path = __DIR__.'/../vendor/autoload.php';
if (file_exists($path)) {
    require $path;
} else {
    require __DIR__.'/../autoload.php';
    require __DIR__.'/../index.php';
}
