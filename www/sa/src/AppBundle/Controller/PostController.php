<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 22.55
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Post;
use AppBundle\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends Controller
{


    /**
     * @var PostRepository $postRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    /**
     * @Route(
     *     "/admin/user/{page}/{pageId}",
     *     methods={"GET"},
     *     name="post_index",
     *     requirements={"page": "^(?!new)[a-zA-Z]*?", "pageId": "\d*?"}
     * )
     */
    public function indexAction($page = "simple", $pageId = 0)
    {
        return $this->render('@App/post/index.html.twig', [
            'posts' => $this->postRepository->findAll(),
            'useActions' => true
        ]);
    }


    /**
     * @Route(
     *     "/admin/user/{id}",
     *     methods={"GET"},
     *     name="post_show",
     *     requirements={"id": "\d*?"}
     * )
     */
    public function showAction($id)
    {
        return $this->render('@App/post/show.html.twig', [
            'post' => $this->postRepository->find($id)
        ]);
    }

    /**
     * @Route(
     *     "/admin/user/{id}/edit",
     *     methods={"GET", "POST"},
     *     name="post_edit",
     *     requirements={"id": "\d*?"}
     * )
     *
     * @Route(
     *     "/admin/user/new",
     *     methods={"GET", "POST"},
     *     name="post_new",
     *     defaults={"id": "-1"}
     * )
     * @param int $id
     * @return Response
     */
    public function editAction(int $id)
    {
        return $this->render('@App/post/edit.html.twig');
    }

    /**
     * @Route(
     *     "/admin/user/{id}/delete",
     *     methods={"DELETE"},
     *     name="post_delete",
     *     requirements={"id": "\d*?"}
     * )
     */
    public function deleteAction($id)
    {
        $this->addFlash('success', 'Deleting was OK!');
        return $this->redirect($this->generateUrl('post_index'));
    }


    /**
     * @Route(
     *     "/post/{page}",
     *     methods={"GET"},
     *     name="post_list",
     *     requirements={"page": "\d*?"}
     * )
     * @throws \Exception
     */
    public function listAction($page = 0)
    {
        $query =
            $this
                ->postRepository
                ->createQueryBuilder('p')
                ->where('p.postAt <> null')
                ->orWhere()
                ->where('p.postAt < :datetime')
                ->setParameter('datetime', new \DateTime())
                ->getQuery();


        return $this->render('@App/post/index.html.twig', [
            'posts' => $query->execute(),
            'useActions' => false
        ]);
    }


    /**
     * @Route(
     *     "/post/{slug}",
     *     methods={"GET"},
     *     name="post_view",
     *     requirements={"slug": "\w*?"}
     * )
     */
    public function viewAction($slug)
    {
        return $this->render('@App/post/show.html.twig', [
            'post' => $this->postRepository->findOneBy(['slug' => $slug])
        ]);
    }


}