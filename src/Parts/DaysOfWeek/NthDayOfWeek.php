<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts\DaysOfWeek;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class NthDayOfWeek implements PartValueInterface
{
    public function __construct(private int $dayOfWeek = Generator::MONDAY, private int $nth = 1)
    {
    }

    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(CronExpression::WEEKDAY, $this->dayOfWeek . '#' . $this->nth);
    }
}
