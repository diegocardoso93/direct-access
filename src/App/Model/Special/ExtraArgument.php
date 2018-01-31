<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Doctrine\Annotation as API;
use App\Model\AbstractModel;

/**
 * @ORM\Entity
 */
class ExtraArgument extends AbstractModel
{
    /**
     * @API\Field(args={@API\Argument(name="misspelled_name")})
     *
     * @param string $arg1
     *
     * @return string
     */
    public function getWithParams(string $arg1): string
    {
        return __FUNCTION__;
    }
}
