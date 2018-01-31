<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Doctrine\Annotation as API;

/**
 * Base class for all objects stored in database.
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractModel
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned" = true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @API\Field(type="App\Types\DateTimeType")
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @API\Input(type="App\Types\DateTimeType")
     */
    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }
}
