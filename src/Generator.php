<?php

declare(strict_types=1);

namespace Butschster\CronExpression;

use Butschster\CronExpression\Traits\Days;
use Butschster\CronExpression\Traits\Hours;
use Butschster\CronExpression\Traits\Minutes;
use Butschster\CronExpression\Traits\Months;
use Butschster\CronExpression\Traits\Weeks;
use Butschster\CronExpression\Traits\Years;
use Cron\CronExpression;
use DateTimeInterface;

class Generator
{
    use Minutes;
    use Hours;
    use Days;
    use Weeks;
    use Months;
    use Years;

    public const SUNDAY = 0;
    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;

    public const JAN = 1;
    public const FEB = 2;
    public const MAR = 3;
    public const APR = 4;
    public const MAY = 5;
    public const JUN = 6;
    public const JUL = 7;
    public const AUG = 8;
    public const SEP = 9;
    public const OCT = 10;
    public const NOV = 11;
    public const DEC = 12;

    private const DEFAULT = '* * * * *';

    private Expression $expression;

    public static function create(?Expression $expression = null): self
    {
        return new self($expression);
    }

    public function __construct(?Expression $expression = null)
    {
        $this->expression = $expression ?? new Expression(self::DEFAULT);
    }

    public function cron(string $expression): self
    {
        return self::create(new Expression($expression));
    }

    public function on(DateTimeInterface $time): self
    {
        return $this
            ->minutes((int) $time->format('i'))
            ->hours($time->format('G'))
            ->daysOfMonth($time->format('j'))
            ->months($time->format('n'));
    }

    public function __toString(): string
    {
        return (string) $this->toExpression();
    }

    public function toExpression(): string
    {
        return $this->getExpression()->getExpression();
    }

    public function setExpresion(Expression $expression): self
    {
        $this->expression = $expression;
        return $this;
    }

    public function getExpression(): CronExpression
    {
        return $this->expression;
    }
}
