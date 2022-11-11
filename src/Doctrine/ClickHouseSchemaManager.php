<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Comparator as BaseComparator;
use Doctrine\DBAL\Schema\Table;
use FOD\DBALClickHouse\ClickHouseSchemaManager as BaseClickHouseSchemaManager;

class ClickHouseSchemaManager extends BaseClickHouseSchemaManager
{
    public const SYSTEM_TABLE = 'doctrine_migration_versions';

    public function createComparator(): BaseComparator
    {
        return new Comparator();
    }

    public function listTables(): array
    {
        return \array_filter(parent::listTables(), static fn(Table $table) => self::SYSTEM_TABLE !== $table->getName());
    }

    /**
     * {@inheritdoc}
     */
    protected function _getPortableTableColumnDefinition($tableColumn): Column
    {
        $column = parent::_getPortableTableColumnDefinition($tableColumn);

        $default = null;
        // to allow default values that can be cast to false, for example => 0
        if ('' !== $tableColumn['default_expression'] && 'default' === \mb_strtolower($tableColumn['default_type'])) {
            $default = $tableColumn['default_expression'];
        }

        if (null !== $default) {
            $column->setDefault($default);
        }

        return $column;
    }
}
