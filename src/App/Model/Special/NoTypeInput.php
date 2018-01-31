<?php

declare(strict_types=1);

namespace App\Model\Special;

use Doctrine\ORM\Mapping as ORM;
use App\Model\AbstractModel;

/**
 * @ORM\Entity
 */
class NoTypeInput extends AbstractModel
{
    public function setFoo($bar): void
    {
    }
}
