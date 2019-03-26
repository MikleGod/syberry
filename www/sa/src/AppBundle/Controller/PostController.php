<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 22.55
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use AppBundle\Form\PostForm;
use AppBundle\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends Controller
{


    /**
     * @var PostRepository $postRepository
     */
    private $postRepository;

    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(PostRepository $postRepository, EntityManagerInterface $entityManager)
    {
        $this->postRepository = $postRepository;
        $this->entityManager = $entityManager;
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
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request)
    {
        if ($id !== -1){
            $post = $this->postRepository->findOneBy(['id' => $id]);
        } else {
            $post = new Post();
        }

        $form = $this->createForm(PostForm::class, $post);

        $form->handleRequest($request);

        if ($form->isValid()){
            $user = $this->entityManager->getRepository(User::class)->find(1);
            $post->setAuthor($user);
            $this->entityManager->persist($post);
            $this->entityManager->flush();
            return $this->redirect($this->generateUrl('post_index'));
        }
        return $this->render('@App/post/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route(
     *     "/admin/user/{id}/delete",
     *     methods={"DELETE", "POST"},
     *     name="post_delete",
     *     requirements={"id": "\d*?"}
     * )
     */
    public function deleteAction($id)
    {
        $post = $this->postRepository->find($id);
        $this->entityManager->remove($post);
        $this->entityManager->flush();
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