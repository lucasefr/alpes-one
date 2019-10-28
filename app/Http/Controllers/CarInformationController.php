<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarInformationFormRequest;
use Goutte, CarInformationLib;

class CarInformationController extends Controller
{

    const URL = "https://seminovos.com.br";
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getInformation(Request $request)
    {
        //
        $response = $this->getCarInformation($request);
        
        return $response;
    }

    public function getCarInformation($request)
    {
        $url = $this->makeUrl($request);
        $crawler = Goutte::request('GET', $url);
        
        $list = $crawler->filter('.list-of-cards')->children();
        $filter = $crawler->filter('.list-of-cards')->children()->each(function ($node, $i) {
            return ($node->extract('_text')) ;
        });
        $result = json_encode($filter);
        
        return $result;
    }

    public function makeUrl($request)
    {
        $url = "";

        if ($request->vehicleType) {
            $url .= '/'.$request->vehicleType;
        }
        if ($request->branch) {
            $url .= '/'.$request->branch;
        }
        if ($request->model) {
            $url .= '/'.$request->model;
        }
        if ($request->inicialYear) {
            $url .= '/ano-'.$request->inicialYear;
        }
        if ($request->finalYear) {
            $url .= '-'.$request->finalYear;
        }
        if ($request->initialPrice) {
            $url .= '/preco-'.$request->initialPrice;
        }
        if ($request->finalPrice) {
            $url .= '-'.$request->finalPrice;
        }
        if ($request->private) {
            $url .= '/particular-origem';
        }
        if ($request->resale) {
            $url .= '/revenda-origem';
        }
        if ($request->isNew) {
            $url .= '/novo-estado';
        }
        if ($request->isSemiNew) {
            $url .= '/seminovo-estado';
        }

        $url = self::URL.$url; 

        return $url;
    }
    
}
