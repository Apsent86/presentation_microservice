<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\DBAL\Connection;
use FOD\DBALClickHouse\ClickHousePlatform as BaseClickHousePlatform;
use FOD\DBALClickHouse\Driver;

class ClickHouseDriver extends Driver
{
    /**
     * {@inheritDoc}
     */
    public function getSchemaManager(Connection $conn): ClickHouseSchemaManager
    {
        return new ClickHouseSchemaManager($conn);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatabasePlatform(): BaseClickHousePlatform
    {
        return new ClickHousePlatform();
    }
}
