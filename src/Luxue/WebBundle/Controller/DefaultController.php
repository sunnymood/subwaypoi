<?php

namespace Luxue\WebBundle\Controller;

use Luxue\WebBundle\Entity\Book;
use Luxue\WebBundle\Entity\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/book/show/{id}")
     * @ParamConverter("bookbook",class="LuxueWebBundle:Book")   ��id��Ӧ��Ϊclass����ָ��entity Book��id��������Book���е�
     */
    public function showBookAction(Book $book){

       return new Response($book->getTitle());

    }

    /**
     * @Route("/main")
     * @Template("@LuxueWeb/Default/main.html.twig")
     */
    public function mainAction(Request $request)
    {
        /*$user = new User();
        $user->setAge(19);
        $user->setEmail('xxqq3536@126.com');
        $user->setPassword('aaaaaa');

        $em->persist($user);
        $em->flush();*/
//
//        $em = $this->getDoctrine()->getManager();
//        $user = $em->getRepository('LuxueWebBundle:User')->findOneBy(array('id'=>1));


//        /** @var  $book \Luxue\WebBundle\Entity\Book */
//        foreach($user->getBooks() as $book){
//            echo $book->getTitle();
//        }



        /*$book1 = new Book();
        $book1->setTitle('book1');
        $book1->setPrice(10);
        $book1->addUser($user);//book->user ManyToOne   so two books have the same user

        $book2 = new Book();
        $book2->setTitle('book2');
        $book2->setPrice(10);
        $book2->addUser($user);

        $em->persist($book1);
        $em->persist($book2);
        $em->flush();*/

        $user = new User();
        $builder = $this->createFormBuilder($user);
        $form = $builder
            ->add('email','email',array('label'=>'用户名'))
            ->add('password')
            ->add('age')
            ->add(
                $builder->create('profile','form')
                ->add('mobile_number','integer')
            )
            ->add('submit','submit')
            ->getForm();

        $form->handleRequest($request);//处理提交的表单

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        //$form = $this->createForm('text');



        $content = "I'm so happy";

        $this->get('luxue_web.printa')->printA();//先于index.html.twig 打印出来

        return array('content' => $content,'form'=>$form->createView());
    }


    /**
     *@Route("/index")
     *@Template("@LuxueWeb/layout.html.twig")
     */
    public function defaultAction(){

        return $this->render('@LuxueWeb/layout.html.twig',array());
    }

    /**
     *@Route("/dataget")
     *@Template()
     */
    public function dataGetAction(){

        return $this->render('@LuxueWeb/Default/dataGet.html.twig',array());
    }

    /**
     * @Route("/dataana")
     *@Template()
     */
    public function dataAnalysisAction(){

        return $this->render('@LuxueWeb/Default/dataAnalysis.html.twig',array());
    }

    /**
     * @Route("/dataview")
     * @Template()
     */
    public function dataViewAction(){
        return $this->render('@LuxueWeb/Default/dataView.html.twig',array());
    }

    /**
     * @Route("/datapredict")
     * @Template()
     */
    public function dataPredictAction(){
        return $this->render('@LuxueWeb/Default/dataPredict.html.twig',array());
    }


}


