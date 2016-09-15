<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WriteController extends AbstractActionController
{

    protected $postService = null;

    protected $postForm = null;

    public function __construct(\Blog\Service\PostServiceInterface $postService, \Zend\Form\FormInterface $postForm)
    {
        $this->postService = $postService;
                        $this->postForm    = $postForm;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        $request = $this->getRequest();

            if ($request->isPost()) {
                $this->postForm->setData($request->getPost());

                if ($this->postForm->isValid()) {
                    try {
                        //\Zend\Debug\Debug::dump($this->postForm->getData());die();
                        $this->postService->savePost($this->postForm->getData());

                        return $this->redirect()->toRoute('blog');
                    } catch (\Exception $e) {
                        // Some DB Error happened, log it and let the user know
                    }
                }
            }

            return new ViewModel(array(
                'form' => $this->postForm
            ));
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $post = $this->postService->findPost($this->params('id'));

        $this->postForm->bind($post);

        if($request->isPost()){
            $this->postForm->setData($request->getPost());

            if ($this->postForm->isValid()) {
                try {
                    $this->postService->savePost($post);
                    return $this->redirect()->toRoute('blog');
                } catch (\Exception $e){
                    die($e->getMessage());
                    // Some DB Error happened, log it and let the user know
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $this->postForm
            )
        );
    }

}

