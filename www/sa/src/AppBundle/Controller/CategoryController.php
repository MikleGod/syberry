<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * @Route("/post/category/{category_name}")
     * @param string $category_name
     * @return Response
     */
    public function postByCategoryAction($category_name)
    {
        return $this->render('@App/post/index.html.twig', array(
            'posts' => $this
                ->getDoctrine()
                ->getRepository(Post::class)
                ->createQueryBuilder('p')
                ->where('p.category = :category')
                ->setParameter(
                    'category',
                    $this
                        ->getDoctrine()
                        ->getRepository(Category::class)->findOneBy([
                                'name' => $category_name
                            ]
                        )
                )
                ->getQuery()
                ->execute(),
            'useActions' => false
        ));
    }

}
