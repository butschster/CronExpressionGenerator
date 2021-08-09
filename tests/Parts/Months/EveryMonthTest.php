<?php

declare(strict_types=1);

namespace Butschster\CronExpression\Tests\Parts\Months;

use Butschster\CronExpression\Parts\Months\EveryMonth;
use Butschster\CronExpression\Tests\TestCase;

class EveryMonthTest extends TestCase
{
    public function testUpdatesExpression()
    {
        $this->assertExpressionPart('* * * */3 *', new EveryMonth(3));
    }

    public function testUpdatesExpressionWithoutArgs()
    {
        $this->assertExpressionPart('* * * * *', new EveryMonth());
    }
}
