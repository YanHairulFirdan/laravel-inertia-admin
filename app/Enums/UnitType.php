<?php

namespace App\Enums;

use App\Enums\Traits\BackedEnum;

enum UnitType: string{
  use BackedEnum;
  
  case Kilogram = 'Kilogram';
  case Gram = 'Gram';
  case Meter = 'Meter';
  case Centimeter = 'Centimeter';
  case Liter = 'Liter';
  case Mililiter = 'Mililiter';
  case Piece = 'Buah';
  case Other = 'Lainnya';
}