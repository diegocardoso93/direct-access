<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use App\Model\AbstractModel;

/**
 * @ORM\Entity
 */
class ArrayArgument extends AbstractModel
{
    /**
     * @param array $arg1
     *
     * @return string
     */
    public function getWithParams(array $arg1): string
    {
        return __FUNCTION__;
    }
}
