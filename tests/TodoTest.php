<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class TodoTest extends \PHPUnit_Framework_TestCase {
    public function testTodo() {
        $this->assertSame('сучила', ObsceneCensorRus::getFiltered('сучила'));
    }
} 