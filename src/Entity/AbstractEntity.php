<?php

declare(strict_types=1);

namespace App\Entity;

use App\ValueObjects\DateTime;
use Doctrine\ORM\Mapping\Column;

abstract class AbstractEntity
{
    #[Column(name: 'EventDate', type: 'date', options: ['default' => 'today()'])]
    public DateTime $eventDate;
}
