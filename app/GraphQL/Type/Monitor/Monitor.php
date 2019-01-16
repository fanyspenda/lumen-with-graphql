<?php
namespace App\GraphQL\Type\Monitor;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\Monitor\Display;
use App\Models\Monitor\Connectivity;
use App\Models\Monitor\Feature;
use App\Models\Monitor\Dimension;
use App\Models\Monitor\Power;
use App\Models\Monitor\General;

class Monitor extends GraphQLType{
    
    protected $attributes = [
		'name'				=> 'Monitor',
		'description' 		=> 'Tipe untuk query dan mutation tabel Monitor',
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
            'id_power' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_general'=> [
                'type' => Type::nonNull(Type::int()),
            ]
        ];
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
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
            ],
            'power' => [
                'type' => Type::listOf(GraphQL::type('Power')),
            ],
            'general' => [
                'type' => Type::listOf(GraphQL::type('General')),
            ],
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
    public function resolvePowerField($root, $args)
    {
        return Power::where('id', $root->id_power)->get();
    }
    public function resolveGeneralField($root, $args)
    {
        return General::where('id', $root->id_general)->get();
    }
}