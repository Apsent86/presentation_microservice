<?php declare(strict_types=1);

namespace App\Doctrine\Types;

use App\ValueObjects\DateTime as DateTimeVO;
use DateTime;
use DateTimeInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\DateType as BaseDateType;

class DateType extends BaseDateType
{
    /**
     * {@inheritdoc}
     *
     * @param string|DateTimeInterface|null $value
     *
     * @throws \Exception
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): DateTimeInterface|DateTimeVO|null
    {
        if (null === $value || $value instanceof DateTimeInterface) {
            return $value;
        }

        $val = DateTime::createFromFormat('!'.$platform->getDateFormatString(), $value);

        if (!$val) {
            throw ConversionException::conversionFailedFormat(
                $value,
                $this->getName(),
                $platform->getDateFormatString()
            );
        }

        return new DateTimeVO($val->format('Y-m-d H:i:s'));
    }
}
