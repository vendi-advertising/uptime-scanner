<?php

namespace App\Tests\InspectionResults;

use App\InspectionResults\FailInspectionResult;
use App\InspectionResults\IndeterminateInspectionResult;
use App\InspectionResults\InspectionResultBase;
use App\InspectionResults\PassInspectionResult;
use PHPUnit\Framework\TestCase;

class InspectionResultBaseTest extends TestCase
{
    protected function _getSimpleTestObject(): InspectionResultBase
    {
        return new class(InspectionResultBase::INSPECTION_RESULT_PASS, 'Test Inspection', 'This is a test') extends InspectionResultBase {
            public function __construct(string $status, string $inspection, string $message)
            {
                parent::__construct($status, $inspection, $message);
            }
        };
    }

    public function testGetInspectionMessage()
    {
        $this->assertSame('This is a test', $this->_getSimpleTestObject()->getInspectionMessage());
    }

    /**
     * @covers \App\InspectionResults\PassInspectionResult
     * @covers \App\InspectionResults\FailInspectionResult
     * @covers \App\InspectionResults\IndeterminateInspectionResult
     * @covers \App\InspectionResults\InspectionResultBase
     */
    public function testDidInspectionFail()
    {
        $this->assertFalse((new PassInspectionResult('Test', 'Test'))->didInspectionFail());
        $this->assertTrue((new FailInspectionResult('Test', 'Test'))->didInspectionFail());
        $this->assertFalse((new IndeterminateInspectionResult('Test', 'Test'))->didInspectionFail());
    }

    public function testGetInspectionType()
    {
        $this->assertSame('Test Inspection', $this->_getSimpleTestObject()->getInspectionType());
    }

    public function testGetInspectionStatus()
    {
        $this->assertSame(InspectionResultBase::INSPECTION_RESULT_PASS, $this->_getSimpleTestObject()->getInspectionStatus());
    }

    /**
     * @covers \App\InspectionResults\PassInspectionResult
     * @covers \App\InspectionResults\FailInspectionResult
     * @covers \App\InspectionResults\IndeterminateInspectionResult
     * @covers \App\InspectionResults\InspectionResultBase
     */
    public function testDidInspectionPass()
    {
        $this->assertTrue((new PassInspectionResult('Test', 'Test'))->didInspectionPass());
        $this->assertFalse((new FailInspectionResult('Test', 'Test'))->didInspectionPass());
        $this->assertFalse((new IndeterminateInspectionResult('Test', 'Test'))->didInspectionPass());
    }
}
