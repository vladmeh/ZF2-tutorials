<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DOMPDFModule\View\Model\PdfModel;
use QuTcPdf\Module;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $cache   = \Zend\Cache\StorageFactory::factory(array(
            'adapter' => array(
                'name' => 'filesystem'
            ),
            'plugins' => array(
                // Don't throw exceptions on cache errors
                'exception_handler' => array(
                    'throw_exceptions' => false
                ),
            )
        ));

        return new ViewModel();
    }

    public function dompdfAction()
    {
        $pdf = new PdfModel();
        $pdf->setVariables(array(
            'name' => 'John Doe',
        ));

        $pdf->setOption("paperSize", "a5"); //Defaults to 8x11
        $pdf->setOption("paperOrientation", "landscape"); //Defaults to portrait

        return $pdf;
    }

    public function tcpdfAction()
    {
//        $sm  = $this->getServiceLocator();
//        $pdf = $sm->get('QuTcPdf');

        $pdf = new Module();
        $pdf = $pdf->MyPdf();

        $pdf->setHeaderData($ln = 0,$lw = 0,$ht = 0,$hs = 0,$tc = array(255,255,255),$lc = array(255,255,255));
        $pdf->setFooterData($tc = array(255,255,255),$lc = array(255,255,255));
        $pdf->setPageOrientation($orientation='P', $autopagebreak='L', $bottommargin=-200);

        /*foreach($pages as $page){

            $pdf->AddPage();

            //Your function
            $this->multiPag($pdf,$page);

            $pdf->lastPage();

        }*/

        $pdf->AddPage();

        $pdf->Output();
    }

}
