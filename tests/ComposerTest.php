<?php

use limeberry;
use PHPUnit\Framework\TestCase;

namespace limeberry\tests;

class ComposerTest extends TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(defined('limeberry\FRAMEWORK_LOADED'));
    }
}
