<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Formation;

class UnitTest extends TestCase
{
    public function testSomething(): void
    {
        $formation = new Formation();
        $formation->setTitle('hello');
        $this->assertTrue($formation->getTitle() === 'hello');
    }
}
