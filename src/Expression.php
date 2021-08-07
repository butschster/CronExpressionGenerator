<?php

declare(strict_types=1);

namespace Butschster\CronExpression;

use Cron\CronExpression;

class Expression extends CronExpression
{
    public function hours(string | int ...$hours): self
    {
        $expression = clone $this;
        $expression->setPart(self::HOUR, implode(',', $hours));

        return $expression;
    }

    public function minutes(string | int ...$minutes): self
    {
        $expression = clone $this;
        $expression->setPart(self::MINUTE, implode(',', $minutes));

        return $expression;
    }

    public function daysOfWeek(string | int...$dayOfWeek): self
    {
        $dayOfWeek = $dayOfWeek ?: [Generator::MONDAY];

        $expression = clone $this;
        $expression->setPart(CronExpression::WEEKDAY, implode(',', $dayOfWeek));

        return $expression;
    }

    public function daysOfMonth(string | int ...$days): self
    {
        $days = $days ?: [1];

        $expression = clone $this;
        $expression->setPart(CronExpression::DAY, implode(',', $days));

        return $expression;
    }

    public function months(string | int ...$months): self
    {
        $months = $months ?: [Generator::JAN];

        $expression = clone $this;
        $expression->setPart(CronExpression::MONTH, implode(',', $months));

        return $expression;
    }
}
