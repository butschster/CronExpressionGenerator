<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\Days\SpecificDays;
use Butschster\CronExpression\Parts\DaysOfWeek\LastDayOfWeek;
use Butschster\CronExpression\Parts\DaysOfWeek\NthDayOfWeek;

trait Months
{
    public function daysOfMonth(int ...$days): self
    {
        return $this->set(new SpecificDays(...$days));
    }

    public function monthly(int $hour = 0, int $minute = 0): self
    {
        return $this->monthlyOn(1, $hour, $minute);
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

    public function lastDayOfWeekEveryMonth(int $dayOfWeek = self::MONDAY, int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)->set(new LastDayOfWeek($dayOfWeek));
    }

    public function nthDayOfWeekEveryMonth(int $dayOfWeek = self::MONDAY, int $nth = 1, int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)->set(new NthDayOfWeek($dayOfWeek, $nth));
    }
}
