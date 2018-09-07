<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $fillable = [
        'number',
        'client_name',
        'client_email',
        'client_address',
        'invoiced_at',
        'due_at',
        'tax_display',
        'lines',
        'invoice_message',
        'statement_message',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'invoiced_at',
        'due_at',
    ];

    protected $casts = [
        'lines' => 'array',
    ];
}
