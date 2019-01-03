<?php

use PHPUnit\Framework\TestCase;

namespace limeberry\tests;

class ComposerTest extends TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(FRAMEWORK_LOADED);
    }
}
