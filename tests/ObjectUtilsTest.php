<?php

use Kucil\Utilities\ObjectUtils;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * @version 0.1.2
 */
class ObjectUtilsTest extends TestCase
{
    #[Test]
    public function testIsObject(): void
    {
        // Test 1: Tipe Object
        $this->assertTrue(ObjectUtils::isObject(new \stdClass()), 'test-1: stdClass');
        
        $objAnonymous = new class {};
        $this->assertTrue(ObjectUtils::isObject($objAnonymous), 'test-2: Anonymous class');
        
        // Test 2: Tipe Non-Object
        $this->assertFalse(ObjectUtils::isObject(null), 'test-3: Input NULL');
        $this->assertFalse(ObjectUtils::isObject('string'), 'test-4: Input string');
        $this->assertFalse(ObjectUtils::isObject(123), 'test-5: Input integer');
        $this->assertFalse(ObjectUtils::isObject(12.34), 'test-6: Input float');
        $this->assertFalse(ObjectUtils::isObject(true), 'test-7: Input boolean true');
        $this->assertFalse(ObjectUtils::isObject(false), 'test-8: Input boolean false');
        $this->assertFalse(ObjectUtils::isObject([]), 'test-9: Input array kosong');
        $this->assertFalse(ObjectUtils::isObject(['a' => 1]), 'test-10: Input array asosiatif');

        return;
    }

    #[Test]
    public function testIsEmpty(): void
    {
        // Test 1: Objek stdClass kosong
        $this->assertTrue(ObjectUtils::isEmpty(new \stdClass()), 'test-1: stdClass kosong');

        // Test 2: Objek stdClass berisi
        $objFull = new \stdClass();
        $objFull->nama = 'Budi';
        $this->assertFalse(ObjectUtils::isEmpty($objFull), 'test-2: stdClass berisi');

        // Test 3: Input NULL
        $this->assertNull(ObjectUtils::isEmpty(null), 'test-3: Input NULL');

        // Test 4: Objek dari kelas anonim kosong
        $objAnonymousEmpty = new class {};
        $this->assertTrue(ObjectUtils::isEmpty($objAnonymousEmpty), 'test-4: Kelas anonim kosong');

        // Test 5: Objek dari kelas anonim berisi properti publik
        $objAnonymousFull = new class {
            public $a = 1;
        };
        $this->assertFalse(ObjectUtils::isEmpty($objAnonymousFull), 'test-5: Kelas anonim berisi properti publik');
        
        // Test 6: Objek dengan properti private (dianggap kosong oleh get_object_vars)
        $objPrivate = new class {
            private $b = 2;
        };
        $this->assertTrue(ObjectUtils::isEmpty($objPrivate), 'test-6: Kelas dengan properti private');

        return;
    }

    #[Test]
    public function testToArr(): void
    {
        // Test 1: Input NULL
        $this->assertNull(ObjectUtils::toArr(null), 'test-1: Input NULL');

        // Test 2: Objek stdClass kosong
        $this->assertSame([], ObjectUtils::toArr(new \stdClass()), 'test-2: stdClass kosong');

        // Test 3: Objek stdClass berisi
        $objFull = new \stdClass();
        $objFull->nama = 'Budi';
        $objFull->usia = 25;
        $expected = ['nama' => 'Budi', 'usia' => 25];
        $this->assertSame($expected, ObjectUtils::toArr($objFull), 'test-3: stdClass berisi');

        // Test 4: Objek dengan properti private/protected (tidak akan terambil oleh get_object_vars)
        $objPrivate = new class {
            public $a = 'public';
            protected $b = 'protected';
            private $c = 'private';
        };
        $expectedPrivate = ['a' => 'public'];
        $this->assertSame($expectedPrivate, ObjectUtils::toArr($objPrivate), 'test-4: Hanya properti public yang terambil');

        // Tes untuk input non-object (string, int) dihapus
        // karena signature metode sekarang ?object

        return;
    }

    #[Test]
    public function testToArray(): void
    {
        // Test 1: Input NULL
        $this->assertNull(ObjectUtils::toArray(null), 'test-1: Input NULL');

        // Test 2: Objek stdClass berisi
        $objFull = new \stdClass();
        $objFull->nama = 'Budi';
        $objFull->usia = 25;
        $expected = ['nama' => 'Budi', 'usia' => 25];
        $this->assertSame($expected, ObjectUtils::toArray($objFull), 'test-2: stdClass berisi');

        // Test 3: Memastikan toArray memanggil toArr
        $this->assertSame(ObjectUtils::toArr($objFull), ObjectUtils::toArray($objFull), 'test-3: Memastikan alias identik');
        
        return;
    }
}

