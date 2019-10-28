<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Goutte;

class CrawlerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private $vehicleType;
    private $isNew;
    private $isSemiNew;
    private $branch;
    private $model;
    private $city;
    private $initialPrice;
    private $finalPrice;
    private $inicialYear;
    private $finalYear;
    private $private;
    private $resale;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCrawler(){

        $this->vehicleType = 'carro';
        $this->isNew = true;
        $this->isSemiNew = true;
        $this->branch = 'volkswagen';
        $this->model = 'gol';
        $this->initialPrice = '2000';
        $this->finalPrice = '90000';
        $this->inicialYear = '2001';
        $this->finalYear = '2020';
        $this->private = true;
        $this->resale = true;

        $crawler = Goutte::request('GET', 'https://seminovos.com.br');
        $filter = $crawler->filter('.section-features');

        // dd($filter);

        $params = array(
			'vehicleType' 			=> $this->vehicleType,
            'isNew' 				=> $this->isNew,
            'isSemiNew' 			=> $this->isSemiNew,
            'branch' 				=> $this->branch,
            'model' 				=> $this->model,
            'initialPrice' 		    => $this->initialPrice,
            'finalPrice' 			=> $this->finalPrice,
            'inicialYear' 			=> $this->inicialYear,
            'finalYear' 			=> $this->finalYear,
            'private' 				=> $this->private,
            'resale' 				=> $this->resale,
        );

        $response = $this->call('GET', '/api/filter', $params);
		$apiResult  = json_decode($response->getContent());

		$this->assertEquals($apiResult->success, true);

    }
}
