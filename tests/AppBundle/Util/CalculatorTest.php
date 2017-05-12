<?php

namespace Tests\AppBundle\Util;

use PHPUnit\Framework\TestCase;
use \AppBundle\Util\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * Test the correct addition operation
     */
    public function testAdd()
    {
        $n1 = 5;
        $n2 = 10;
        $calculator = new Calculator();
        $this->assertEquals(15, $calculator->add($n1, $n2));
    }

    /**
     * Test passing wrong first operator type for addition operation
     */
    public function testAddWrongFirstOperatorType()
    {
        $n1 = "Hello";
        $n2 = 10;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->add($n1, $n2);
    }

    /**
     * Test passing wrong second operator type for addition operation
     */
    public function testAddWrongSecondOperatorType()
    {
        $n1 = 2;
        $n2 = null;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->add($n1, $n2);
    }

    /**
     * Test the correct subtraction operation
     */
    public function testSubtract()
    {
        $n1 = 5;
        $n2 = 10;
        $calculator = new Calculator();
        $this->assertEquals(-5, $calculator->subtract($n1, $n2));
    }

    /**
     * Test passing wrong first operator type for the subtraction operation
     */
    public function testSubtractWrongFirstOperatorType()
    {
        $n1 = "Hello";
        $n2 = 10;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->add($n1, $n2);
    }

    /**
     * Test passing wrong second operator type for the subtraction operation
     */
    public function testSubtractWrongSecondOperatorType()
    {
        $n1 = 2;
        $n2 = null;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->add($n1, $n2);
    }

    /**
 * Test the correct multiplication operation
 */
    public function testMultiply()
    {
        $n1 = 5;
        $n2 = 10;
        $calculator = new Calculator();
        $this->assertEquals(50, $calculator->multiply($n1, $n2));
    }

    /**
     * Test passing wrong first operator type for the multiplication operation
     */
    public function testMultiplyWrongFirstOperatorType()
    {
        $n1 = "Hello";
        $n2 = 10;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->multiply($n1, $n2);
    }

    /**
     * Test passing wrong second operator type for the multiplication operation
     */
    public function testMultiplyWrongSecondOperatorType()
    {
        $n1 = 2;
        $n2 = null;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->multiply($n1, $n2);
    }

    /**
     * Test the correct division operation
     */
    public function testDivision()
    {
        $n1 = 5;
        $n2 = 2;
        $calculator = new Calculator();
        $this->assertEquals(2.5, $calculator->divide($n1, $n2));
    }

    /**
     * Test passing wrong first operator type for the division operation
     */
    public function testDivisionWrongFirstOperatorType()
    {
        $n1 = "Hello";
        $n2 = 10;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->divide($n1, $n2);
    }

    /**
     * Test passing wrong second operator type for the division operation
     */
    public function testDivisionWrongSecondOperatorType()
    {
        $n1 = 2;
        $n2 = null;
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->divide($n1, $n2);
    }

    /**
     * Test passing 0 as second operator
     */
    public function testDivisionByZero()
    {
        $n1 = 2;
        $n2 = 0;
        $calculator = new Calculator();
        $this->expectException(\DomainException::class);
        $calculator->divide($n1, $n2);
    }


}
