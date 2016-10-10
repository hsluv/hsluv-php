<?php

use PHPUnit\Framework\TestCase;
use HUSL\HUSL;

class HUSLTest extends TestCase
{
    protected $battery = [];
    protected $fabadaHusl = [];
    protected $fabadaRgb = [];
    protected $fabadaHexInts = [];
    protected $fabadaHexFloats = [];

    protected function setUp()
    {
        $str = file_get_contents('tests/snapshot-rev4.json');
        $json = json_decode($str, true);
        $this->battery = $json;
        $this->fabadaHusl = [336.87558941192, 89.200531317385, 82.112136084095];
        $this->fabadaRgb = [0.98039215686274, 0.72941176470589, 0.85490196078433];
        $this->fabadaHexInts = [250, 186, 218];
        $this->fabadaHexFloats = [250.0, 186.0, 218.0];
    }

    public function testCorrectHuslFromRgb()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(
                HUSL::fromRgb(
                    $values['rgb'][0],
                    $values['rgb'][1],
                    $values['rgb'][2]
                ),
                $values['husl']
            );
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

    public function testFabadaTolower()
    {
        $this->assertEquals(HUSL::fromHex('#fabada'), $this->fabadaHusl);
    }

    public function testFabadaToupper()
    {
        $this->assertEquals(HUSL::fromHex('#FABADA'), $this->fabadaHusl);
    }

    public function testFabadaFromRgb()
    {
        $this->assertEquals(
            HUSL::fromRgb(
                $this->fabadaRgb[0],
                $this->fabadaRgb[1],
                $this->fabadaRgb[2]
            ),
            $this->fabadaHusl
        );
    }

    public function testFabadaFromRgbArray()
    {
        $this->assertEquals(HUSL::fromRgb($this->fabadaRgb), $this->fabadaHusl);
    }

    public function testFabadaFromRgbFloats()
    {
        $this->assertEquals(
            HUSL::fromRgbInt(
                $this->fabadaHexFloats[0],
                $this->fabadaHexFloats[1],
                $this->fabadaHexFloats[2]
            ),
            $this->fabadaHusl
        );
    }

    public function testFabadaFromRgbFloatsArray()
    {
        $this->assertEquals(HUSL::fromRgbInt($this->fabadaHexFloats), $this->fabadaHusl);
    }

    public function testFabadaFromRgbInts()
    {
        $this->assertEquals(
            HUSL::fromRgbInt(
                $this->fabadaHexInts[0],
                $this->fabadaHexInts[1],
                $this->fabadaHexInts[2]
            ),
            $this->fabadaHusl
        );
    }

    public function testFabadaFromRgbIntsArray()
    {
        $this->assertEquals(HUSL::fromRgbInt($this->fabadaHexInts), $this->fabadaHusl);
    }

    public function fabadaRgbFromHuslArray()
    {
        $this->assertEquals(HUSL::toRgb($this->fabadaHusl), $this->fabadaRgb);
    }

    public function fabadaRgbFromHusl()
    {
        $this->assertEquals(
            HUSL::toRgb(
                $this->fabadaHusl[0],
                $this->fabadaHusl[1],
                $this->fabadaHusl[2]
            ),
            $this->fabadaRgb
        );
    }

    public function fabadaRgbIntFromHusl()
    {
        $this->assertEquals(
            HUSL::toRgb(
                $this->fabadaHusl[0],
                $this->fabadaHusl[1],
                $this->fabadaHusl[2]
            ),
            $this->fabadaRgb
        );
    }

    public function fabadaRgbIntFromHuslArray()
    {
        $this->assertEquals(HUSL::toRgb($this->fabadaHusl), $this->fabadaRgb);
    }

    public function fabadaHexFromHusl()
    {
        $this->assertEquals(HUSL::toRgb($this->fabadaHusl), $this->fabadaHexInts);
    }

    public function fabadaHexFromHuslArray()
    {
        $this->assertEquals(
            HUSL::toRgb(
                $this->fabadaHusl[0],
                $this->fabadaHusl[1],
                $this->fabadaHusl[2]
            ),
            $this->fabadaHexInts
        );
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->battery = [];
        $this->fabadaHusl = [];
        $this->fabadaRgb = [];
        $this->fabadaHexInts = [];
        $this->fabadaHexFloats = [];
    }
}
