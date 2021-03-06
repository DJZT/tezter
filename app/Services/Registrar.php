<?php namespace App\Services;

use App\Models\Role;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' 		=> 'required|email|max:255|unique:users',
			'password' 		=> 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'first_name' 	=> $data['first_name'],
			'last_name' 	=> $data['last_name'],
			'second_name' 	=> $data['second_name'],
			'email' 		=> $data['email'],
			'password' 		=> bcrypt($data['password']),
			'group_id'		=> isset($data['group_id'])?$data['groupt_id']:0,
//			'role_id'		=>	Role::where('dafault', true)->first()->id
		]);
	}

}
