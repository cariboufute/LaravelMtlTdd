<?php

namespace Tests\Feature;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
}
