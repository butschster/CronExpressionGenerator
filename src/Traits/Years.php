<?php
declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Cron\CronExpression;

trait Years
{
    public function months(string|int ...$months): self
    {
        $months = $months ?: [self::JAN];

        $expression = clone $this->expression;
        $expression->setPart(CronExpression::MONTH, implode(',', $months));

        return self::create($expression);
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
