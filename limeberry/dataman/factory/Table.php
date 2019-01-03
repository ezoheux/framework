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
    class Table{
        private $table_name;
        private $columns;
        
        public function __construct(){
        $func_args = $this->convert_args_to_array(func_get_args());
        
        $this->table_name =$func_args[0];
        

        $this->columns = "";
        foreach(array_slice($func_args,1) as  $x){
            $this->columns .= $x.",";
        }
        $this->columns = rtrim($this->columns, ",");

    }

    public function __toString()
    {
        $str_table_to_generate = "";
        $str_table_to_generate .= "CREATE TABLE IF NOT EXISTS ".$this->table_name." ( \r\n";
        $str_table_to_generate .= $this->columns."); \r\n\r\n";

        return $str_table_to_generate;

    }

    private function convert_args_to_array($objects){
        $otoa = array();
        foreach($objects as $object){
            $otoa[] = $object;
        }
        return $otoa;
    }
    }
}