<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
	public function run()
	{
		DB::table('people')->insert([
			[
				'first_name' => 'Adrienne',
				'last_name'	 => 'Rangel',
				'avatar'     => 'adrienne.jpg',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'Katherin',
				'last_name'	 => 'Gamez',
				'avatar'     => 'kathe.jpg',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'Jhonny',
				'last_name'	 => 'Pérez',
				'avatar'     => 'jhonny.jpg',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'Kamila',
				'last_name'	 => 'Zerpa',
				'avatar'     => 'kamila.jpg',
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('users')->insert([
			[
				'email' 	 => 'adrienne@rangel.com',
				'password'   => bcrypt('rangel123'),
				'type'		 => 'teacher',
				'people_id'	 => 1,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'kathe@gamez.com',
				'password'   => bcrypt('kathe123'),
				'type'		 => 'student',
				'people_id'	 => 2,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'jhonny@perez.com',
				'password'   => bcrypt('admin'),
				'type'		 => 'student',
				'people_id'	 => 3,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'kamila@zerpa.com',
				'password'   => bcrypt('kamila123'),
				'type'		 => 'student',
				'people_id'	 => 4,
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('sections')->insert([
			[
			'section'	=> 'K1'
			],
			[
			'section'	=> 'K2'
			],
			[
			'section'	=> 'K3'
			],
			[
			'section'	=> 'K4'
			],
			[
			'section'	=> 'K5'
			],
		]);

		DB::table('students')->insert([
			[
				'section_id'	=>	'2',
				'people_id'		=>	'2'
			],
			[
				'section_id'	=>	'2',
				'people_id'		=>	'3'
			],
			[
				'section_id'	=>	'2',
				'people_id'		=>	'4'
			]
		]);

		DB::table('topics')->insert([
			[
				'topic' => 'Seguridad_Informatica', 'image' => 'image2.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, consequuntur officiis nobis ex nihil impedit.', 'created_at' => now('America/Caracas')
			],
			[
				'topic' => 'Redes', 'image' => 'image3.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit.', 'created_at' => now('America/Caracas')
			],
			[
				'topic' => 'Transmision_de_datos', 'image' => 'image4.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit.', 'created_at' => now('America/Caracas')
			],
			[
				'topic' => 'Cables', 'image' => 'image5.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit.', 'created_at' => now('America/Caracas')
			],
			[
				'topic' => 'Redireccionamiento_IP', 'image' => 'image6.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit.', 'created_at' => now('America/Caracas')
			],
		]);

		DB::table('contents')->insert([
			[
				'name'		 => 'Cable Par trenzado cat 5e',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis iure, distinctio necessitatibus, perferendis deserunt quasi explicabo dolorem suscipit laborum dicta voluptas inventore quis sit voluptatem aut voluptatum delectus, sequi repellat.',
				'file'       => 'image.jpg',
				'topic_id'	 => rand(1,5),
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	2
			],
			[
				'name'		 => 'Topologia de red',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque officiis vel placeat sed excepturi rem, quidem ad, consequatur aliquam veritatis aliquid voluptates inventore quo, odio sint debitis molestiae impedit blanditiis.',
				'file'       => 'image1.jpg',
				'topic_id'	 => rand(1,5),
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	2
			],
			[
				'name'		 => 'Medio de transmision radial',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque officiis vel placeat sed excepturi rem, quidem ad, consequatur aliquam veritatis aliquid voluptates inventore quo, odio sint debitis molestiae impedit blanditiis.',
				'file'       => 'image2.jpg',
				'topic_id'	 => rand(1,5),
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	2
			],
			[
				'name'		 => 'Cable coaxial',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis iure.',
				'file'       => 'image3.jpg',
				'topic_id'	 => rand(1,5),
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	2
			]
		]);

		DB::table('text_contents')->insert([
			'name'		 	=> 'Cable Par alñfkñla cat 5e',
			'textcontent'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis iure, distinctio necessitatibus, perferendis deserunt quasi explicabo dolorem suscipit laborum dicta voluptas inventore quis sit voluptatem aut voluptatum delectus, sequi repellat.',
			'topic_id'	 => 2,
			'people_id'  => 1,
			'section_id' =>	2,
			'created_at' => now('America/Caracas')
		]);

		DB::table('tests')->insert([
			[
			'note'			=>	'100',
			'time'			=>	'10',
			'topic_id'	 	=>  1,
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			],
			[
			'note'			=>	'100',
			'time'			=>	'10',
			'topic_id'	 	=> 	2,
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			],
			[
			'note'			=>	'100',
			'time'			=>	'20',
			'topic_id'	 	=>  3,
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			],
			[
			'topic_id'	 	=>  4,
			'note'			=>	'100',
			'time'			=>	'20',
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			],
			[
			'topic_id'	 	=>  5,
			'note'			=>	'100',
			'time'			=>	'30',
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			]
		]);

		DB::table('test_simples')->insert([
			[
			'note'			=>	'100',
			'time'			=>	'40',
			'topic_id'	 	=>  4,
			'people_id'		=>	1,
			'section_id'	=>	2,
			'created_at' 	=> now('America/Caracas')
			]
		]);

		DB::table('questions')->insert([
			[
				'text'		=>	'Que son los hackers?',
				'value'		=>	'20',
				'test_id'	=>	1
			],
			[
				'text'		=>	'Que es un hacker de sombrero blanco?',
				'value'		=>	'20',
				'test_id'	=>	1
			],
			[
				'text'		=>	'Que es un exploit?',
				'value'		=>	'20',
				'test_id'	=>	1
			],
			[
				'text'		=>	'Que es un delito informatico?',
				'value'		=>	'20',
				'test_id'	=>	1
			],
			[
				'text'		=>	'Diferencias entre kraker y hacker',
				'value'		=>	'20',
				'test_id'	=>	1
			],

			// -------------------------------------------------------------
			
			[
				'text'		=>	'Que es una topologia?',
				'value'		=>	'20',
				'test_id'	=>	2
			],
			[
				'text'		=>	'Como funciona la topologia estrella?',
				'value'		=>	'20',
				'test_id'	=>	2
			],
			[
				'text'		=>	'Funcion de un router?',
				'value'		=>	'20',
				'test_id'	=>	2
			],
			[
				'text'		=>	'Uso de router Cisco con topologia de arbol',
				'value'		=>	'20',
				'test_id'	=>	2
			],
			[
				'text'		=>	'Configuracion basica de red wifi WPA2',
				'value'		=>	'20',
				'test_id'	=>	2
			],

			// -------------------------------------------------------------
			
			[
				'text'		=>	'Que es la transmision guiada?',
				'value'		=>	'50',
				'test_id'	=>	3
			],
			[
				'text'		=>	'Que es la transmision no guiada?',
				'value'		=>	'50',
				'test_id'	=>	3
			],

			// -------------------------------------------------------------
			
			[
				'text'		=>	'Que es un cable de fibra optica?',
				'value'		=>	'25',
				'test_id'	=>	4
			],
			[
				'text'		=>	'Comparacion de un cable de fibra optica y un cable de utp',
				'value'		=>	'25',
				'test_id'	=>	4
			],
			[
				'text'		=>	'Velocidad de transmision',
				'value'		=>	'50',
				'test_id'	=>	4
			],

			// -------------------------------------------------------------
			
			[
				'text'		=>	'Que es una direccion IP?',
				'value'		=>	'50',
				'test_id'	=>	5
			],
			[
				'text'		=>	'Que es una direccion MAC?',
				'value'		=>	'50',
				'test_id'	=>	5
			]
		]);

		DB::table('question_simples')->insert([
			[
				'text'				=>	'Que son las redes neuronales?',
				'value'				=>	'25',
				'good'				=>	'2',
				'test_simple_id'	=>	1
			],
			[
				'text'				=>	'Que es un hacker?',
				'value'				=>	'25',
				'good'				=>	'2',
				'test_simple_id'	=>	1
			],
			[
				'text'				=>	'Que se conoce como gateway?',
				'value'				=>	'25',
				'good'				=>	'2',
				'test_simple_id'	=>	1
			],
			[
				'text'				=>	'Que es un ciclo repetitivo en programacion?',
				'value'				=>	'25',
				'good'				=>	'2',
				'test_simple_id'	=>	1
			],
		]);

		DB::table('answer_simples')->insert([
			[
				'number'				=>	'1',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'1',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'2',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'1',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'3',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'1',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'4',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'1',
				'test_simple_id'		=>	'1'
			],
			// -----------------------------------------------------------------------------
			[
				'number'				=>	'1',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'2',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'2',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'2',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'3',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'2',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'4',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'2',
				'test_simple_id'		=>	'1'
			],
			// -----------------------------------------------------------------------------
			[
				'number'				=>	'1',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'3',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'2',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'3',
				'test_simple_id'		=>	'1'
			],
			// -----------------------------------------------------------------------------
			[
				'number'				=>	'1',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'4',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'2',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'4',
				'test_simple_id'		=>	'1'
			],
			[
				'number'				=>	'3',
				'text'					=>	'Soy una respuesta ficticia generada para una prueba!',
				'people_id'				=>	'1',
				'question_simple_id'	=>	'4',
				'test_simple_id'		=>	'1'
			],
			// -----------------------------------------------------------------------------
		]);
	}
}
