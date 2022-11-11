<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'Event', options: ['eventDateColumn' => 'EventDate'])]
class Event extends AbstractEntity
{
    #[Id, ORM\Column(type: 'string', length: 255)]
    public ?string $name;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $companyName;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $platform;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $siteNane;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $adsSet;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $creativeName;

    #[ORM\Column(type: 'date')]
    public ?\DateTimeInterface $time;
}
