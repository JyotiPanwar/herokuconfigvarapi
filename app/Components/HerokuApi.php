<?php

namespace App\Components;

use HerokuClient\Client as HerokuClient;
use App\Models\{
    User
};

class HerokuApi {

	public $heroku_app_name;

	public function __construct() {
      $this->heroku_app_name = env('APP_NAME_ON_HEROKU');
    }

    public function init() {
    	$heroku = new HerokuClient([
            'apiKey' => env('HEROKU_API_KEY'), 
        ]);
    	return $heroku;
    }
}
