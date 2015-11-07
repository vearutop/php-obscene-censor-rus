<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class PositiveTest extends \PHPUnit_Framework_TestCase {
    public function testPositive() {
        $this->assertSame('******', ObsceneCensorRus::getFiltered('ПиЗдЮк'));
        $this->assertSame('*****', ObsceneCensorRus::getFiltered('сучка'));

        $this->assertSame('DHIWE ******', ObsceneCensorRus::getFiltered('DHIWE E6AHOE'));
        $this->assertSame('********', ObsceneCensorRus::getFiltered('ибанушка'));

        $this->assertSame('*****', ObsceneCensorRus::getFiltered('huilo'));
        $this->assertSame('*****', ObsceneCensorRus::getFiltered('пидор'));
        $this->assertSame('*****', ObsceneCensorRus::getFiltered('педик'));
        $this->assertSame('*********', ObsceneCensorRus::getFiltered('пидарасит'));
        $this->assertSame('**********', ObsceneCensorRus::getFiltered('мандавошка'));
        $this->assertSame('*********** творог', ObsceneCensorRus::getFiltered('подзалупный творог'));
    }
} 