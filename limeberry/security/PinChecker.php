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

namespace limeberry\security
{
    /**
     * A pin chechker class for taking control and managing operations.
     * This class is a derivative of Object Mapper class.
     **/
    class PinChecker
    {
        private static $pinlist = [];

        /**
         * Map new pins.
         *
         * @var string set name for pin
         * @var string $pincode set pin
         *
         * @return void
         **/
        public static function MapPin($pinName, $pincode)
        {
            self::$pinlist[$pinName] = $pincode;
        }

        /**
         * Check if pin is true and continue to process.
         *
         * @var string Pin for
         * @var string $pincode Pin code
         **/
        public static function CheckPin($pinfor, $pincode)
        {
            if (self::$pinlist[$pinfor] == $pincode) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Clear all mapped pins.
         */
        public static function Clear()
        {
            self::$pinlist = null;
        }
    }

}
