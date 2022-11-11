<?php

namespace App\DataProvider;

use App\DataFixtures\ClickHouseEventFixtures;
use App\DTO\ChartDataDto;
use App\DTO\ChartDto;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;

class ClickHouseSqlDataProvider
{
    public function __construct(public readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @param string $property
     *
     * @return array<ChartDataDto>
     */
    public function getData(string $property = 'name'): array
    {
        $qb = $this->manager->createQueryBuilder()->from(Event::class, 'ev');
        $qb
            ->select(sprintf("new %s(COUNT(ev.$property), ev.time)", ChartDataDto::class))
            ->andWhere('ev.companyName = :companyName')
            ->setParameter('companyName', ClickHouseEventFixtures::COMPANIES[0])
            ->orderBy('ev.time')
            ->groupBy('ev.time')
        ;

        return $qb->getQuery()->getArrayResult();
    }

    public function getChartData(string $property = 'name'): ChartDto
    {
        $labels = [];
        $data   = [];

        foreach ($this->getData($property) as $datum) {
            $labels[] = $datum->time;
            $data[]   = $datum->count;
        }

        return new ChartDto($labels, $data);
    }
}
