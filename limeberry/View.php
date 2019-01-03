<?php
/**
 * Limeberry Framework.
 *
 * A php framework for fast web development.
 *
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace limeberry;

defined("START") || (header("HTTP/1.1 403 Forbidden") & die("403.14 - Directory listing denied."));

use limeberry\Configuration as conf;
use const true;
use function file_exists;

/**
 * This class is used to create an instance of view files.
 */
class View
{
    /**
     * Return a view to user.
     *
     * @param string $viewScript View file path and file name ex: Index\Index.phtml
     * @param bool   $isUsual    If your file not in view folder.
     *
     * @return void Returns nothing.
     */
    public function Render($viewScript, $isUsual = true)
    {
        if ($isUsual) {
            require ROOT.DS.conf::getApplicationFolder().DS.'view'.DS.$viewScript;
        } else {
            require ROOT.DS.conf::getApplicationFolder().DS.$viewScript;
        }
    }

    /**
     * Return true if view file available.
     *
     * @param string $viewScript View file path and file name ex: Index\Index.phtml
     * @param bool   $isUsual    If your file not in view folder.
     *
     * @return bool Returns true if the file exists and false if not.
     */
    public function isAvailable($viewScript, $isUsual = true)
    {
        if ($isUsual) {
            return file_exists(ROOT.DS.conf::getApplicationFolder().DS.'view'.DS.$viewScript);
        } else {
            return file_exists(ROOT.DS.conf::getApplicationFolder().DS.$viewScript);
        }
    }
}
