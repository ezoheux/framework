<?php
/**
 * Limeberry Framework
 *   
 * A php framework for fast web development.
 *   
 * @package Limeberry Framework
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace limeberry\core

/**
 * Content class
 * This class is used to create responses except Views
 */
class Content
{
 
    /**
     * Print values to screen.
     *
     * @param mixed $value The value.
     *
     * @return void Returns nothing.
     */
    public function Render($value="")
    {
        echo $value;
    }
}
