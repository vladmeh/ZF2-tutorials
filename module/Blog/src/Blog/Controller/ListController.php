<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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

        return new ViewModel(array(
            'post' => $post
        ));
    }


}

