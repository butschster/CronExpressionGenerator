<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\DaysOfWeek\BetweenDayOfWeek;
use Butschster\CronExpression\Parts\DaysOfWeek\SpecificDaysOfWeek;

trait Weeks
{
    public function daysOfWeek(int...$dayOfWeek): self
    {
        return $this->set(new SpecificDaysOfWeek(...$dayOfWeek));
    }

    public function weekly(int ...$dayOfWeek): self
    {
        $dayOfWeek = $dayOfWeek ?: [0];

        return $this->daily()->daysOfWeek(...$dayOfWeek);
    }

    public function weekdays(): self
    {
        return $this->set(new BetweenDayOfWeek(self::MONDAY, self::FRIDAY));
    }

    public function weekends(): self
    {
        return $this->daysOfWeek(self::SATURDAY, self::SUNDAY);
    }

    public function mondays(): self
    {
        return $this->daysOfWeek(self::MONDAY);
    }

    public function tuesdays(): self
    {
        return $this->daysOfWeek(self::TUESDAY);
    }

    public function wednesdays(): self
    {
        return $this->daysOfWeek(self::WEDNESDAY);
    }

    public function thursdays(): self
    {
        return $this->daysOfWeek(self::THURSDAY);
    }

    public function fridays(): self
    {
        return $this->daysOfWeek(self::FRIDAY);
    }

    public function saturdays(): self
    {
        return $this->daysOfWeek(self::SATURDAY);
    }

    public function sundays(): self
    {
        return $this->daysOfWeek(self::SUNDAY);
    }

    public function weeklyOn(int $dayOfWeek, int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)
            ->daysOfWeek($dayOfWeek);
    }

    public function weeklyOnMonday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::MONDAY, $hour, $minute);
    }

    public function weeklyOnTuesday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::TUESDAY, $hour, $minute);
    }

    public function weeklyOnWednesday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::WEDNESDAY, $hour, $minute);
    }

    public function weeklyOnThursday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::THURSDAY, $hour, $minute);
    }

    public function weeklyOnFriday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::FRIDAY, $hour, $minute);
    }

    public function weeklyOnSaturday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::SATURDAY, $hour, $minute);
    }

    public function weeklyOnSunday(int $hour = 0, int $minute = 0): self
    {
        return $this->weeklyOn(self::SUNDAY, $hour, $minute);
    }
}
