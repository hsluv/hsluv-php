<?php

use PHPUnit\Framework\TestCase;
use HSLuv\HSLuv;

class HSLuvTest extends TestCase
{
    protected $battery = [];
    protected $fabadaHSLuv = [];
    protected $fabadaRgb = [];
    protected $fabadaHex;
    protected $fabadaHexInts = [];
    protected $fabadaHexFloats = [];

    protected function setUp()
    {
        $str = file_get_contents('tests/snapshot-rev4.json');
        $json = json_decode($str, true);
        $this->battery = $json;
        $this->fabadaHSLuv = [336.87558941192, 89.200531317385, 82.112136084095];
        $this->fabadaRgb = [0.98039215686274, 0.72941176470589, 0.85490196078433];
        $this->fabadaHex = '#fabada';
        $this->fabadaHexInts = [250, 186, 218];
        $this->fabadaHexFloats = [250.0, 186.0, 218.0];
    }

    public function assertFloatClose($float1, $float2) {
        assert(abs($float1 - $float2) < 0.000000001);
    }

    public function assertTupleClose($tuple1, $tuple2) {
        $this->assertFloatClose($tuple1[0], $tuple2[0]);
        $this->assertFloatClose($tuple1[1], $tuple2[1]);
        $this->assertFloatClose($tuple1[2], $tuple2[2]);
    }

    /**
     * @test
     */
    public function correctHSLuvFromRgb()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertTupleClose(
                HSLuv::fromRgb(
                    $values['rgb'][0],
                    $values['rgb'][1],
                    $values['rgb'][2]
                ),
                $values['hsluv']
            );
        }
    }

    /**
     * @test
     */
    public function correctHSLuvFromHex()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertTupleClose(HSLuv::fromHex($hex), $values['hsluv']);
        }
    }

    /**
     * @test
     */
    public function correctRgbFromHSLuv()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertTupleClose(HSLuv::toRgb($values['hsluv']), $values['rgb']);
        }
    }

    /**
     * @test
     */
    public function correctHexFromHSLuv()
    {
        foreach ($this->battery as $hex => $values) {
            $this->assertEquals(HSLuv::toHex($values['hsluv']), $hex);
        }
    }

    /**
     * @test
     */
    public function fabadaTolower()
    {
        $this->assertEquals(HSLuv::fromHex($this->fabadaHex), $this->fabadaHSLuv);
    }

    /**
     * @test
     */
    public function fabadaToupper()
    {
        $this->assertTupleClose(HSLuv::fromHex(strtoupper($this->fabadaHex)), $this->fabadaHSLuv);
    }

    /**
     * @test
     */
    public function fabadaFromRgb()
    {
        $this->assertEquals(
            HSLuv::fromRgb(
                $this->fabadaRgb[0],
                $this->fabadaRgb[1],
                $this->fabadaRgb[2]
            ),
            $this->fabadaHSLuv
        );
    }

    /**
     * @test
     */
    public function fabadaFromRgbArray()
    {
        $this->assertTupleClose(HSLuv::fromRgb($this->fabadaRgb), $this->fabadaHSLuv);
    }

    /**
     * @test
     */
    public function fabadaFromRgbFloats()
    {
        $this->assertTupleClose(
            HSLuv::fromRgbInt(
                $this->fabadaHexFloats[0],
                $this->fabadaHexFloats[1],
                $this->fabadaHexFloats[2]
            ),
            $this->fabadaHSLuv
        );
    }

    /**
     * @test
     */
    public function fabadaFromRgbFloatsArray()
    {
        $this->assertTupleClose(HSLuv::fromRgbInt($this->fabadaHexFloats), $this->fabadaHSLuv);
    }

    /**
     * @test
     */
    public function fabadaFromRgbInts()
    {
        $this->assertTupleClose(
            HSLuv::fromRgbInt(
                $this->fabadaHexInts[0],
                $this->fabadaHexInts[1],
                $this->fabadaHexInts[2]
            ),
            $this->fabadaHSLuv
        );
    }

    /**
     * @test
     */
    public function fabadaFromRgbIntsArray()
    {
        $this->assertTupleClose(HSLuv::fromRgbInt($this->fabadaHexInts), $this->fabadaHSLuv);
    }

    /**
     * @test
     */
    public function fabadaRgbFromHSLuvArray()
    {
        $this->assertTupleClose(HSLuv::toRgb($this->fabadaHSLuv), $this->fabadaRgb);
    }

    /**
     * @test
     */
    public function fabadaRgbFromHSLuv()
    {
        $this->assertTupleClose(
            HSLuv::toRgb(
                $this->fabadaHSLuv[0],
                $this->fabadaHSLuv[1],
                $this->fabadaHSLuv[2]
            ),
            $this->fabadaRgb
        );
    }

    /**
     * @test
     */
    public function fabadaHexIntFromHSLuv()
    {
        $this->assertEquals(
            HSLuv::toHex(
                $this->fabadaHSLuv[0],
                $this->fabadaHSLuv[1],
                $this->fabadaHSLuv[2]
            ),
            $this->fabadaHex
        );
    }

    /**
     * @test
     */
    public function fabadaHexIntFromHSLuvArray()
    {
        $this->assertEquals(HSLuv::toHex($this->fabadaHSLuv), $this->fabadaHex);
    }

    /**
     * @test
     */
    public function fabadaHexFromHSLuvArray()
    {
        $this->assertEquals(
            HSLuv::toHex(
                $this->fabadaHSLuv[0],
                $this->fabadaHSLuv[1],
                $this->fabadaHSLuv[2]
            ),
            $this->fabadaHex
        );
    }

    /**
     * @test
     */
    public function fabadaHexFromHSLuv()
    {
        $this->assertEquals(HSLuv::toHex($this->fabadaHSLuv), $this->fabadaHex);
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->battery = [];
        $this->fabadaHSLuv = [];
        $this->fabadaRgb = [];
        $this->fabadaHex = null;
        $this->fabadaHexInts = [];
        $this->fabadaHexFloats = [];
    }
}
