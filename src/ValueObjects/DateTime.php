<?php

declare(strict_types=1);

namespace App\ValueObjects;

class DateTime extends \DateTime
{
    public function __toString(): string
    {
        // To allow store compound Doctrine Entity ID with DateTime field
        return $this->format('Ymd');
    }
}
