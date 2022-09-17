<?php

namespace App\Models;

use App\Enums\InvoiceType;
use App\Enums\UnitType;
use App\QueryBuilders\InvoiceQueryBuilder;
use App\Supports\Casts\RupiahCurrency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**{@inheritDoc} */
    protected $fillable = [
        'user_id',
        'to',
        'base_price', 
        'amount', 
        'unit', 
        'type', 
        'total_price', 
        'transaction_date', 
    ];

    /**{@inheritDoc} */
    protected $casts = [
        'unit'            => UnitType::class,
        'type'            => InvoiceType::class,
        'transction_date' => 'datetime',
        'created_at'      => 'datetime',
        'updated_at'      => 'datetime',
        // 'base_price'      => RupiahCurrency::class,
        // 'total_price'      => RupiahCurrency::class,
    ];

    /**{@inheritDoc} */
    public static function booted()
    {
        static::saving(function (Invoice $invoice){

            $invoice->user_id = User::first()->id;
            $invoice->type = InvoiceType::Sale;
            $invoice->total_price = (int)$invoice->base_price * (int) $invoice->amount;
        });
    }

    public static function query()
    {
        return parent::query();
    }

    public function newEloquentBuilder($query)
    {
        return new InvoiceQueryBuilder($query);
    }
}
