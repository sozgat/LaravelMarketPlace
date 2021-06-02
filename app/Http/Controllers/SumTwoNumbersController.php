<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumTwoNumbersController extends Controller
{
    public function sumTwoNumbers(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }
}
