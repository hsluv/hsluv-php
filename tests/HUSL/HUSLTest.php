<?php

use PHPUnit\Framework\TestCase;
use HUSL\HUSL;

class HUSLTest extends TestCase
{
    protected $battery = [];
    protected $fabadaHusl = [];
    protected $fabadaRgb = [];
    protected $fabadaHex;
    protected $fabadaHexInts = [];
    protected $fabadaHexFloats = [];

    protected function setUp()
    {
        $str = file_get_contents('tests/snapshot-rev4.json');
        $json = json_decode($str, true);
        $this->battery = $json;
        $this->fabadaHusl = [336.87558941192, 89.200531317385, 82.112136084095];
        $this->fabadaRgb = [0.98039215686274, 0.72941176470589, 0.85490196078433];
        $this->fabadaHex = '#fabada';
        $this->fabadaHexInts = [250, 186, 218];
        $this->fabadaHexFloats = [250.0, 186.0, 218.0];
    }

    /**
     * @test
     */
    public function correctHuslFromRgb()
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

    /**
     * @test
     */
    public function correctHuslFromHex()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::fromHex($hex), $values['husl']);
        }
    }

    /**
     * @test
     */
    public function correctRgbFromHusl()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::toRgb($values['husl']), $values['rgb']);
        }
    }

    /**
     * @test
     */
    public function correctHexFromHusl()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HUSL::toHex($values['husl']), $hex);
        }
    }

    /**
     * @test
     */
    public function fabadaTolower()
    {
        $this->assertEquals(HUSL::fromHex($this->fabadaHex), $this->fabadaHusl);
    }

    /**
     * @test
     */
    public function fabadaToupper()
    {
        $this->assertEquals(HUSL::fromHex(strtoupper($this->fabadaHex)), $this->fabadaHusl);
    }

    /**
     * @test
     */
    public function fabadaFromRgb()
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

    /**
     * @test
     */
    public function fabadaFromRgbArray()
    {
        $this->assertEquals(HUSL::fromRgb($this->fabadaRgb), $this->fabadaHusl);
    }

    /**
     * @test
     */
    public function fabadaFromRgbFloats()
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

    /**
     * @test
     */
    public function fabadaFromRgbFloatsArray()
    {
        $this->assertEquals(HUSL::fromRgbInt($this->fabadaHexFloats), $this->fabadaHusl);
    }

    /**
     * @test
     */
    public function fabadaFromRgbInts()
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

    /**
     * @test
     */
    public function fabadaFromRgbIntsArray()
    {
        $this->assertEquals(HUSL::fromRgbInt($this->fabadaHexInts), $this->fabadaHusl);
    }

    /**
     * @test
     */
    public function fabadaRgbFromHuslArray()
    {
        $this->assertEquals(HUSL::toRgb($this->fabadaHusl), $this->fabadaRgb);
    }

    /**
     * @test
     */
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

    /**
     * @test
     */
    public function fabadaHexIntFromHusl()
    {
        $this->assertEquals(
            HUSL::toHex(
                $this->fabadaHusl[0],
                $this->fabadaHusl[1],
                $this->fabadaHusl[2]
            ),
            $this->fabadaHex
        );
    }

    /**
     * @test
     */
    public function fabadaHexIntFromHuslArray()
    {
        $this->assertEquals(HUSL::toHex($this->fabadaHusl), $this->fabadaHex);
    }

    /**
     * @test
     */
    public function fabadaHexFromHuslArray()
    {
        $this->assertEquals(
            HUSL::toHex(
                $this->fabadaHusl[0],
                $this->fabadaHusl[1],
                $this->fabadaHusl[2]
            ),
            $this->fabadaHex
        );
    }

    /**
     * @test
     */
    public function fabadaHexFromHusl()
    {
        $this->assertEquals(HUSL::toHex($this->fabadaHusl), $this->fabadaHex);
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->battery = [];
        $this->fabadaHusl = [];
        $this->fabadaRgb = [];
        $this->fabadaHex = null;
        $this->fabadaHexInts = [];
        $this->fabadaHexFloats = [];
    }
}
