<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Cron\CronExpression;

trait Months
{
    public function daysOfMonth(string | int ...$days): self
    {
        $days = $days ?: [1];

        $expression = clone $this->expression;
        $expression->setPart(CronExpression::DAY, implode(',', $days));

        return self::create($expression);
    }

    public function monthly(int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)
            ->daysOfMonth(1);
    }

    public function monthlyOn(int $dayOfMonth = 1, int $hour = 0, int $minute = 0): self
    {
        return $this
            ->dailyAt($hour, $minute)
            ->daysOfMonth($dayOfMonth);
    }

    public function twiceMonthly(int $first = 1, int $second = 16, int $hour = 0, int $minute = 0): self
    {
        return $this
            ->dailyAt($hour, $minute)
            ->daysOfMonth($first, $second);
    }

    public function lastDayOfMonth(int $hour = 0, int $minute = 0): self
    {
        $lastDay = new \DateTime();

        return $this->dailyAt($hour, $minute)
            ->daysOfMonth((int)$lastDay->format('t'));
    }
}
