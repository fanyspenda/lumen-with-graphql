<?php
namespace App\GraphQL\Type\PC;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\PC\Computing_system;
use App\Models\PC\Graphic;

class PC extends GraphQLType{
    protected $attributes = [
		'name'				=> 'PC',
		'description' 		=> 'Tipe untuk query dan mutation tabel Pc',
    ];
    
    public function fields(){
        [
            'id_computing_system' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_graphics' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_storage' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_ports' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_mechanical' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_miscellaneous' => [
                'type' => Type::nonNull(Type::int()),
            ],
        ];
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            
            'computing_system' => [
                'type' => Type::listOf(GraphQL::type('Computing_system')),
            ],
            'graphics' => [
                'type' => Type::listOf(GraphQL::type('Graphics')),
            ],
            // 'storage' => [
            //     'type' => Type::listOf(GraphQL::type('Storage')),
            // ],
            // 'ports' => [
            //     'type' => Type::listOf(GraphQL::type('Ports')),
            // ],
            // 'mechanical' => [
            //     'type' => Type::listOf(GraphQL::type('Mechanical')),
            // ],
            // 'miscellaneous' => [
            //     'type' => Type::listOf(GraphQL::type('miscellaneous')),
            // ],
        ];
    }

    public function resolveComputingSystemField($root, $args)
    {
        return Computing_system::where('id', $root->id_computing_system)->get();
    }

    public function resolveGraphicsField($root, $args)
    {
        return Graphic::where('id', $root->id_graphics)->get();
    }
}
