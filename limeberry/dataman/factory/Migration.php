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

namespace limeberry\dataman\factory
{
    use limeberry\dataman\DbCommand;

    /**
     * Migration class is used to manage the create
     * and drop database operations of your project.
     */
    class Migration
    {
        /**
         * Create a database from the given schema.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool
         */
        public static function Up($schema, $db_instance)
        {
            $generated_script = '';

            $generated_script .= 'CREATE DATABASE IF NOT EXISTS '.$schema->getName()."; \r\n";
            $generated_script .= 'USE '.$schema->getName()."; \r\n\r\n";
            $generated_script .= $schema->getCreateTableScript()."\r\n";
            $generated_script .= $schema->getForeignKey()."\r\n";

            try {
                $cmd_create = new DbCommand($generated_script, $db_instance->Source());
                $cmd_create->Execute();
                $cmd_create->CloseCommand();
                $db_instance->Close();
            } catch (Exception $e) {
            }

            return $generated_script;
        }

        /**
         * Drop a database from the given schema.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool
         */
        public static function Down($schema, $db_instance)
        {
        }

        /**
         * Keep your database continuously updated independent
         * from version number. Not recommended in production.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool
         */
        public static function Synch($schema, $db_instance)
        {
        }
    }
}
