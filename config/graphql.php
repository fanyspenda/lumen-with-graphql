<?php
return [

    /*
     * The prefix for routes
     */
    'prefix' => 'graphql',

    /*
     * The domain for routes
     */
    'domain' => null,

    /*
     * The routes to make GraphQL request. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Route
     *
     * Example:
     *
     * Same route for both query and mutation
     *
     * 'routes' => [
     *     'query' => 'query/{graphql_schema?}',
     *     'mutation' => 'mutation/{graphql_schema?}',
     *      mutation' => 'graphiql'
     * ]
     *
     * you can also disable routes by setting routes to null
     *
     * 'routes' => null,
     */
    // 'routes' => '{graphql_schema?}',

    /*
     * The controller to use in GraphQL requests. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Controller and method
     *
     * Example:
     *
     * 'controllers' => [
     *     'query' => '\Folklore\GraphQL\GraphQLController@query',
     *     'mutation' => '\Folklore\GraphQL\GraphQLController@mutation'
     * ]
     */
    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    'routes' => [
        'query' => 'query/{graphql_schema?}',
        'mutation' => 'mutation/{graphql_schema?}',
        'mutation' => 'graphiql'
    ],


    /*
     * The name of the input variable that contain variables when you query the
     * endpoint. Most libraries use "variables", you can change it here in case you need it.
     * In previous versions, the default used to be "params"
     */
    'variables_input_name' => 'variables',

    /*
     * Any middleware for the 'graphql' route group
     */
    'middleware' => [],

    /**
     * Any middleware for a specific 'graphql' schema
     */
    'middleware_schema' => [
        'default' => [],
    ],

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => ['Access-Control-Allow-Origin: *'],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     * To disable GraphiQL, set this to null
     */
    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],

    /*
     * The name of the default schema used when no arguments are provided
     * to GraphQL::schema() or when the route is used without the graphql_schema
     * parameter
     */
    'schema' => 'default',

    /*
     * The schemas for query and/or mutation. It expects an array to provide
     * both the 'query' fields and the 'mutation' fields. You can also
     * provide an GraphQL\Type\Schema object directly.
     *
     * Example:
     *
     * 'schemas' => [
     *     'default' => new Schema($config)
     * ]
     *
     * or
     *
     * 'schemas' => [
     *     'default' => [
     *         'query' => [
     *              'users' => 'App\GraphQL\Query\UsersQuery'
     *          ],
     *          'mutation' => [
     *
     *          ]
     *     ]
     * ]
     */
    'schemas' => [
        'default' => [
            'query' => [
                //query ditulis di sini
                // 'PostQuery' => App\GraphQL\Query\PostQuery::class,
                'MonitorQuery' => App\GraphQL\Query\MonitorQuery::class,
                'PcQuery' => App\GraphQL\Query\PcQuery::class,
                'CameraQuery' => App\GraphQL\Query\CameraQuery::class,
                'SmartwatchQuery' => App\GraphQL\Query\SmartwatchQuery::class,
                'TabletQuery' => App\GraphQL\Query\TabletQuery::class,
            ],
            'mutation' => [
                //input monitor
                'IDisplay' => App\GraphQL\Type\Monitor\IDisplay::class,
                'IConnectivity' => App\GraphQL\Type\Monitor\IConnectivity::class,
                'IFeature'=> App\GraphQL\Type\Monitor\IFeature::class,
                'IDimension' => App\GraphQL\Type\Monitor\IDimension::class,
                'IPower' => App\GraphQL\Type\Monitor\IPower::class,
                'IGeneral'=> App\GraphQL\Type\Monitor\IGeneral::class,

                //input PC
                'IComputing_system' => App\GraphQL\Type\PC\IComputing_system::class,
                'IGraphics'=> App\GraphQL\Type\PC\IGraphics::class,
                'IStorage'=> App\GraphQL\Type\PC\IStorage::class,
                'IPorts'=> App\GraphQL\Type\PC\IPorts::class,
                'IMechanical'=> App\GraphQL\Type\PC\IMechanical::class,
                'IMiscellaneous' => App\GraphQL\Type\PC\IMiscellaneous::class,

                //input Smartwatch
                'ISensors' => App\GraphQL\Type\Smartwatch\ISensors::class,
                'IActivity_tracker' => App\GraphQL\Type\Smartwatch\IActivity_tracker::class,
                'SmartwatchIConnectivity' => App\GraphQL\Type\Smartwatch\IConnectivity::class,
                'SmartwatchIDesign' => App\GraphQL\Type\Smartwatch\IDesign::class,
                'SmartwatchIDisplay' => App\GraphQL\Type\Smartwatch\IDisplay::class,
                'SmartwatchIFeatures' => App\GraphQL\Type\Smartwatch\IFeatures::class,
                'SmartwatchINotifications' => App\GraphQL\Type\Smartwatch\INotifications::class,
                // 'PostMutation' => App\GraphQL\Mutation\PostMutation::class

                //input Tablet
                'TabletIDisplay' => App\GraphQL\Type\Tablet\IDisplay::class,
                'TabletICamera' => App\GraphQL\Type\Tablet\ICamera::class,
                'TabletIDesign' => App\GraphQL\Type\Tablet\IDesign::class,
                'TabletIPlatform' => App\GraphQL\Type\Tablet\IPlatform::class,
            ]
        ]
    ],

    /*
     * Additional resolvers which can also be used with shorthand building of the schema
     * using \GraphQL\Utils::BuildSchema feature
     *
     * Example:
     *
     * 'resolvers' => [
     *     'default' => [
     *         'echo' => function ($root, $args, $context) {
     *              return 'Echo: ' . $args['message'];
     *          },
     *     ],
     * ],
     */
    'resolvers' => [
        'default' => [
        ],
    ],

    /*
     * Overrides the default field resolver
     * Useful to setup default loading of eager relationships
     *
     * Example:
     *
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     *     // take a look at the defaultFieldResolver in
     *     // https://github.com/webonyx/graphql-php/blob/master/src/Executor/Executor.php
     * },
     */
    'defaultFieldResolver' => null,

    /*
     * The types available in the application. You can access them from the
     * facade like this: GraphQL::type('user')
     *
     * Example:
     *
     * 'types' => [
     *     'user' => 'App\GraphQL\Type\UserType'
     * ]
     *
     * or without specifying a key (it will use the ->name property of your type)
     *
     * 'types' =>
     *     'App\GraphQL\Type\UserType'
     * ]
     */

     //type ditulis di sini
    'types' => [
        // App\GraphQL\Type\PostType::class,

        //Tablet
        'Tablet' => App\GraphQL\Type\Tablet\Tablet::class,
        'TabletDisplay' => App\GraphQL\Type\Tablet\Display::class,
        'TabletCamera' => App\GraphQL\Type\Tablet\Camera::class,
        'TabletDesign' => App\GraphQL\Type\Tablet\Design::class,
        'TabletPlatform' => App\GraphQL\Type\Tablet\Platform::class,

        //Smartwatch
        'Smartwatch' => App\GraphQL\Type\Smartwatch\Smartwatch::class,
        'Sensors' => App\GraphQL\Type\Smartwatch\Sensors::class,
        'Activity_tracker' => App\GraphQL\Type\Smartwatch\Activity_tracker::class,
        'SmartwatchConnectivity' => App\GraphQL\Type\Smartwatch\Connectivity::class,
        'SmartwatchDesign' => App\GraphQL\Type\Smartwatch\Design::class,
        'SmartwatchDisplay' => App\GraphQL\Type\Smartwatch\Display::class,
        'SmartwatchFeatures' => App\GraphQL\Type\Smartwatch\Features::class,
        'SmartwatchNotifications' => App\GraphQL\Type\Smartwatch\Notifications::class,

        //PC
        'PC' => App\GraphQL\Type\PC\PC::class,
        'Computing_system' => App\GraphQL\Type\PC\Computing_system::class,
        'Graphics'=> App\GraphQL\Type\PC\Graphics::class,
        'Storage'=> App\GraphQL\Type\PC\Storage::class,
        'Ports'=> App\GraphQL\Type\PC\Ports::class,
        'Mechanical'=> App\GraphQL\Type\PC\Mechanical::class,
        'Miscellaneous'=> App\GraphQL\Type\PC\Miscellaneous::class,

        //Monitor
        'Monitor' => App\GraphQL\Type\Monitor\Monitor::class,
        'Display' => App\GraphQL\Type\Monitor\Display::class,
        'Connectivity' => App\GraphQL\Type\Monitor\Connectivity::class,
        'Feature' => App\GraphQL\Type\Monitor\Feature::class,
        'Dimension' => App\GraphQL\Type\Monitor\Dimension::class,
        'Power' => App\GraphQL\Type\Monitor\Power::class,
        'General' => App\GraphQL\Type\Monitor\General::class,

        //camera
        'ICamera' => App\GraphQL\Type\Camera\ICamera::class,
        'IVideo' => App\GraphQL\Type\Camera\IVideo::class
    ],

    /*
     * This callable will receive all the Exception objects that are caught by GraphQL.
     * The method should return an array representing the error.
     *
     * Typically:
     *
     * [
     *     'message' => '',
     *     'locations' => []
     * ]
     */
    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
