<?php

namespace App\Enums;

use App\Enums\Traits\BackedEnum;

enum InvoiceType: string{
  use BackedEnum;

  case Sale = 'Penjualan';
  case Expense = 'Pengeluaran';
}