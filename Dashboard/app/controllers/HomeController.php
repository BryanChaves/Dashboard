<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.default';

	public function showWelcome()
	{
		return View::make('home');
	}

	public function publica()
	{
		$this->layout->nest('content', 'public');
	}

	public function privada()
	{
		$this->layout->nest('content', 'private');
	}

}
