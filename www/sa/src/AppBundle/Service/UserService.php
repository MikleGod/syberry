<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 23.10
 */

namespace AppBundle\Service;



class UserService
{
    private const ARR = [
        "sNE6ENUDsK",
        "iUkJKdyiyv",
        "CIZdoFjot6",
        "G4MoMOhuOh",
        "yfiJAUC3AY",
        "W23dgBkNFK",
        "Mxd3tPocbz",
        "uhabZvOjQW",
        "2sPTbksWy8",
        "yKqQBCa2nW",
        "uiUUHjNlCX",
        "jYx4XGdwXN",
        "VUudZZ2nly",
        "3C7lAg8GYq",
        "KP1fMMY6rC",
        "uwEd8Ta80d",
        "QHETQ98kzk",
        "0XgssSYDnb",
        "P2QBXGmddd",
        "IH8d69v9Oh",
        "xBNa28FuJu",
        "Q8L056yefs",
        "OYJDVvBvMk",
        "6uGtBOuL5Y",
        "H9uhZx5E9r",
        "BxGts8dqAi",
        "iYjKwHKpdq",
        "jdeP3YQSp4",
        "ZodOEC0dtt",
        "msFVe2oFdj",
        "GokZOe6bmc",
        "zmWhlysWWO",
        "JyziEksrXK",
        "2oP5gKMA4O",
        "Kqi85VQA18",
        "Yk0j1kkZg4",
        "YWuBfeORYd"
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