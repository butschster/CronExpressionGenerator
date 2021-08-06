<?php
declare(strict_types=1);

namespace Butschster\CronExpression;

class Expression
{
    public function __construct(private string $expression = '* * * * *')
    {
    }

    public function __toString(): string
    {
        return $this->expression;
    }
}
