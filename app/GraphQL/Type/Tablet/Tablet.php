<?php
namespace App\GraphQL\Type\Tablet;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\Tablet\Tablet_display;
use App\Models\Tablet\Tablet_camera;

class Tablet extends GraphQLType{
    protected $attributes = [
		'name'				=> 'Tablet',
		'description' 		=> 'Tipe untuk query dan mutation tabel Tablet',
    ];
    
    public function fields(){
        [
            'id_display' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_camera' => [
                'type' => Type::nonNull(Type::int()),
            ],
        ];
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'display' => [
                'type' => Type::listOf(GraphQL::type('TabletDisplay')),
            ],
            'camera' => [
                'type' => Type::listOf(GraphQL::type('TabletCamera')),
            ],
        ];
    }

    public function resolveDisplayField($root, $args)
    {
        return Tablet_display::where('id', $root->id_display)->get();
    }
    public function resolveCameraField($root, $args)
    {
        return Tablet_camera::where('id', $root->id_display)->get();
    }
}
