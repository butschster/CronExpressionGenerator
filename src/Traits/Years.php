<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

trait Years
{
    public function months(string | int ...$months): self
    {
        return self::create(
            $this->expression->months(...$months)
        );
    }

    public function quarterly(): self
    {
        return $this->monthly()
            ->months('1-12/3');
    }

    public function yearly(int ...$months): self
    {
        return $this->monthly()
            ->months(...$months);
    }

    public function yearlyOn(int $month = self::JAN, int $dayOfMonth = 1, int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)
            ->daysOfMonth($dayOfMonth)
            ->months($month);
    }
}
