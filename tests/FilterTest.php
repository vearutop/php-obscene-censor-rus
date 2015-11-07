<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class CensorTest extends \PHPUnit_Framework_TestCase
{
    public function testCensor()
    {
        $test = 'Да пошел ты нахуй и в пиzdu huesos, ушлепок ебаный, ебать мой вялый хуй!
Мой дед ветеран твоего деда педрилу ебал :( Хуячечки';

        $expected = 'Да пошел ты ***** и в ***** ******, ушлепок ******, ***** мой вялый ***!
Мой дед ветеран твоего деда ******* **** :( ********';

        $this->assertSame($expected, ObsceneCensorRus::getFiltered($test));
    }


    public function testText() {
        $test = 'Да пошел ты нахуй и в пиzdu huesos, ушлепок ебаный, ебать мой вялый хуй!
Мой дед ветеран твоего деда педрилу ебал :( Хуячечки';
        ObsceneCensorRus::filterText($test);

        $this->assertSame('Да пошел ты ***** и в ***** ******, ушлепок ******, ***** мой вялый ***!
Мой дед ветеран твоего деда ******* **** :( ********', $test);
    }


    public function testLog() {
        ObsceneCensorRus::$log = array();
        ObsceneCensorRus::$logEx = array();

        ObsceneCensorRus::getFiltered('ебанушка');
        ObsceneCensorRus::getFiltered('йоба');
        ObsceneCensorRus::getFiltered('педик');
        ObsceneCensorRus::getFiltered('транквилизатор');
        ObsceneCensorRus::getFiltered('Йебать');
        ObsceneCensorRus::getFiltered('3 рубля');
        ObsceneCensorRus::getFiltered('дайте хлеба в ноябре');


        $this->assertSame(array(
                'ебанушка' => 1,
                'йоба' => 1,
                'педик' => 1,
                'Йебать' => 1,
            ),
            ObsceneCensorRus::$log);


        $this->assertSame(array(
                'рубля' => 1,
                'ноябре' => 1,
            ),
            ObsceneCensorRus::$logEx);


        ObsceneCensorRus::$log = null;
        ObsceneCensorRus::$logEx = null;
    }



    public function testAllowed() {
        $this->assertTrue(ObsceneCensorRus::isAllowed('Ан нет. Готовит снова рок Последний жесткий свой урок.'));
        $this->assertFalse(ObsceneCensorRus::isAllowed('Итак, пиздец приходит дяде. Навек прощайте, водка, бляди…'));
    }



} 