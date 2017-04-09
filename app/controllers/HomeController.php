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
	public function postToDB( $id, $val1, $val2, $val3, $time, $date){
		$sensor = null;
		if($id == "acce"){
			$sensor ="accelerometer";
		}
		elseif($id == "gyro"){
			$sensor = "gyroscope";
		}
		if ($sensor){
			DB::table($sensor)->insert([
				'x' => $val1,
			  'y' => $val2,
				'z' => $val3,
				'time' => $time,
				'date' => $date
			]);
		 $results = $sensor.'/x='.$val1.'/time='.$time.'/date='.$date;
		 return Response::json($results, 200);
	 }
	}
	public function getData($id){
		$sensor = null;
		if($id == "acce"){
			$sensor ="accelerometer";
		}
		elseif($id == "gyro"){
			$sensor = "gyroscope";
		}
		if ($sensor){
			$results = DB::table($sensor)->select([
				'id',
				'x',
				'y',
				'z',
				'date',
				'time'
			])
			->get();
			//$results->sensor = $sensor;
		 return Response::json($results, 200);
	 }
	}

  public function addUser( $username, $firstname, $lastname ){
		$duplicate = null;
		$un = null;
		$duplicate = DB::table('users')
		  ->select(['users.username AS username'])
			->get();
			$duplicate = (object)$duplicate;
			foreach ($duplicate as $usr) {
			  if( $username == $usr->username ){
				  $un = $username;
			  }
			}
		if ( $username != $un ){
			DB::table('users')->insert([
				'username' => $username,
				'firstname' => $firstname,
				'lastname' => $lastname
			]);
			$results = "user added";
		}else{
			$results = "username already exists";
		}
		return Response::json($results, 200);
	}

	public function observation( $user_id, $action, $color, $sense, $x, $y, $z, $timestamp ){
		$date = date("Y-m-d");
		$time = $timestamp;
		/*$date = date("Y-m-d", $time);               // 2015-12-19
    $time = date("h:i:s.u", $time); */          // 10:10:16
		$sensor = null;
		if($sense == "acce"){
			$sensor ="accelerometer";
		}
		else if($sense == "gyro"){
			$sensor = "gyroscope";
		}
		if ($sensor){
			DB::table('observationMilli')->insert([
				'user_id' => $user_id,
				'sensor' => $sensor,
				'observed_action' => $action,
				'color' => $color,
				'x' => $x,
				'y' => $y,
				'z' => $z,
				'date' => $date,
				'time' => $time
			]);
		 $results = $sensor.'/x='.$x.'/time='.$time.'/date='.$date;
		 return Response::json($results, 200);
	 }


	}

	public function data(){
		$results =  DB::table('observation')->select([
			'id',
			'user_id',
			'sensor',
			'observed_action',
			'color',
			'x',
			'y',
			'z',
			'date',
			'time'
			])
			->get();

	 return Response::json( $results, 200 );
	}
	public function dataNew(){
		$results =  DB::table('observationMilli')->select([
			'id',
			'user_id',
			'sensor',
			'observed_action',
			'color',
			'x',
			'y',
			'z',
			'date',
			'time'
			])
			->get();

	 return Response::json( $results, 200 );
	}

// function to input data to inputData table
public function inputData( $user_id, $start_time, $start_position, $x, $y, $z, $timestamp ){
		$date = date("Y-m-d");
		$time = $timestamp;
		if ($start_position){
			DB::table('inputDataTable')->insert([
				'user_id' => $user_id,
				'start_time' => $start_time,
				'start_position' => $start_position,
				'x' => $x,
				'y' => $y,
				'z' => $z,
				'date' => $date,
				'time' => $time
			]);
	 	$results = $start_position.'/x='.$x.'/time='.$time.'/date='.$date;
	 	return Response::json($results, 200);
 	}
}
 //function to truncate tables
 public function truncateTable($table){
	 DB::table($table)->truncate();
	 return Response::json('table truncated', 200);
 }

 public function getInputData(){
	 $results =  DB::table('inputDataTable')->select([
		 'id',
		 'user_id',
		 'start_time',
		 'start_position',
		 'x',
		 'y',
		 'z',
		 'date',
		 'time'
		 ])
		 ->get();

	return Response::json( $results, 200 );
 }

}
