<?php

namespace App\GraphQL\Types;

use App\Models\Project;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Project',
        'description' => 'A Project Type',
        'model' => Project::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The Project Id'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Project Title'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Project Description'
            ],
            /*'manager' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The project Manager'
            ],
            'tasks' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The project Tasks'
            ],*/
        ];
    }
}
