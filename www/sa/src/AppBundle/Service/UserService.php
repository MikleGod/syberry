<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 23.10
 */

namespace AppBundle\Service;



use AppBundle\Entity\User;

class UserService
{
    private static $ARR;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        self::$ARR = [
            new User(1,"sNE6ENUDsK"),
            new User(2,"iUkJKdyiyv"),
            new User(3,"CIZdoFjot6"),
            new User(4,"G4MoMOhuOh"),
            new User(5,"yfiJAUC3AY"),
            new User(6,"W23dgBkNFK"),
            new User(7,"Mxd3tPocbz"),
            new User(8,"uhabZvOjQW"),
            new User(9,"2sPTbksWy8"),
            new User(10,"yKqQBCa2nW"),
            new User(11,"uiUUHjNlCX"),
            new User(10,"jYx4XGdwXN"),
            new User(11,"VUudZZ2nly"),
            new User(12,"3C7lAg8GYq"),
            new User(13,"KP1fMMY6rC"),
            new User(14,"uwEd8Ta80d"),
            new User(15,"QHETQ98kzk"),
            new User(16,"0XgssSYDnb"),
            new User(17,"P2QBXGmddd"),
            new User(18,"IH8d69v9Oh"),
            new User(19,"xBNa28FuJu"),
            new User(20,"Q8L056yefs"),
            new User(21,"OYJDVvBvMk"),
            new User(22,"6uGtBOuL5Y"),
            new User(23,"H9uhZx5E9r"),
            new User(24,"BxGts8dqAi"),
            new User(25,"iYjKwHKpdq"),
            new User(26,"jdeP3YQSp4"),
            new User(27,"ZodOEC0dtt"),
            new User(28,"msFVe2oFdj"),
            new User(29,"GokZOe6bmc"),
            new User(30,"zmWhlysWWO"),
            new User(31,"JyziEksrXK"),
            new User(32,"2oP5gKMA4O"),
            new User(33,"Kqi85VQA18"),
            new User(34,"Yk0j1kkZg4"),
            new User(35,"YWuBfeORYd")
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