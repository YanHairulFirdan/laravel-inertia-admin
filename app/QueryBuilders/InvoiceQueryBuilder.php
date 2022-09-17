<?php

namespace App\QueryBuilders;

use App\Enums\InvoiceType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class InvoiceQueryBuilder extends Builder
{
    public function whereIsSale()
    {
        $this->where('type', InvoiceType::Sale);

        return $this;
    }
    
    public function whereIsExpense()
    {
        $this->where('type', InvoiceType::Expense);

        return $this;
    }

    public function whereTransactionThisYear()
    {
        $this->whereYear('transaction_date', '=', now(config('app.timezone'))->year);

        return $this;
    }

    public function whereTransactionThisMonth()
    {
        $this->whereMonth('transaction_date', '=', now(config('app.timezone'))->month);

        return $this;
    }

    public function salesThisMonth() : string
    {
        $this->whereIsSale();
        $this->whereTransactionThisMonth();
        $this->whereTransactionThisYear();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }

    public function expensesThisMonth() : string
    {
        $this->whereIsExpense();
        $this->whereTransactionThisMonth();
        $this->whereTransactionThisYear();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }

    public function salesThisYear() : string
    {
        $this->whereIsSale();
        $this->whereTransactionThisYear();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }

    public function expensesThisYear() : string
    {
        $this->whereIsExpense();
        $this->whereTransactionThisYear();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }

    public function totalSale()
    {
        $this->whereIsSale();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }
    
    public function totalExpense()
    {
        $this->whereIsExpense();

        return number_format($this->sum('total_price'), 2, ',', '.');
    }

    public function monthlySales()
    {
        $this->select(DB::raw(
            "date_format(transaction_date, '%Y') as year, 
            month(transaction_date) as monthInNumber, 
            date_format(transaction_date, '%M') as month, sum(total_price) as total"
        ));
        $this->whereIsSale();
        $this->whereTransactionThisYear();
        $this->groupBy(DB::raw("year, monthInNumber, month"))
            ->orderBy(DB::raw("year, monthInNumber, month"));

        return $this;
    }

    public function monthlySalesDataChart()
    {
        $sales = $this->monthlySales()->get();
    }

    public function yearlySale()
    {
        $this->select(DB::raw("YEAR(transaction_date) as year, sum(total_price) as total"));
        $this->whereIsSale();
        $this->groupBy('year');

        return $this;
    }

    public function monthlyExpenses()
    {
        $this->select(DB::raw(
            "date_format(transaction_date, '%Y') as year, 
            month(transaction_date) as monthInNumber, 
            date_format(transaction_date, '%M') as month, sum(total_price) as total"
        ));
        $this->whereIsExpense();
        $this->whereTransactionThisYear();
        $this->groupBy(DB::raw("year, monthInNumber, month"))
            ->orderBy(DB::raw("year, monthInNumber, month"));

        return $this;
    }

    public function yearlyExpenses()
    {
        $this->select(DB::raw("YEAR(transaction_date) as year, sum(total_price) as total"));
        $this->whereIsExpense();
        $this->groupBy(DB::raw('year'));

        return $this;
    }
}
