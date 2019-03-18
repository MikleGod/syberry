<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 23.00
 */

namespace AppBundle\Service;


class PostService
{
    private const ARR = [
        "Dm3YxfKq0a",
        "BouM3OyIqb",
        "6316n635zn",
        "uBVSia80xf",
        "f9f7hj7VSk",
        "1JnSoeijDs",
        "tC0tekSIHw",
        "4pkeXE1kuT",
        "Dc9Mwe6U2b",
        "lbWl00Fn6P",
        "zVMo4psgWI",
        "0LCfBi4w84",
        "2MWo23BzgK",
        "n4sDCTlzav",
        "m5tFvm6qXr",
        "BBMiDh2Ezo",
        "XxkGHfaZxr",
        "kcNzqjRdy8",
        "q5hHSUyxsH",
        "Wywsmh0SFO",
        "A3sOlErUgk",
        "ej8ROw6Oht",
        "N8THdoBPnu",
        "AkYHsKvUvl",
        "CMObENjM3F",
        "RLMCd8z350",
        "ZXGIppRhNd",
        "ZXZuDNLe6Y",
        "oMqrY2fpkT",
        "paruvhqhvO",
        "S1FuSMpr9s",
        "7EqxYYto3T",
        "eaJkam6qrI",
        "uH1kOmZ1mU",
        "fcAOvc9Ril",
        "GeIy7WfZ8M",
        "XXhB0YupPU",
        "XJlI8ZyYHy",
        "s7vUQBSOuT",
        "jpJxvs7b5W",
        "HlhiThT9eD",
        "C2Vs3dcM92",
        "r0FxdkcWeG",
        "Fg3sWGrFq1",
        "HomyOh8vAw",
        "htJalzWpBy",
        "iLtW3xmqbe",
        "29dglHzIvJ",
        "SKV0a1THDG",
        "mxYx1RhOUI",
        "VPzFRZzV3D",
        "6Mn3ieWLKe",
        "YbsJEWyAI2",
        "t5scWtoxGd",
        "RW7obYtwNF",
        "zAoRuCtcBZ",
        "McCWR1tOih",
        "QQlBYvxCOy",
        "3pqeRVDref",
        "x4rRdYmYjs",
        "d1a4KSKcHZ",
        "yP7CxaPWgt",
        "alO0hbD7R7"
    ];

    public function findAll()
    {
        return self::ARR;
    }

    public function findOneById($id)
    {
        return self::ARR[$id];
    }

    public function findOneBySlug($slug)
    {
        return self::ARR[$slug];
    }

}