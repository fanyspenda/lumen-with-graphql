<?php
namespace App\GraphQL\Type\Monitor;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Display;
use App\Connectivity;
use App\Feature;
use App\Dimension;

class Monitor extends GraphQLType{
    
    protected $attributes = [
		'name'				=> 'Monitor',
		'description' 		=> 'Melihat daftar Monitor',
	];

    // protected $inputObject = true;

    public function fields()
    {
        [
            'id_display' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_connectivity' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_feature' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_dimension' => [
                'type' => Type::nonNull(Type::int()),
            ],
        ];
        return [
            'connectivity' => [
                'type' => Type::listOf(GraphQL::type('Connectivity')),
              ],
            'display' => [
                'type' => Type::listOf(GraphQL::type('Display')),
              ],
            'feature' => [
                  'type' => Type::listOf(GraphQL::type('Feature')),
            ],
            'dimension' => [
                'type' => Type::listOf(GraphQL::type('Dimension')),
            ]
        ];
    }

    //resolve yang di sini untuk mendapatkan nilai dari IDisplay
    public function resolveDisplayField($root, $args)
    {
        return Display::where('id', $root->id_display)->get();
    }

    public function resolveConnectivityField($root, $args)
    {

        return Connectivity::where('id', $root->id_connectivity)->get();
    }

    public function resolveFeatureField($root, $args)
    {
        return Feature::where('id', $root->id_feature)->get();
    }

    public function resolveDimensionField($root, $args)
    {
        return Dimension::where('id', $root->id_dimension)->get();
    }
}