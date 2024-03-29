
## Heroku APIs to fetch, add and modify config variables on your app.

<b>Package used:</b> https://github.com/TransitScreen/php-heroku-client

1. Get Heroku API key from Heroku account setting page.
2. Write it in .env file ex. HEROKU_API_KEY=xyz.
3.  Add Heroku app name or ID in .env file. That is name of app where config variables need to manipulate.
4. Install package:  $ composer require php-heroku-client/php-heroku-client
5. Created Component to extend HerokuClient <a href="https://github.com/JyotiPanwar/herokuconfigvarapi/blob/master/app/Components/HerokuApi.php">Component</a>

		$heroku = new HerokuClient([
			    'apiKey' => env('HEROKU_API_KEY'), 
		]);
		
6. API to manipulate config variables
		
		FETCH CONFIG VARIABLES
		

		$currentDynos = $heroku->get('apps/my-heroku-app-name/config-vars');

		UPDATE CONFIG VARIABLES
		
		$heroku->patch('apps/my-heroku-app-name/config-vars', $data_array['key'=>'value']);
		
		DELETE CONFIG VARIABLES
		
		$heroku->patch('apps/my-heroku-app-name/config-vars', $data_array['key'=>Null]);
		
For demo : <a href="https://github.com/JyotiPanwar/herokuconfigvarapi/blob/master/app/Http/Controllers/HomeController.php">check home controller</a>	

Example/demo: http://configapis.herokuapp.com/home

## Heroku APIs to fetch, add and modify add-on on your app.
TO FETCH

        $heroku->get('apps/my-heroku-app-name/addons');
TO CREATE

        $addons_set=["confirm" => "example",  "plan"=> "heroku-postgresql:hobby-dev", "name"=> "heroku-postgresql-tenants"];
        $heroku->post('apps/my-heroku-app-name/addons', $addons_set);


