<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

trait Minutes
{
    public function everyMinute(): self
    {
        return $this->minutes('*');
    }

    public function everyEvenMinute(): self
    {
        return $this->everyTwoMinutes();
    }

    public function everyTwoMinutes(): self
    {
        return $this->minutes('*/2');
    }

    public function everyThreeMinutes(): self
    {
        return $this->minutes('*/3');
    }

    public function everyFourMinutes(): self
    {
        return $this->minutes('*/4');
    }

    public function everyFiveMinutes(): self
    {
        return $this->minutes('*/5');
    }

    public function everyTenMinutes(): self
    {
        return $this->minutes('*/10');
    }

    public function everyFifteenMinutes(): self
    {
        return $this->minutes('*/15');
    }

    public function everyThirtyMinutes(): self
    {
        return $this->minutes(0, 30);
    }

    public function minutes(string | int ...$minutes): self
    {
        return self::create(
            $this->expression->minutes(...$minutes)
        );
    }
}
