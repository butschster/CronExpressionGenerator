<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests;

use Butschster\CronExpression\Generator;
use Butschster\CronExpression\PartValueInterface;
use Cron\CronExpression;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function assertExpression(string $expression, Generator $generator)
    {
        $this->assertSame($expression, $generator->toExpression());
    }

    public function assertExpressionPart(string $expression, PartValueInterface $part)
    {
        $part->updateExpression($expr = $this->makeExpression());

        $this->assertSame($expression, (string) $expr);
    }

    public function makeExpression(string $expression = '* * * * *'): CronExpression
    {
        return new CronExpression($expression);
    }
}
