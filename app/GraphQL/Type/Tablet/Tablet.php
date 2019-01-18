<?php
namespace App\GraphQL\Type\Tablet;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\Tablet\Tablet_display;
use App\Models\Tablet\Tablet_camera;
use App\Models\Tablet\Tablet_design;
use App\Models\Tablet\Tablet_platform;

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
            'id_design' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_platform' => [
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
            'design' => [
                'type' => Type::listOf(GraphQL::type('TabletDesign')),
            ],
            'platform' => [
                'type' => Type::listOf(GraphQL::type('TabletPlatform')),
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
    public function resolveDesignField($root, $args)
    {
        return Tablet_design::where('id', $root->id_design)->get();
    }
    public function resolvePlatformField($root, $args)
    {
        return Tablet_platform::where('id', $root->id_platform)->get();
    }
}
