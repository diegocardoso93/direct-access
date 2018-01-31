<?php

declare(strict_types=1);

namespace App;

use App\Types\DateTimeType;
use App\Model\User;
use App\Model\Post;
use GraphQL\Executor\ExecutionResult;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Doctrine\DefaultFieldResolver;
use GraphQL\Doctrine\Types;
use GraphQL\GraphQL;

class Api
{
    private $entityManager;
    private $types;
    private $schema;
    private $query;
    private $variables;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        // Define custom types mapping
        $mapping = [
            \DateTime::class => DateTimeType::class,
        ];

        // Configure the type registry
        $this->types = new Types($entityManager, $mapping);

        // Configure default field resolver to be able to use getters
        GraphQL::setDefaultFieldResolver(new DefaultFieldResolver());
    }

    private function buildSchema(): void
    {
        $this->schema = new Schema([
            'query' => new ObjectType([
                'name' => 'query',
                'fields' => [
                    'allUsers' => [
                        'type' => Type::listOf($this->types->get(User::class)), // Use automated ObjectType for output
                        'resolve' => function ($root, $args) {
                            return $this->entityManager->getRepository(User::class)->findAll();
                        }
                    ],
                    'users' => [
                        'type' => Type::listOf($this->types->get(User::class)),
                        'args' => [
                            'id' => Type::int(),
                            'email' => Type::string()
                        ],
                        'resolve' => function ($root, $args) {
                            return $this->entityManager->getRepository(User::class)->findBy($args);
                        }
                    ],
                ],
            ]),
            'mutation' => new ObjectType([
                'name' => 'mutation',
                'fields' => [
                    'createPost' => [
                        'type' => Type::nonNull($this->types->get(Post::class)),
                        'args' => [
                            'input' => Type::nonNull($this->types->getInput(Post::class)), // Use automated InputObjectType for input
                        ],
                        'resolve' => function ($root, $args) {
                            // create new post and flush...
                        }
                    ],
                    'updatePost' => [
                        'type' => Type::nonNull($this->types->get(Post::class)),
                        'args' => [
                            'id' => Type::nonNull(Type::id()), // Use standard API when needed
                            'input' => $this->types->getInput(Post::class),
                        ],
                        'resolve' => function ($root, $args) {
                            // update existing post and flush...
                        }
                    ],
                ],
            ]),
        ]);
    }

    public function prepare(): void
    {
        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        $this->query = $input['query'];
        $this->variables = isset($input['variables']) ? $input['variables'] : null;
        $this->buildSchema();
    }

    public function execute(): ExecutionResult
    {
        return GraphQL::executeQuery($this->schema, $this->query, null, null, $this->variables);
    }

    public function output(): void
    {
        $output = $this->execute()->toArray();

        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($output);
    }

    public function fetch(): void
    {
        $this->prepare();
        $this->execute();
        $this->output();
    }

}