<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Months;

use Butschster\CronExpression\Parts\Months\BetweenMonths;
use Butschster\CronExpression\Tests\TestCase;

class BetweenMonthsTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * 6-12 *', new BetweenMonths(6, 12));
    }
}
