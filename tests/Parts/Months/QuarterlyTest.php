<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Months;

use Butschster\CronExpression\Parts\Months\Quarterly;
use Butschster\CronExpression\Tests\TestCase;

class QuarterlyTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * 1-12/3 *', new Quarterly());
    }
}
