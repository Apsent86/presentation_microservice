<?php declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\DBAL\Schema\Comparator as BaseComparator;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\TableDiff;

class Comparator extends BaseComparator
{
    /**
     * {@inheritDoc}
     */
    public function diffTable(Table $fromTable, Table $toTable): bool|TableDiff
    {
        // ClickHouse platform requires `eventDateColumn`, but Doctrine configuration hardcoded with other columns.
        // As result, metadata sync command can be executed correctly only at first run.
        // So, we need to skip diff generation for this table.
        if (ClickHouseSchemaManager::SYSTEM_TABLE === $fromTable->getName()
            && ClickHouseSchemaManager::SYSTEM_TABLE === $toTable->getName()
        ) {
            return false;
        }

        return parent::diffTable($fromTable, $toTable);
    }
}
