<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 23.00
 */

namespace AppBundle\Service;


use AppBundle\Entity\Post;

class PostService
{
    private static $ARR;

    /**
     * PostService constructor.
     */
    public function __construct()
    {
        self::$ARR = [
            new Post("Dm3YxfKq0a"),
            new Post("BouM3OyIqb"),
            new Post("6316n635zn"),
            new Post("uBVSia80xf"),
            new Post("f9f7hj7VSk"),
            new Post("1JnSoeijDs"),
            new Post("tC0tekSIHw"),
            new Post("4pkeXE1kuT"),
            new Post("Dc9Mwe6U2b"),
            new Post("lbWl00Fn6P"),
            new Post("zVMo4psgWI","Ololo"),
            new Post("0LCfBi4w84", "Trololo"),
            new Post("2MWo23BzgK", "Alalala"),
            new Post("n4sDCTlzav"),
            new Post("m5tFvm6qXr"),
            new Post("BBMiDh2Ezo"),
            new Post("XxkGHfaZxr"),
            new Post("kcNzqjRdy8"),
            new Post("q5hHSUyxsH"),
            new Post("Wywsmh0SFO"),
            new Post("A3sOlErUgk"),
            new Post("ej8ROw6Oht"),
            new Post("N8THdoBPnu"),
            new Post("AkYHsKvUvl"),
            new Post("CMObENjM3F"),
            new Post("RLMCd8z350"),
            new Post("ZXGIppRhNd"),
            new Post("ZXZuDNLe6Y"),
            new Post("oMqrY2fpkT"),
            new Post("paruvhqhvO"),
            new Post("S1FuSMpr9s"),
            new Post("7EqxYYto3T"),
            new Post("eaJkam6qrI"),
            new Post("uH1kOmZ1mU"),
            new Post("fcAOvc9Ril"),
            new Post("GeIy7WfZ8M"),
            new Post("XXhB0YupPU"),
            new Post("XJlI8ZyYHy"),
            new Post("s7vUQBSOuT"),
            new Post("jpJxvs7b5W"),
            new Post("HlhiThT9eD"),
            new Post("C2Vs3dcM92"),
            new Post("r0FxdkcWeG"),
            new Post("Fg3sWGrFq1"),
            new Post("HomyOh8vAw"),
            new Post("htJalzWpBy"),
            new Post("iLtW3xmqbe"),
            new Post("29dglHzIvJ"),
            new Post("SKV0a1THDG"),
            new Post("mxYx1RhOUI"),
            new Post("VPzFRZzV3D"),
            new Post("6Mn3ieWLKe"),
            new Post("YbsJEWyAI2"),
            new Post("t5scWtoxGd"),
            new Post("RW7obYtwNF"),
            new Post("zAoRuCtcBZ"),
            new Post("McCWR1tOih"),
            new Post("QQlBYvxCOy"),
            new Post("3pqeRVDref"),
            new Post("x4rRdYmYjs"),
            new Post("d1a4KSKcHZ"),
            new Post("yP7CxaPWgt"),
            new Post("alO0hbD7R7")
        ];
    }


    public function findAll()
    {
        return self::$ARR;
    }

    public function findOneById($id)
    {
        return self::$ARR[$id];
    }

    public function findOneBySlug($slug)
    {
        return self::$ARR[$slug];
    }

}