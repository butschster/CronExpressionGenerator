<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\DaysOfWeek;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class LastDayOwWeek implements PartValueInterface
{
    public function __construct(private int $dayOfWeek = Generator::MONDAY)
    {
    }

    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::WEEKDAY, $this->dayOfWeek . 'L');
    }
}
