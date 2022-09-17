<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard',[
            'salesThisMonth'    => Invoice::query()->salesThisMonth(),
            'salesThisYear'     => Invoice::query()->salesThisYear(),
            'totalSale'         => Invoice::query()->totalSale(),
            'monthlySales'      => Invoice::query()->monthlySales()->get(),
            'yearlySales'       => Invoice::query()->yearlySale()->get(),
            'expensesThisMonth' => Invoice::query()->expensesThisMonth(),
            'expensesThisYear'  => Invoice::query()->expensesThisYear(),
            'totalExpense'      => Invoice::query()->totalExpense(),
            'monthlyExpenses'   => Invoice::query()->monthlyExpenses()->get(),
            'yearlyExpenses'    => Invoice::query()->yearlyExpenses()->get(),
        ]);
        
    }
}
