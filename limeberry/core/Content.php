<?php


/**
 *	Limeberry Framework.
 *
 *	a php framework for fast web development.
 *
 *	@author Sinan SALIH
 *	@copyright Copyright (C) 2018-2019 Sinan SALIH
 *
 **/

namespace limeberry\core
{
    /**
     * Content class
     * This class is used to create responses except Views.
     */
    class Content
    {
        /**
         * Print values to screen.
         *
         * @param string $format
         * @param type   $args
         */
        public function Render($value = '')
        {
            echo $value;
        }
    }
}
