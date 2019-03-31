<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testPostbycategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/category/{category_name}');
    }

}
