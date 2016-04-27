<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function postToDB($id, $val1, $val2, $val3, $time, $date){
		$identifier = 0;
		$sensor = null;
		if($id == "acce"){
			$sensor ="accelerometer";
		}
		elseif($id == "gyro"){
			$sensor = "gyroscope";
		}
		if ($sensor){
			DB::table($sensor)->insert([
				'id' => $identifier,
				'x' => $val1,
			  'y' => $val2,
				'z' => $val3,
				'time' => $time,
				'date' => $date
			]);
		 $results = $sensor.'/x='.$val1.'/time='.$time.'/date='.$date;
		 $identifier++;
		 return Response::json($results, 200);
	 }
	}

}