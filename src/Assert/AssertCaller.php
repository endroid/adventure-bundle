<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Assert;

use Endroid\AdventureBundle\Exception\InvalidCallerException;

class AssertCaller
{
    public static function assert(string $function, string $class): void
    {
        $backtrace = debug_backtrace();

        foreach ($backtrace as $step) {
            if ($step['function'] === $function) {
                $reflectionClass = new \ReflectionClass($step['class']);
                if ($reflectionClass->implementsInterface($class)) {
                    return;
                }
            }
        }

        throw InvalidCallerException::create($function, $class);
    }
}
