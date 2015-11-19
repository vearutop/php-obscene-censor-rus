<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class FalsePositiveTest extends \PHPUnit_Framework_TestCase {
    public function testFalsePositive() {
        $this->assertSame('феерический *******', ObsceneCensorRus::getFiltered('феерический долбоеб'));
        $this->assertSame('12 ноября', ObsceneCensorRus::getFiltered('12 ноября'));
        $this->assertTrue(ObsceneCensorRus::isAllowed('dying'));
    }
} 