<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    /**
     * Test form layout
     */
    public function testCalculatorGet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/calculator');
        $form = $crawler->selectButton('submit')->form();
        $response = $client->getResponse();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
        $this->assertEquals(200, $response->getStatusCode(), 'Calculator GET route not defined!');

        $this->assertEquals(1, $crawler->filter("input[name='firstOperator']")->count());
        $this->assertEquals(1, $crawler->filter("select[name='operation']")->count());
        $this->assertEquals(1, $crawler->filter("input[name='secondOperator']")->count());
        $this->assertEquals(1, $crawler->filter("button[type='submit']")->count());
        $this->assertEquals(1, $crawler->filter("#result")->count());

    }

    /**
     * Test a correct POST call to calculator route
     */
    public function testCalculatorCorrectPost()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/calculator',
            [
                'firstOperator'=>2,
                'operation'=>'+',
                'secondOperator'=>5,
            ]);

        $response = $client->getResponse();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
        $this->assertEquals(200, $response->getStatusCode(), "Calculator POST route not defined!");
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertJsonStringEqualsJsonString("7", $response->getContent());

    }

    /**
     * Test incorrect POST calls to calculator route
     */
    public function testCalculatorWrongPost()
    {
        $client = static::createClient();
        $client->request('POST', '/calculator',
            [
                'firstOperator'=>'sdaf',
                'operation'=>'+',
                'secondOperator'=>5,
            ]);

        $response = $client->getResponse();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
        $this->assertEquals(500, $response->getStatusCode(), "First parameter error");

        $client->request('POST', '/calculator',
        [
            'firstOperator'=>2,
            'operation'=>'+',
            'secondOperator'=>null,
        ]);
        $this->assertEquals(500, $response->getStatusCode(), "Second parameter error");

        $client->request('POST', '/calculator',
            [
                'firstOperator'=>2,
                'operation'=>'sad',
                'secondOperator'=>2,
            ]);
        $this->assertEquals(500, $response->getStatusCode(), "Operator parameter error");
    }

}
