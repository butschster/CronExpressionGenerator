<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Months;

use Butschster\CronExpression\Parts\Months\SpecificMonths;
use Butschster\CronExpression\Tests\TestCase;

class SpecificMonthsTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * 2,4,6,8,10,12 *', new SpecificMonths(2, 4, 6, 8, 10, 12));
    }
}
