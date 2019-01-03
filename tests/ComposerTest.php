<?php

namespace limeberry\tests;

class ComposerTest extends \PHPUnit\Framework\TestCase
{
    public function testFrameworkLoadedThroughComposer()
    {
        $this->assertTrue(\limeberry\FRAMEWORK_LOADED);
    }
}
