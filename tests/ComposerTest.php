<?php

use PHPUnit\Framework\TestCase;

class ComposerTest extends TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(defined('limeberry\FRAMEWORK_LOADED'));
    }
}
