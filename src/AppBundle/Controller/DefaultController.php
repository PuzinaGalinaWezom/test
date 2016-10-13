<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Product;
use AppBundle\Entity\Test;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    public function createAction()
    {
        $input = array("failed", "normal", "illegal", "success");
        $rand_keys = array_rand($input);

        $test = new Test();
        $test->setScriptName('script_name'.rand(5, 15));
        $test->setStartTime(strtotime ("now" ));
        $test->setEndTime(strtotime ("now" ));
        $test->setResult($rand_keys);

        $em = $this->getDoctrine()->getManager();
        $em->persist($test);
        $em->flush();

        return new Response('Saved new item with id '.$test->getId());

    }

    public function showAction()
    {
        // createQueryBuilder automatically selects FROM AppBundle:Test
        $repository = $this->getDoctrine()->getRepository('AppBundle:Test');
        $query = $repository->createQueryBuilder('t')
            ->where('t.result IN (:result)')
            ->setParameter('result', array('normal','success'))
            ->orderBy('t.result', 'ASC')
            ->getQuery();

        $test = $query->getResult();



        if (!$test) {
            throw $this->createNotFoundException(
                'No items found for result '
            );
        }

        // ... do something, like pass the $test object into a template

        return $this->render('default/show.html.twig',array('test' => $test));
    }
    public function filesAction(){
        $files = array();
        $files =scandir ('C:\datafiles');
        foreach($files as $obj){
            if(preg_match('/.txt/i',$obj)){
                $files_sort[] = $obj;
            }
        }
        sort($files_sort);
        reset($files_sort);

        return $this->render('default/files.html.twig',array('files' => $files_sort));
    }

}
