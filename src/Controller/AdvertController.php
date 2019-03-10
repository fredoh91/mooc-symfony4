<?php
// src/Controller/AdvertController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController
{
// pour la suite //
//  /**
// * @Route("/{page}", name="oc_advert_index", requirements={"page" = "\d+"}, defaults={"page" = 1})
// */
//public function index() {
//}
//
///**
// * @Route("/view/{id}", name="oc_advert_view", requirements={"id" = "\d+"})
// */
//
//public function view($id)
//{
//    
//}
//
///**
// * @Route("/add", name="oc_advert_add")
// */        
//public function add()
//{
//
//}
//
///**
// * @Route("/edit/{id}", name="oc_advert_edit", requirements={"id" = "\d+"})
// */
//
//public function edit($id)
//{
//
//}
//
///**
// * @Route("/delete/{id}", name="oc_advert_delete", requirements={"id" = "\d+"})
// */
//
//public function delete($id)
//{
//
//}

//  public function index()
//  {
//    $content = "Notre propre Hello World !";
//
//    return new Response($content);
//  }
  
  /**
   * @Route("/", name="oc_advert_index")
   */
//  public function index()
//  {
//    $url = $this->generateUrl(
//        'oc_advert_view', // 1er argument : le nom de la route
//        ['id' => 5]       // 2e argument : les paramètres
//        
//    );
//    // $url vaut « /advert/view/5 »
//    return new Response("L'URL de l'annonce d'id 5 est : ".$url);
//  }    
    
    
    
    
  public function index(RouterInterface $router)
  {
//      $url = $router->generate('oc_advert_view', ['id' => 5], UrlGeneratorInterface::ABSOLUTE_URL);
    $url = $router->generate(
        'oc_advert_view', // 1er argument : le nom de la route
        ['id' => 5],       // 2e argument : les paramètres
        UrlGeneratorInterface::ABSOLUTE_URL
    );
//     $url vaut « /advert/view/5 »
    return new Response("L'URL de l'annonce d'id 5 est : ".$url);
  }
  
  
  
  
//  public function index(Environment $twig)
//  {
//    $content = $twig->render('Advert/index.html.twig', ['name' => 'winzou']);
//
//    return new Response($content);
//  }
//  
  /**
   * @Route("/view/{id}", name="oc_advert_view")
   */
  public function view(Environment $twig,$id)
  {
    // $id vaut 5 si l'URL appelée est /advert/view/5
//      var_dump($id);
    $content = $twig->render('Advert/oc_view.html.twig', ['advertId' => $id]);
    return new Response($content);
  }
  
//    /**
//     * @Route("/advert/view/{year}/{slug}.{format}", name="oc_advert_view_slug")
//     */
    /**
     * @Route("/view/{year}/{slug}.{_format}", name="oc_advert_view_slug", requirements={
     *   "year"   = "\d{4}",
     *   "_format" = "html|xml"
     * }, defaults={"_format" = "html"})
     */
    public function viewSlug($slug, $year, $_format)
    {
      return new Response(
        "On pourrait afficher l'annonce correspondant au slug '".$slug."', créée en ".$year." et au format ".$_format."."
      );
    }

  public function byebye_world(Environment $twig)
  {
    $content = $twig->render('Advert/byebye-world.html.twig');

    return new Response($content);
  }
}