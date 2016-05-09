<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class EnglishTest extends \PHPUnit_Framework_TestCase
{
    public function testEnglish() {
        return;
        if (!file_exists('/usr/share/dict/words')) {
            $this->markTestSkipped('Dictionary file (/usr/share/dict/words) is missing ');
            return;
        }


        $file = fopen('/usr/share/dict/words', 'r');
        while(!feof($file)){
            $line = fgets($file);
            //$this->assertTrue(ObsceneCensorRus::isAllowed($line), 'Word ' . trim($line) . ' was not allowed');
            if (!ObsceneCensorRus::isAllowed($line)) {
                echo $line;
            }
        }
        fclose($file);

    }

}