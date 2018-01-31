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
class ArrayOfEntity extends AbstractModel
{
    /**
     * @API\Field(type="App\Model\User[]")
     */
    public function getUsers(): array
    {
        return [new User(), new User()];
    }
}
