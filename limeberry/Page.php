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

namespace limeberry;

use limeberry\Configuration as conf;
use function htmlspecialchars;
use function trigger_error;
use function file_exists;
use function str_replace;
use function ob_start;
use function ob_get_clean;
use const ENT_QUOTES;
use const E_USER_ERROR;

/**
 * @ignore
 */
define("rPath", conf::getApplicationUrl() . DS . conf::getApplicationFolder() . DS . 'template' . DS);

/**
 * This library is used in templates and views.
 */       
class Page
{
    /** @ignore */
    private $title;
                
    /** @ignore */
    private $contents;
                
    /** @ignore */
    private $layoutPath;

    /** @ignore */
    private $output;
                
    /** @ignore */
    protected $values = array();

    /** @ignore */
    private $MASTER;

    /**
     * Install Page class.
     *
     * @return void Returns nothing.
     */
    public function __construct()
    {
        $this->MASTER = ROOT . DS . conf::getApplicationFolder() . DS . 'template' . DS;		
    }

    /**
     * Set the layout.
     *
     * @param string $layoutPathParam Name of your template file [example: setLayout("mytemplate.phtml"); ].
     *
     * @return void Returns nothing.
     */
    public function setLayout($layoutPathParam = "master.php")
    {
        if (file_exists($this->MASTER . $this->layoutPath . $layoutPathParam)) {
            $this->layoutPath = $this->MASTER . $this->layoutPath . $layoutPathParam;
        } else {
            // Prevent XSS Attacks.
            $output = $this->MASTER . $this->layoutPath . $layoutPathParam;
            $output = htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
            trigger_error("Error loading template file (" . $output . "). Please check template folder.", E_USER_ERROR);
        }
    }

    /**
     * Set content for parameter defined in template page.
     *
     * @param string $paramName Name of your parameter in template ex: {@Title};
     * @param string $paramName Content for your parameter.
     *
     * @return void Returns nothing.
     */
    public function setParameter($paramName, $paramValue) 
    {
        $this->values[$paramName] = $paramValue;
    }
                
    /**
     * Set null value to unused parameter in template files.
     *
     * @param string $paramName The param name.
     *
     * @return void Returns nothing.
     */
    public function setParameterNull($paramName) 
    {
        $this->values[$paramName] = "";
    }

    /**
     * @ignore
     */
    private function __applyParameters()
    {
        foreach ($this->values as $key => $value) {
            $tagToReplace = "{@$key}";
            $this->output = str_replace($tagToReplace, $value, $this->output);
        }
    }

    /**
     * if you do not use parameters for setting title you can use this function.
     */
    public function setTitle($paramTitle = '')
    {
        $this->title = $paramTitle;
    }
                
    /**
     * Include a css or js file in your template file. This function returns a relative
     * path for template folder.
     *
     * @param string $fileName File name; ex: css/application.css
     *
     * @return the file path.
     */
    public static function includeFile($fileName = '')
    {
        return rPath . $fileName;
    }

    /**
     * Start content definition in your view files when using templates.
     *
     * @return void Returns nothing.
     */
    public function BeginContent()
    {
        ob_start();
    }

    /**
     * Finish content definition in your view files when using templates.
     *
     * @return void Returns nothing.
     */
    public function EndContent()
    {
        $this->contents = ob_get_clean();
        $this->CreateView();
    }

    /*
     * Returns the page to screen.
     */
    private function CreateView()
    {
        ob_start();
        include_once($this->layoutPath);
        $this->output = ob_get_clean();
        $this->__applyParameters();
        echo $this->output;
    }
}
