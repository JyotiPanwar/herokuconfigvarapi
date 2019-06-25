<?php

namespace App\Components;

use HerokuClient\Client as HerokuClient;
use App\Models\{
    User
};

class HerokuApi {

    public function init() {
    	$heroku = new HerokuClient([
            'apiKey' => env('HEROKU_API_KEY'), 
        ]);
    	return $heroku;
    }
}
