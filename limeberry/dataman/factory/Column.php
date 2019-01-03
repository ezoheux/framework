<?php

/**
*	Limeberry Framework
*	
*	a php framework for fast web development.
*	
*	@package Limeberry Framework
*	@author Sinan SALIH
*	@copyright Copyright (C) 2018-2019 Sinan SALIH
*	
**/

namespace limeberry\dataman\factory
{
    class Column{
        private $name;
        private $type;
        private $attributes;
    
        public function __construct($name="", $type="", $attributes="")
        {
            $this->name = $name;
            $this->type = $type;
            $this->attributes = $attributes;
            return $this;  
        }
    
        public function __toString()
        {
            return "{$this->name} {$this->type} {$this->attributes}";   
        }
        
    }
}