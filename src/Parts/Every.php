<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

abstract class Every implements PartValueInterface
{
    public function __construct(private ?int $interval = null)
    {
    }

    abstract public function index(): int;

    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(
            $this->index(),
            $this->interval ? '*/' . $this->interval : '*'
        );
    }
}
