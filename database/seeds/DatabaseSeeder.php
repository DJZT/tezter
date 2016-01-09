<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		\App\User::create([
			'first_name'	=> 'Stanisalv',
			'last_name'		=> 'Pochepko',
			'second_name'	=> 'Nikolaevich',
			'email'			=> 'DJZT44@gmail.com',
			'password'		=> bcrypt('123456'),
			'group_id'		=> 0,
			'role_id'		=> 0
		]);

		\App\User::create([
			'first_name'	=> 'Test first name',
			'last_name'		=> 'Test last name',
			'second_name'	=> 'Test second name',
			'email'			=> 'test@test.com',
			'password'		=> bcrypt('123456'),
			'group_id'		=> 0,
			'role_id'		=> 0
		]);

		\Illuminate\Support\Facades\DB::table('type_question')->insert([['title' => 'radio'],['title' => 'checkbox']]);

		$Prototype = \App\Models\Prototype::create([
				'title'				=> 'Тест по биологии',
				'time'				=> 40,
				'count_questions'	=> 5
		]);

		$Question = \App\Models\Question::create([
			'prototype_id'	=> $Prototype->id,
			'text'			=> 'Сколько лап у ежа?',
			'type'			=> 'radio'
	]);

		$Answer = \App\Models\Answer::create([
				'text'			=> '4',
				'right'			=> true,
				'question_id'	=> $Question->id
		]);
		$Answer = \App\Models\Answer::create([
				'text'			=> '6',
				'question_id'	=> $Question->id
		]);
		$Answer = \App\Models\Answer::create([
				'text'			=> 'Много',
				'question_id'	=> $Question->id
		]);

		$Question = \App\Models\Question::create([
				'prototype_id'	=> $Prototype->id,
				'text'			=> 'Какая длина хобота у слона?',
				'type'			=> 'radio'
		]);

		$Answer = \App\Models\Answer::create([
				'text'			=> 'У слона нет хобота',
				'question_id'	=> $Question->id
		]);
		$Answer = \App\Models\Answer::create([
				'text'			=> '2 метра',
				'question_id'	=> $Question->id
		]);
		$Answer = \App\Models\Answer::create([
				'text'			=> 'Зависит от возраста',
				'right'			=> true,
				'question_id'	=> $Question->id
		]);

		$Question = \App\Models\Question::create([
				'prototype_id'	=> $Prototype->id,
				'text'			=> 'Сколько рёбер у человека?',
				'type'			=> 'radio'
		]);

		$Answer = \App\Models\Answer::create([
				'text'			=> '12 пар',
				'question_id'	=> $Question->id
		]);
		$Answer = \App\Models\Answer::create([
				'text'			=> 'Кто такой человек?',
				'right'			=> true,
				'question_id'	=> $Question->id
		]);


		// $this->call('UserTableSeeder');
	}

}