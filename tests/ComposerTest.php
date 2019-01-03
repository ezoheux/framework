<?php

use PHPUnit\Framework\TestCase;

class ComposerTest extends TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(defined('FRAMEWORK_LOADED'));
    }
}
