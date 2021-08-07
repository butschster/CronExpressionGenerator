<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Parts;

use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

abstract class Specific implements PartValueInterface
{
    /** @var array<int> */
    private array $values;

    public function __construct(int ...$values)
    {
        $this->values = $values;
    }

    abstract public function index(): int;

    public function updateExpression(CronExpression $expression): void
    {
        $expression->setPart(
            $this->index(),
            implode(',', $this->values)
        );
    }
}
