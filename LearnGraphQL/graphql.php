<?php
require_once __DIR__ . '/vendor/autoload.php';

use GraphQL\Utils\BuildSchema;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;
$contents = file_get_contents('schema.graphql');
$schema = BuildSchema::build($contents);

ini_set("xdebug.overload_var_dump", "off");
try {
    $queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'echo' => [
                'type' => Type::string(),
                'args' => [
                    'message' => ['type' => Type::string()],
                ],
                'resolve' => function ($rootValue, $args) {
                    return $rootValue['prefix'] . $args['message'];
                }
            ],
            'testNiHao'=>[
                'type' => Type::string(),
                'args' => [
                ],
                'resolve' => function ($rootValue, $args) {
                    return "nihaoaaaa";
                }
            ]
        ],
    ]);

    $mutationType = new ObjectType([
        'name' => 'Calc',
        'fields' => [
            'sum' => [
                'type' => Type::int(),
                'args' => [
                    'x' => ['type' => Type::int()],
                    'y' => ['type' => Type::int()],
                ],
                'resolve' => function ($calc, $args) {
                    return $args['x'] + $args['y'];
                },
            ],
        ],
    ]);

    // See docs on schema options:
    // http://webonyx.github.io/graphql-php/type-system/schema/#configuration-options
    /*
    $schema = new Schema([
        'query' => $queryType,
        'mutation' => $mutationType,
    ]);
    */

    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;

    $rootValue = ['prefix' => 'You said: '];
    $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
    $output = $result->toArray();
} catch (\Exception $e) {
    $output = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($output);