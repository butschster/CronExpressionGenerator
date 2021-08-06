<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

trait Days
{
    public function daily(int ...$hours): self
    {
        $hours = $hours ? implode(',', $hours) : 0;

        return $this->minutes(0)
            ->hours($hours);
    }

    public function dailyAt(int $hour, int $minute = 0): self
    {
        return $this->minutes($minute)
            ->hours($hour);
    }

    public function twiceDaily($first = 1, $second = 13): self
    {
        return $this->daily($first, $second);
    }

    public function twiceDailyAt($first = 1, $second = 13, $minute = 0): self
    {
        return $this->daily($first, $second)
            ->minutes($minute);
    }
}
