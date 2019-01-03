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

use limeberry\Framework;

require_once 'limeberry/Framework.php';
	
// app_config.php is the configuration file for your project.
Framework::LoadConfig("app_config.php");   
    
// This line starts your application.
Framework::Run();
