<?php
namespace App\GraphQL\Type\Smartwatch;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\Smartwatch\Sensor;
use App\Models\Smartwatch\Activity_tracker;
use App\Models\Smartwatch\Smartwatch_Connectivity;

class Smartwatch extends GraphQLType{
    protected $attributes = [
		'name'				=> 'Smartwatch',
		'description' 		=> 'Tipe untuk query dan mutation tabel Smartwatch',
    ];
    
    public function fields(){
        [
            'id_sensors' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_activity_tracker' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_connectivity' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_design' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_display' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_features' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'id_notifications' => [
                'type' => Type::nonNull(Type::int()),
            ]
        ];
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'sensors' => [
                'type' => Type::listOf(GraphQL::type('Sensors')),
            ],
            'activity_tracker' => [
                'type' => Type::listOf(GraphQL::type('Activity_tracker')),
            ],
            'connectivity' => [
                'type' => Type::listOf(GraphQL::type('SmartwatchConnectivity')),
            ],
        ];
    }

    public function resolveSensorsField($root, $args)
    {
        return Sensor::where('id', $root->id_sensors)->get();
    }

    public function resolveActivityTrackerField($root, $args)
    {
        return Activity_tracker::where('id', $root->id_activity_tracker)->get();
    }

    public function resolveConnectivityField($root, $args)
    {
        return Smartwatch_Connectivity::where('id', $root->id_connectivity)->get();
    }
}
