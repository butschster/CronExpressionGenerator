<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\Months\Quarterly;
use Butschster\CronExpression\Parts\Months\SpecificMonths;

trait Years
{
    public function months(int ...$months): self
    {
        $months = $months ?: [self::JAN];

        return $this->set(new SpecificMonths(...$months));
    }

    public function quarterly(): self
    {
        return $this->monthly()->set(new Quarterly());
    }

    public function yearly(int ...$months): self
    {
        return $this->monthly()->months(...$months);
    }

    public function yearlyOn(int $month = self::JAN, int $dayOfMonth = 1, int $hour = 0, int $minute = 0): self
    {
        return $this->dailyAt($hour, $minute)
            ->daysOfMonth($dayOfMonth)
            ->months($month);
    }
}
