<?php

namespace Tests\Unit\Calculators;

use App\Calculators\Calculator;
use App\Models\Invoice;
use Mockery;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->calculator = new Calculator();
    }

    public function testSubtotalWithNullLines()
    {
        $invoice = $this->getMockedInvoiceWithLines(null);

        $testSubtotal = $this->calculator->subtotal($invoice);

        $this->assertSame(0.0, $testSubtotal);
    }

    private function getMockedInvoiceWithLines($lines)
    {
        $invoice = Mockery::mock(Invoice::class);
        $invoice
            ->shouldReceive('getAttribute')
            ->with('lines')
            ->once()
            ->andReturn($lines);

        return $invoice;
    }

    private function getStubInvoiceWithLines($lines)
    {
        $invoice = new class($lines)
        {
            public $lines;

            public function __construct($lines)
            {
                $this->lines = $lines;
            }
        };

        return $invoice;
    }

   /* public function testSubtotalWithStub()
    {
        $lines = [
            [
                'number' => 2,
                'price' => 3.00
            ],
            [
                'number' => 3,
                'price' => 4.00
            ],
        ];

        $subtotal = collect($lines)->sum(function ($line) {
            return $line['number'] * $line['price'];
        });

        $invoice = $this->getStubInvoiceWithLines($lines);

        $testSubtotal = $this->calculator->subtotal($invoice);

        $this->assertEquals($subtotal, $testSubtotal);
    }*/

    public function testSubtotalWithMock()
    {
        $lines = [
            [
                'number' => 2,
                'price' => 3.00
            ],
            [
                'number' => 3,
                'price' => 4.00
            ],
        ];

        $subtotal = 18.0;

        $invoice = $this->getMockedInvoiceWithLines($lines);

        $testSubtotal = $this->calculator->subtotal($invoice);

        $this->assertEquals($subtotal, $testSubtotal);
    }
}
