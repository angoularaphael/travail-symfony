<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\CommentType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/search', name: 'app_search', methods: ['GET'])]
    public function search(Request $request, PostRepository $postRepository): Response
    {
        $query = trim((string) $request->query->get('q', ''));
        $posts = $query !== '' ? $postRepository->search($query) : [];

        return $this->render('post/search.html.twig', [
            'posts' => $posts,
            'query' => $query,
        ]);
    }

    #[Route('/post/{id}', name: 'app_post_show', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function show(int $id, PostRepository $postRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $post = $postRepository->find($id);

        if (!$post instanceof Post) {
            throw new NotFoundHttpException('Article non trouvé.');
        }

        $comment = new Comment();
        $comment->setPost($post);

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été ajouté avec succès.');

            return $this->redirectToRoute('app_post_show', ['id' => $post->getId()]);
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }
}
