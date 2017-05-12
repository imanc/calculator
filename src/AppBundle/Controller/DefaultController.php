<?php

namespace AppBundle\Controller;

use AppBundle\Util\Calculator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/calculator", name="calculatorIndex")
     * @Method("GET")
     */
    public function calculatorAction()
    {
        return $this->render('default/calculator.html.twig');
    }

    /**
     * @Route("/calculator", name="calculatorResult")
     * @Method("POST")
     */
    public function calculatorResultAction(Request $request)
    {
        $firstOperator = $request->get('firstOperator');
        $secondOperator = $request->get('secondOperator');
        $operation = $request->get('operation');
        $calculator = new Calculator();

        switch ($operation){
            case '+':
                $result = $calculator->add($firstOperator, $secondOperator);
                break;
            case '-':
                $result = $calculator->subtract($firstOperator, $secondOperator);
                break;
            case '*':
                $result = $calculator->multiply($firstOperator, $secondOperator);
                break;
            case '/':
                $result = $calculator->divide($firstOperator, $secondOperator);
                break;
            default:
                throw new \InvalidArgumentException("Operation not supported");
        }

        return new JsonResponse($result);
    }
}
