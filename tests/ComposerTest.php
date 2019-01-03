<?php

namespace limeberry\tests;

class ComposerTest extends \PHPUnit\Framework\TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(FRAMEWORK_LOADED);
    }
}
