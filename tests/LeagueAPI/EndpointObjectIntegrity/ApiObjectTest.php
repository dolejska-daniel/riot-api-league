<?php

/**
 * Copyright (C) 2016-2023  Daniel Dolejška
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

use RiotAPI\Base\Exceptions\GeneralException;
use RiotAPI\LeagueAPI\Objects;
use RiotAPI\Tests\RiotAPITestCase;

class SpecialClass extends Objects\ApiObject
{
    public int $a;

    public string $b;

    public ?SpecialClass $c;
}

class ApiObjectTest extends RiotAPITestCase
{
    public function testGetIterablePropertyName()
    {
        $propName = Objects\ApiObject::getIterablePropertyName('/** @iterable $property */');
        $this->assertSame('property', $propName);
    }

    public function testGetIterablePropertyName_False()
    {
        $propName = Objects\ApiObject::getIterablePropertyName('/** @no-iterable-here */');
        $this->assertNull($propName);
    }

    /** @var SpecialClass $customDataType */
    public SpecialClass $customDataType;

    public function testGetPropertyDataType()
    {
        $property = new ReflectionProperty($this, "customDataType");
        $dataType = Objects\ApiObject::getPropertyDataType($property);
        $this->assertEquals('SpecialClass', $dataType->class);
        $this->assertFalse($dataType->isArray);
    }

    public SpecialClass $customDataTypeWithoutComment;

    public function testGetPropertyDataType_WithoutComment()
    {
        $property = new ReflectionProperty($this, "customDataTypeWithoutComment");
        $dataType = Objects\ApiObject::getPropertyDataType($property);
        $this->assertEquals('SpecialClass', $dataType->class);
        $this->assertFalse($dataType->isArray);
    }

    /** @var SpecialClass[] $customDataTypeArray */
    public array $customDataTypeArray;

    public function testGetPropertyDataType_Array()
    {
        $property = new ReflectionProperty($this, "customDataTypeArray");
        $dataType = Objects\ApiObject::getPropertyDataType($property);
        $this->assertEquals('SpecialClass', $dataType->class);
        $this->assertTrue($dataType->isArray);
    }

    /** @var int $simpleDataType */
    public int $simpleDataType;

    public function testGetPropertyDataType_False()
    {
        $property = new ReflectionProperty($this, "simpleDataType");
        $dataType = Objects\ApiObject::getPropertyDataType($property);
        $this->assertNull($dataType);
    }

    public function testGetData()
    {
        $array = [
            "a" => 1,
            "b" => "hello",
            "c" => null,
        ];
        $obj = new SpecialClass($array, null);
        $this->assertSame($array, $obj->getData());
        $this->assertEquals($obj->a, $array["a"]);
        $this->assertEquals($obj->b, $array["b"]);
        $this->assertEquals($obj->c, $array["c"]);
    }

    public function testGetData_MissingProperty()
    {
        $this->expectException(GeneralException::class);
        $this->expectExceptionMessage("Failed processing property x of SpecialClass");

        $array = [
            "x" => 1,
        ];
        new SpecialClass($array, null);
    }

}
