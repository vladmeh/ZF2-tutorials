<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DOMPDFModule\View\Model\PdfModel;

class ListController extends AbstractActionController
{

    /**
     * @var \Blog\Service\PostServiceInterface
     */
    protected $postService = null;

    public function __construct(\Blog\Service\PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function indexAction()
    {
        /*$pdf = new PdfModel();
        $pdf->setOption("paperSize", "a4"); //Defaults to 8x11
        $pdf->setOption("paperOrientation", "landscape"); //Defaults to portrait

        $pdf->setVariables(
            array(
                'posts' => $this->postService->findAllPosts()
            )
        );
        return $pdf;*/

        return new ViewModel(array(
            'posts' => $this->postService->findAllPosts()
        ));

    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $post = $this->postService->findPost($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }

        /*$pdf = new PdfModel();
        $pdf->setOption("paperSize", "a4"); //Defaults to 8x11
        $pdf->setOption("paperOrientation", "landscape"); //Defaults to portrait

        $pdf->setVariables(
            array(
                'post' => $post
            )
        );
        return $pdf;*/

        return new ViewModel(array(
            'post' => $post
        ));
    }


}

