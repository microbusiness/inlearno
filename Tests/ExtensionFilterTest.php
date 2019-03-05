<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use FileUtils\ExtensionFilter;

class ExtensionFilterTest extends TestCase
{
    public function testFilter()
    {
        $filter=new ExtensionFilter(['.aaa']);
        $this->assertTrue($filter->filter('12345.aaa'));
        $this->assertFalse($filter->filter('12345.bbb'));
    }
}
