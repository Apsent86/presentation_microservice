<?php

declare(strict_types=1);

namespace App\Doctrine;

use FOD\DBALClickHouse\ClickHousePlatform as BaseClickHousePlatform;

class ClickHousePlatform extends BaseClickHousePlatform
{
    /**
     * {@inheritDoc}
     */
    public function appendLockHint($fromClause, $lockMode): string
    {
        return $fromClause;
    }

    /**
     * {@inheritDoc}
     */
    public function getTruncateTableSQL($tableName, $cascade = false): string
    {
        return 'TRUNCATE TABLE '.$tableName;
    }

    /**
     * {@inheritDoc}
     */
    public function quoteStringLiteral($str): string
    {
        $c = $this->getStringLiteralQuoteCharacter();

        return \is_numeric($str) ? (string) $str : $c.\addslashes($str).$c;
    }
}
