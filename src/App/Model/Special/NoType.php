<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use App\Model\AbstractModel;

/**
 * @ORM\Entity
 */
class NoType extends AbstractModel
{
    public function getWithoutTypeHint()
    {
        return __FUNCTION__;
    }
}
