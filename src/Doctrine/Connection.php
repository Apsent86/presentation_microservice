<?php

declare(strict_types=1);

namespace App\Doctrine;

use FOD\DBALClickHouse\Connection as BaseConnection;

class Connection extends BaseConnection
{
    /** @phpstan-ignore-next-line */
    public function beginTransaction(): bool
    {
        return false;
        // do nothing to allow fixtures and base flush() execution
    }

    /** @phpstan-ignore-next-line */
    public function commit(): bool
    {
        return true;
        // do nothing to allow fixtures and base flush() execution
    }

    public function rollBack(): bool
    {
        return true;
    }
}
