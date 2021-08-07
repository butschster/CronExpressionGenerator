<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests;

use Butschster\CronExpression\Generator;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function assertExpression(string $expression, Generator $generator)
    {
        $this->assertSame($expression, $generator->toExpression());
    }
}
