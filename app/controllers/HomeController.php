<?php

class HomeController extends BaseController {

	public function getIndex(){
		return View::make('public.index');
	}

	public function postAddUser(){
		
		$input = Input::all();	

		$fname = $input['fname'];
		$email = $input['email'];

		$rules = array(
			'fname' => 'required',
			'email' => 'required|email|unique:users',
		);

		$validator = Validator::make($input, $rules);
		
		if($validator->fails()){

			// get the error messages from the validator
        	$issues = $validator->messages();
        	// echo '<pre>'; print_r($errors); echo '</pre>'; 	exit;

			return View::make('public.index')	
				->withInput($input)
				->withErrors($validator);
				// ->with(array(
				// 	'issue' => $issues,
				// 	)
				// );

		}else{

			$data	= new User();
			//echo '<pre>'; print_r($input); echo '</pre>'; 	exit;
			$data->fname 	= Input::get('fname');
			$data->email 	= Input::get('email');
			$data->user_type 	= 'GUEST';
			$data->active  = 1;	
			$data->save();
			// echo '<pre>'; print_r($data); echo '</pre>'; 	exit;	
		}; 

		//$data = User::all();	
		$registered = 'Thankyou for showing your interest! We cannot wait to see you there!';
		return View::make('public.index')
			->with(array('registered' => $registered));	
	}


	public function getMaps(){

	// // I'm creating an array with user's info but most likely you can use $user->email or pass $user object to closure later
	// $user = array(
	// 	'email'=>'tomcurphey12@gmail.com',
	// 	'name'=>'Tom'
	// );

	// // the data that will be passed into the mail view blade template
	// $data = array(
	// 	'detail'=>'You are awesome',
	// 	'name'=>'Samhj'
	// );

	//  echo '<pre>'; print_r($user['email']); echo '</pre>';exit;

	// // use Mail::send function to send email passing the data and using the $user variable in the closure
	// Mail::send('public.maps', $data, function($message) use ($user)
	// {
	//   $message->from('hello@sonaughtybutnice.com', 'Sarah and Tom');

	//   $message->to('tomcurphey12@gmail.com', 'Tom')->subject('Welcome to My Laravel app!');
	// });


	 Mail::send('public.maps', array('name' => 'Tom'), function($message){
		$message->to('hello@sonaughtybutnice.com', 'Tom Curphey')->subject('test email');
	}); 

	// echo '<pre>'; print_r($ingredient_image); echo '</pre>';
	// echo '<pre>'; print_r($iData); echo '</pre>';
	// exit;

	return View::make('public.maps');
		// ->with(array(
		// 'detail' => $detail, 
		// 'name' => $name,
		// ));
	

	}

}