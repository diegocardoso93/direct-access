<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Doctrine\Annotation as API;
use App\Model\AbstractModel;
use App\Model\User;

/**
 * @ORM\Entity
 */
class ObjectTypeArgument extends AbstractModel
{
    /**
     * This is an incorrect annotation, it should be entirely deleted to let the
     * system auto-create an input type matching the entity
     *
     * @API\Field(args={@API\Argument(name="user", type="App\Model\User")})
     *
     * @param User $user
     *
     * @return string
     */
    public function getWithParams(User $user): string
    {
        return __FUNCTION__;
    }
}
