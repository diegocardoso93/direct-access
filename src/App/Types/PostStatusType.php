<?php

declare(strict_types=1);

namespace App\Types;

use GraphQL\Type\Definition\EnumType;
use App\Model\Post;

class PostStatusType extends EnumType
{
    public function __construct()
    {
        $config = [
            'values' => [
                Post::STATUS_PRIVATE,
                Post::STATUS_PUBLIC,
            ],
        ];

        parent::__construct($config);
    }
}
