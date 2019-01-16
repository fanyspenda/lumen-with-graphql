<?php

namespace App\GraphQL\Type\Camera;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class IVideo extends GraphQLType
{
	protected $attributes = [
        'name'		=> 'IVideo',
        'description' 		=> 'Melihat Daftar Display',
	];
	//protected $inputObject = true;
	public function fields()
	{
		return [
			'resolution_available'	=> 	[
								'name' 	=> 'resolution_available', 		
								'type' 	=> Type::nonNull(Type::string()),
							],
			'fps'	=> 	[
								'name' 	=> 'fps', 		
								'type' 	=> Type::nonNull(Type::string()),
							],
		];
	}
}