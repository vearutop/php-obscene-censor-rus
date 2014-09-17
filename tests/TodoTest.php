<?php
require_once __DIR__ . '/../ObsceneCensorRus.php';

class TodoTest extends PHPUnit_Framework_TestCase {
    public function testTodo() {
        $this->assertSame('сучила', ObsceneCensorRus::getFiltered('сучила'));

    }
} 