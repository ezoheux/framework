<?php

use PHPUnit\Framework\TestCase;

namespace limeberry;

class ComposerTest extends TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(defined('limeberry\FRAMEWORK_LOADED'));
    }
}
