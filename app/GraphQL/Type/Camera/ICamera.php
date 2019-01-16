<?php
namespace App\GraphQL\Type\Camera;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Video; // tabel

class ICamera extends GraphQLType
{
	protected $attributes = [
        'name'		=> 'ICamera',
        'description' 		=> 'Melihat Daftar Display',
	];
	//protected $inputObject = true;
	public function fields()
	{
		return [
			'video' => [
								'name' 	=> 'video', 		
								'type' 	=> Type::listOf(GraphQL::type('IVideo')),
						]
					
		];
    }
    
     //resolve yang di sini untuk mendapatkan nilai dari IDisplay
     public function resolveVideoField($root, $args)
     {
         return Video::all();
     }
}