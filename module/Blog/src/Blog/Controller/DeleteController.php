<?php

namespace Blog\Controller;

use Blog\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractActionController
{
    /**
     * @var PostServiceInterface
     */
    protected $_postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->_postService = $postService;
    }


    public function deleteAction()
    {
        try {
            $post = $this->_postService->findPost($this->params('id'));
        } catch (\InvalidArgumentException $e) {
            return $this->redirect()->toRoute('blog');
        }

        $request = $this->getRequest();

        if ($request->isPost()){
            $del = $request->getPost('delete_confirmation', 'no');

            if ($del === 'yes'){
                $this->_postService->deletePost($post);
            }

            return $this->redirect()->toRoute('blog');
        }

        return new ViewModel(
            array(
                'post' => $post
            )
        );
    }


    public function indexAction()
    {
        return new ViewModel();
    }


}

