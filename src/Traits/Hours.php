<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

trait Hours
{
    public function hourly(): self
    {
        return $this->minutes(0);
    }

    public function hourlyAt(int ...$minute): self
    {
        return $this->minutes(...$minute);
    }

    public function everyTwoHours(): self
    {
        return $this->minutes(0)
            ->hours('*/2');
    }

    public function everyThreeHours(): self
    {
        return $this->minutes(0)
            ->hours('*/3');
    }

    public function everyFourHours(): self
    {
        return $this->minutes(0)
            ->hours('*/4');
    }

    public function everySixHours(): self
    {
        return $this->minutes(0)
            ->hours('*/6');
    }

    public function hours(string | int ...$hours): self
    {
        return self::create(
            $this->expression->hours(...$hours)
        );
    }
}
