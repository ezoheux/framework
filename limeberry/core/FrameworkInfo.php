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
     * FrameworkInfo class contains information and version data of the framework.
     */
    class FrameworkInfo
    {
        /**
         * Returns version number of Limeberry PHP.
         */
        public static function VersionNumber()
        {
            return '2.0.0@stable';
        }

        /**
         * Last configuration on core framework files of the Limeberry.
         */
        public static function LastUpdate()
        {
            return '2.0@1.1 Update -  January First Update ';
        }
    }

}
