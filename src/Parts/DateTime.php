<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts;

use Butschster\CronExpression\Parts\Days\SpecificDays;
use Butschster\CronExpression\Parts\Hours\SpecificHours;
use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;
use Butschster\CronExpression\Parts\Months\SpecificMonths;
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;
use DateTimeInterface;

class DateTime implements PartValueInterface
{
    public function __construct(private DateTimeInterface $time)
    {
    }

    public function updateExpression(CronExpression $expression): void
    {
        $parts = [
            new SpecificMinutes((int)$this->time->format('i')),
            new SpecificHours((int)$this->time->format('G')),
            new SpecificDays((int)$this->time->format('j')),
            new SpecificMonths((int)$this->time->format('n')),
        ];

        foreach ($parts as $part) {
            $part->updateExpression($expression);
        }
    }
}
