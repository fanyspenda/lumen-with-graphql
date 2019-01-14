<?php
namespace App\GraphQL\Type\Monitor;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Display;

class IMonitor extends GraphQLType{
    
    protected $attributes = [
		'name'				=> 'IMonitor',
		'description' 		=> 'Tambah stok barang',
	];

    // protected $inputObject = true;

    public function fields()
    {
        return [
            'displays' => [
              'type' => Type::listOf(GraphQL::type('IDisplay')),
            ],
        ];
    }

    //resolve yang di sini untuk mendapatkan nilai dari IDisplay
    public function resolveDisplaysField($root, $args)
    {
        return Display::all();
    }
}
