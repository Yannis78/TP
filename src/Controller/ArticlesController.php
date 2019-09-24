<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    }

        /**
     * Permet d'afficher une seule annoce
     *
     * @Route("/articles/{libelle}", name="articles_show")
     * 
     * @return Response
     */
    public function show(Article $article){
        return $this->render('articles/show.html.twig', [
            'article' => $article
        ]);
    }
}
