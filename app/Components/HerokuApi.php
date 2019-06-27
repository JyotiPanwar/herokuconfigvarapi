<?php

namespace App\Components;

use HerokuClient\Client as HerokuClient;
use App\Models\{
    User
};

class HerokuApi {

	public $heroku_app_name;
	public $heroku_api_key;

	public function __construct() {
      $this->heroku_app_name = env('APP_NAME_TO_MODIFY');
      $this->heroku_api_key = env('HEROKU_API_KEY');
    }

    public function init() {
    	$heroku = new HerokuClient([
            'apiKey' => env('HEROKU_API_KEY'), 
        ]);
    	return $heroku;
    }
}
