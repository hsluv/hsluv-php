<?php

use PHPUnit\Framework\TestCase;
use HUSL\HUSL;

class HUSLTest extends TestCase
{
    protected $battery = [];

    protected function setUp()
    {
        $str = file_get_contents('tests/snapshot-rev4.json');
        $json = json_decode($str, true);
        $this->battery = $json;
    }

    public function testCorrectHuslFromRgb()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::fromRgb($values['rgb'][0], $values['rgb'][1], $values['rgb'][2]), $values['husl']);
        }
    }

    public function testCorrectHuslFromHex()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::fromHex($hex), $values['husl']);
        }
    }

    public function testCorrectRgbFromHusl()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::toRgb($values['husl']), $values['rgb']);
        }
    }

    public function testCorrectHexFromHusl()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::toHex($values['husl']), $hex);
        }
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->battery = [];
    }
}
