<?php

namespace Busha\BushaPay\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class BushaPayTest extends TestCase
{
    protected $bushapay;

    public function setUp()
    {
        $this->bushapay = m::mock('Busha\Busha\BushaPay');
        $this->mock = m::mock('GuzzleHttp\Client');
    }

    public function tearDown()
    {
        m::close();
    }

    public function testShowCharge()
    {
        $array = $this->bushapay->shouldReceive('showCharge')->andReturn(['charge']);
        $this->assertEquals('array', gettype([$array]));
    }

    public function testChargesListing()
    {
        $array = $this->bushapay->shouldReceive('listCharge')->andReturn(['charges']);
        $this->assertEquals('array', gettype([$array]));
    }
}
