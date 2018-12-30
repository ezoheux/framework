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

namespace limeberry\core
{
    use limeberry\Configuration;
    use limeberry\io\FileSystem;
    /**
     * A resource class for storing and getting; String values, Images (as html tags) and other type of resources.
     */
    class Resources{
        
        public static function Image(){
            return new ImageHelper();
        }

        public static function String(){
            return new StringHelper();
        }

    }





    /**
     * Helper Class for Resources.
     * Used to manage and get String resources
     */
    class StringHelper{
        /**
         * Get the string value from xml resource by id
         * @param String $id Id of value you want to get from resource 
         */
        public function get($id = ""){
            if(empty($id) || !isset($id)){
                return null;
            }else{
                if(FileSystem::isAvailable(Configuration::getResourceFile())){
                   try{
                    $res = simplexml_load_file(Configuration::getResourceFile());
                    foreach($res->string as $str_values){
                        if($str_values->attributes()->id == $id){
                            return $str_values;
                        }
                    }
                   }catch(Exception $e){
                       return "Error: ".$e->getMessage();
                   }
                }else{
                    return null;
                }
            }
        }
    }

    
    /**
     * Helper class for Resources.
     * Used to manage and get Image resources
     */
    class ImageHelper{
         /**
         * Get the image object from xml resource by id
         * @param String $id Id of value you want to get from resource 
         */
        public function get($id = ""){
            if(empty($id) || !isset($id)){
                return null;
            }else{
                if(FileSystem::isAvailable(Configuration::getResourceFile())){
                   try{
                    $res = simplexml_load_file(Configuration::getResourceFile());
                    foreach($res->image as $image_object){
                        if($image_object->attributes()->id == $id){

                            $height="";
                            $width="";
                            if(isset($image_object->attributes()->width)){
                                $width = $image_object->attributes()->width;
                            }
                            if(isset($image_object->attributes()->height)){
                                $height = $image_object->attributes()->height;
                            }
                            return '<img src="'.$image_object.'" height="'.$height.'" width="'.$width.'" />';
                        }
                    }
                   }catch(Exception $e){
                       return "Error: ".$e->getMessage();
                   }
                }else{
                    return null;
                }
            }
        }


        /**
         * Get the image object path value from xml resource by id
         * @param String $id Id of value you want to get from resource 
         */
        public function getValue($id=""){
            if(empty($id) || !isset($id)){
                return null;
            }else{
                if(FileSystem::isAvailable(Configuration::getResourceFile())){
                   try{
                    $res = simplexml_load_file(Configuration::getResourceFile());
                    foreach($res->image as $image_object){
                        if($image_object->attributes()->id == $id){
                            return $image_object;
                        }
                    }
                   }catch(Exception $e){
                       return "Error: ".$e->getMessage();
                   }
                }else{
                    return null;
                }
            }
        }



    }
    
}