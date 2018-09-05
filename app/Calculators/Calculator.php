<?php

namespace App\Calculators;

use App\Models\Invoice;

class Calculator
{
    public function subtotal($invoice)
    {
        return (float)collect($invoice->lines)->sum(function ($line) {
            return $line['number'] * $line['price'];
        });
    }
}
