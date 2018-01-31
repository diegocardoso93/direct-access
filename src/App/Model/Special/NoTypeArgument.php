<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use App\Model\AbstractModel;

/**
 * @ORM\Entity
 */
class NoTypeArgument extends AbstractModel
{
    public function getFoo($bar): string
    {
        return __FUNCTION__;
    }
}
