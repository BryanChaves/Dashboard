<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.default';
	
	public function index()
	{
        $this->layout->nest('content', 'usuario.login');
	}


	public function create()
	{
		$this->layout->nest('content', 'usuario.registro');	
	}

	public function login(){
		$userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

        if (Auth::attempt($userdata)) {
            return Redirect::to('tasks');
        } else {
            // validation not successful, send back to form
            return Redirect::to('login')->withErrors(array('invalid_credentials' => 'Acceso Denegado'));
        }

	}


	
	public function store()
	{
		$name = Input::get('name');
		$last_Name1 = Input::get('last_Name1');
		$last_Name2 = Input::get('last_Name2');
		$email = Input::get('email');
		$password = Input::get('password');
		$confirmation = Input::get('confirmation');
		$datos=Input::all();
		$reglas=array(

			'name'=>'required|alpha',
			'last_Name1'=>'required|alpha',
			'last_Name2'=>'required|alpha',
			'email'=>"required|Email|unique:users,email",
			);
		$mensajes=array("required"=>"The :attribute is required",
						"alpha"=>":attribute Only letters",
						"Email"=>":attribute required email",
						"unique"=>"The :attribute already exists " 


			);
		$validator=Validator::make($datos,$reglas,$mensajes);

		if ($validator->fails()) {
			
				return Redirect::to('registro')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();

		}elseif ($password==$confirmation) {
			
			$password = Hash::make($password);
			$user = new User();
			$user->name = $name;
			$user->last_name1 = $last_Name1;
			$user->last_name2 = $last_Name2;
			$user->email = $email;
			$user->password = $password;
			$user->save();
			Auth::attempt(array('email' => $email, 'password' => $password));
			return Redirect::to('tasks');
		}else{
				return Redirect::to('registro')->withInput()->withErrors(array('invalid_credentials' => ' Not match the password '));

			}
}

	
	public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function isLogged()
    {
        if (Auth::guest()) {
            return Redirect::to('login');
        }
    }


}
