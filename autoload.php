<?php
/**
 * Limeberry Framework.
 *
 * A php framework for fast web development.
 *
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */
defined('START') || (header('HTTP/1.1 403 Forbidden') & die('403.14 - Directory listing denied.'));

require_once __DIR__.'/base.php';

/*
 * PSR-4 Auto-loading.
 * @link <https://www.php-fig.org/psr/psr-4/>.
 */
spl_autoload_register(function ($class) {
    $prefixes = [
        'limeberry\\',
        'limeberry\\forms\\',
        'limeberry\\helpers\\',
        'limeberry\\io\\',
        'limeberry\\security\\',
        'limeberry\\tool\\',
        'limeberry\\visual\\',
        'limeberry\\core\\',
    ];
    $baseDir = ROOT.DS;
    $baseDir = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $baseDir);
    foreach ($prefixes as $prefix) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
        $relativeClass = substr($class, $len);
        $file = $baseDir.DIRECTORY_SEPARATOR.str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $relativeClass).'.php';
        if (file_exists($file)) {
            require $file;
        }
    }
    $file = $baseDir.str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});
