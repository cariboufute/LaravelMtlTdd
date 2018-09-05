<?php

namespace Tests\Feature;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        $this->invoice = new Invoice();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(Invoice::class, $this->invoice);
    }

    public function testGetLinesAttribute()
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

        $lineString = json_encode($lines);
        DB::table('invoices')->insert([
            'lines' => $lineString
        ]);

        $invoice = $this->invoice->first();

        $this->assertEquals($lines, $invoice->lines);
    }
}
