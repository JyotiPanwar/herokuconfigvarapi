
## Heroku APIs to fetch, add and modify config variables on your app.

<b>Package used:</b> https://github.com/TransitScreen/php-heroku-client

1. Get Heroku API key from Heroku account setting page.
2. Write it in .env file ex. HEROKU_API_KEY=xyz
3  Add Heroku app name/key in .env file. That is name of app where config variables need to manipulate.
3. Install package:  $ composer require php-heroku-client/php-heroku-client
4. Created Component to extend HerokuClient <a href="https://github.com/JyotiPanwar/herokuconfigvarapi/blob/master/app/Components/HerokuApi.php">Component</a>

		$heroku = new HerokuClient([
			    'apiKey' => env('HEROKU_API_KEY'), 
		]);
		
		FETCH CONFIG VARIABLES
		
		$currentDynos = $heroku->get('apps/my-heroku-app-name/config-vars');

		UPDATE CONFIG VARIABLES
		
		$heroku->patch('apps/my-heroku-app-name/config-vars', $data_array['key'=>'value']);
		
		DELETE CONFIG VARIABLES
		
		$heroku->patch('apps/my-heroku-app-name/config-vars', $data_array['key'=>Null]);
		
For demo : <a href="https://github.com/JyotiPanwar/herokuconfigvarapi/blob/master/app/Http/Controllers/HomeController.php">check home controller</a>	


