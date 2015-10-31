<?php

namespace Coderslab\BookshelfBundle\Controller;

use Coderslab\BookshelfBundle\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/author")
 */
class AuthorController extends Controller
{
    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction()
    {
        return array(

            );    }

    /**
     * @Route("/showBestBooksAction")
     * @Template()
     */
    public function showBestBooksAction()
    {
        return array(
            // ...
        );    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction()
    {
        $author = new Author();
        $form = $this->createFormBuilder($author)
            ->add("name", "text")
            ->add("description", "textarea")
            ->add("age", "integer")
            ->add("save", "submit", array("label" => "Save"))//w array jest napis na buttonie
            ->getForm();

        return array(
            "form" => $form->createView()
        );
          }


    /**
     * @Route("/add")
     */
    public function addAction(Request $request){
        $newAuthor = new Author;
        $form = $this->createFormBuilder($newAuthor)
            ->add("name", "text")
            ->add("description", "textarea")
            ->add("age", "integer")
            ->add("save", "submit", array("label" => "Save"))//w array jest napis na buttonie
            ->getForm();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $em->persist($newAuthor);
        $em->flush();

        return $this->redirectToRoute("coderslab_bookshelf_author_show");
    }

}
