<?php

namespace Tests\Unit;

use App\Http\Controllers\SumTwoNumbersController;
use PHPUnit\Framework\TestCase;

class SumTwoNumbersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sum_two_numbers()
    {
        $sumTwoNumbers = new SumTwoNumbersController();
        $result = $sumTwoNumbers->sumTwoNumbers(1,5);



        $this->assertEquals($result,6);
        $this->assertTrue(is_int($result),'Function return type is int');


    }
}
