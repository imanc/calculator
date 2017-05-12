<?php

namespace AppBundle\Util;

/**
 * A class that simulate a simple calculator
 * @package AppBundle\Util
 */
class Calculator
{
    public function __construct(){

    }

    /**
     * Add two numbers
     * @param $n1 First operand
     * @param $n2 Second operand
     * @throws InvalidArgumentException if the provided arguments are not numeric.
     * @return int Returns the sum of the operands
     */
    public function add($n1, $n2){
        if (!is_numeric($n1)){
            throw new \InvalidArgumentException("Wrong first operator type");
        }
        if (!is_numeric($n2)){
            throw new \InvalidArgumentException("Wrong second operator type");
        }
        return $n1 + $n2;
    }

    /**
     * Subtract two numbers
     * @param $n1 First operand
     * @param $n2 Second operand
     * @throws InvalidArgumentException if the provided arguments are not numeric.
     * @return int Returns the subtraction of the operands
     */
    public function subtract($n1, $n2){
        if (!is_numeric($n1)){
            throw new \InvalidArgumentException("Wrong first operator type");
        }
        if (!is_numeric($n2)){
            throw new \InvalidArgumentException("Wrong second operator type");
        }
        return $n1 - $n2;
    }

    /**
     * Multiply two numbers
     * @param $n1 First operand
     * @param $n2 Second operand
     * @throws InvalidArgumentException if the provided arguments are not numeric.
     * @return int Returns the multiplication of the operands
     */
    public function multiply($n1, $n2){
        if (!is_numeric($n1)){
            throw new \InvalidArgumentException("Wrong first operator type");
        }
        if (!is_numeric($n2)){
            throw new \InvalidArgumentException("Wrong second operator type");
        }
        return $n1 * $n2;
    }

    /**
     * Divide two numbers
     * @param $n1 First operand
     * @param $n2 Second operand
     * @throws InvalidArgumentException if the provided arguments are not numeric.
     * @throws DomainException if the $n2 argument is equal to 0.
     * @return int Returns the division of the operands
     */
    public function divide($n1, $n2){
        if (!is_numeric($n1)){
            throw new \InvalidArgumentException("Wrong first operator type");
        }
        if (!is_numeric($n2)){
            throw new \InvalidArgumentException("Wrong second operator type");
        } else if ($n2 == 0){
            throw new \DomainException("Second operator must be different from 0");
        }
        return $n1 / $n2;
    }
}