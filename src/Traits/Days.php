<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\Days\LastDayOfMonth;
use Butschster\CronExpression\Parts\Days\LastWeekday;
use Butschster\CronExpression\Parts\Hours\SpecificHours;
use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;

trait Days
{
    public function daily(int ...$hours): self
    {
        $hours = $hours ?: [0];

        return $this->hourly()->set(new SpecificHours(...$hours));
    }

    public function dailyAt(int $hour, int $minute = 0): self
    {
        return $this->set(
            new SpecificMinutes($minute),
            new SpecificHours($hour)
        );
    }

    public function twiceDaily($first = 1, $second = 13): self
    {
        return $this->daily($first, $second);
    }

    public function twiceDailyAt($first = 1, $second = 13, $minute = 0): self
    {
        return $this->daily($first, $second)->set(new SpecificMinutes($minute));
    }

    public function lastDayOfMonth(int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)->set(new LastDayOfMonth());
    }

    public function lastWeekdayOfMonth(int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)
            ->set(new LastWeekday());
    }
}
