<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\Hours\EveryHour;
use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;

trait Hours
{
    public function hourly(): self
    {
        return $this->set(new SpecificMinutes(0));
    }

    public function hourlyAt(int ...$minute): self
    {
        return $this->set(new SpecificMinutes(...$minute));
    }

    public function everyHours(?int $hour = null): self
    {
        return $this->hourly()->set(new EveryHour($hour));
    }

    public function everyTwoHours(): self
    {
        return $this->everyHours(2);
    }

    public function everyThreeHours(): self
    {
        return $this->everyHours(3);
    }

    public function everyFourHours(): self
    {
        return $this->everyHours(4);
    }

    public function everySixHours(): self
    {
        return $this->everyHours(6);
    }
}
