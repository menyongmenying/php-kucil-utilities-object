<?php

namespace Kucil\Utilities\ObjectUtils\Contracts;

/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
interface ObjectInterface
{
    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data object atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $object Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool         Hasil pemeriksaan apakah nilai $object bertipe data object atau tidak.
     * 
     * @see    ObjectUtilsTest::testIsObject()
     * 
     * 
     * 
     */
    public static function isObject(mixed $object): ?bool;



    /**
     * Meneruskan hasil pemeriksaan apakah nilai objek yang diberikan merupakan objek kosong.
     *
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`. 
     * 
     * @param  ?object $object Nilai object yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool           Hasil pemeriksaan apakah nilai $object merupakan objek kosong.
     * 
     * @see    ObjectUtilsTest::testIsEmpty()
     * 
     * 
     * 
     */
    public static function isEmpty(?object $object): ?bool;



    /**
     * Meneruskan hasil konversi object ke array dari nilai objek yang diberikan.
     *
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`. 
     * 
     * @param  ?object $object Nilai object yang akan dijadikan objek konversi.
     *
     * @return ?array          Hasil konversi object ke array dari nilai $object.
     * 
     * @see    ObjectUtilsTest::testToArr()
     * 
     * 
     * 
     */
    public static function toArr(?object $object): ?array;



    /**
     * Meneruskan hasil konversi object ke array dari nilai objek yang diberikan.
     *
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`. 
     * 
     * @param  ?object $object Nilai object yang akan dijadikan objek konversi.
     *
     * @return ?array          Hasil konversi object ke array dari nilai $object.
     * 
     * @see    ObjectUtilsTest::testToArr()
     * 
     * 
     * 
     */
    public static function toArray(?object $object): ?array;
}
