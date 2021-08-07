<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;
use Webmozart\Assert\Assert;

abstract class Between implements PartValueInterface
{
    public function __construct(private int $min, private int $max)
    {
    }

    abstract public function index(): int;

    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(
            $this->index(),
            $this->min . '-' . $this->max
        );
    }
}
