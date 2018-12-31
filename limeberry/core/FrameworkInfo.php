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
 * FrameworkInfo class contains information and version data of the framework. 
 */
class FrameworkInfo
{
        
    /**
     * Return the version of the framework.
     *
     * @return string Returns version number of Limeberry PHP Framework.
     */
    public static function VersionNumber()
    {
        return "2.0.0@stable";
    }
    
    /**
     * Last configuration on core framework files of the Limeberry PHP Framework.
     *
     * @return string Returns the last configuration on core framework files of the Limeberry PHP Framework.
     */
    public static function LastUpdate()
    {
        return "2.0@1.1 Update -  January First Update ";
    }
}
