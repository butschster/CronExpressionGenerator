<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Traits;

use Butschster\CronExpression\Parts\Minutes\EveryMinute;
use Butschster\CronExpression\Parts\Minutes\SpecificMinutes;

trait Minutes
{
    public function everyMinute(?int $minute = null): self
    {
        return $this->set(new EveryMinute($minute));
    }

    public function everyEvenMinute(): self
    {
        return $this->everyTwoMinutes();
    }

    public function everyTwoMinutes(): self
    {
        return $this->everyMinute(2);
    }

    public function everyThreeMinutes(): self
    {
        return $this->everyMinute(3);
    }

    public function everyFourMinutes(): self
    {
        return $this->everyMinute(4);
    }

    public function everyFiveMinutes(): self
    {
        return $this->everyMinute(5);
    }

    public function everyTenMinutes(): self
    {
        return $this->everyMinute(10);
    }

    public function everyFifteenMinutes(): self
    {
        return $this->everyMinute(15);
    }

    public function everyThirtyMinutes(): self
    {
        return $this->set(new SpecificMinutes(0, 30));
    }
}
