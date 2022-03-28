<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use App\Entity\Canciones;
use App\Entity\Generos;
use App\Entity\Tono;
use App\Form\DatosCancionesType;
use App\Repository\CancionesRepository;
use ContainerScy3PtY\getCancionesService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PersistirDatosController extends AbstractController
{
    /**
     * @Route("/PersistirDatos", name="persistir")
     */
    public function PersistirDatos(Request $request): Response
    {        
        $canciones = new Canciones();
        // $tonos2 = new Tono("Jejejejeje");
        // $canciones->setTonos(500);
        $form=$this->createForm(DatosCancionesType::class,$canciones);
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($canciones);
            $entityManager->flush();
            $canciones = $form->getData();

            return $this->redirectToRoute('persistir');
        }
  
        return $this->render('persistir_datos/index.html.twig', [
            'controller_name' => 'PersistirDatosController',
            'form' =>$form->createView(), 
        ]);
    }
     /**
     * @Route("/Busquedas/{generoCancion}", name="busquedas")
     */

     public function Busquedas($generoCancion){
         $em = $this->getDoctrine()->getManager();
         $canciones = $em->getRepository(Canciones::class)->find(80);
         $canciones2 = $em->getRepository(Canciones::class)->findOneBy(['tonalidad'=>'G','tematica'=>'Consagración']);
         $canciones3 = $em->getRepository(Canciones::class)->findBy(['genero'=>'Rock','tonalidad'=>'Bm']);
         $canciones4 = $em->getRepository(Canciones::class)->findAll();
         $cancionesRepository = $em->getRepository(Canciones::class)->BuscarCancion($generoCancion);


         return $this->render('busquedas/busquedas.html.twig', 
         array('find'=>$canciones,
         'findOneBy'=>$canciones2,
          'findBy'=>$canciones3,
          'findAll'=>$canciones4,
          'BuscarCancion'=>$cancionesRepository
        ));
 
     }


     /**
     * @Route("/buscador{nombre}", name="buscadores")
     */
    public function Buscador(Request $request, $nombre)
    {        
        $form1 = $this->createFormBuilder()
        ->add('genero')
        ->add('Enviar',SubmitType::class)
        ->getForm();

            return $this->render('buscador/buscador.html.twig',
            array("parametro1"=>$nombre,
            'form1'=>$form1->createView()));
        
    }


    /**
     * @Route("/paginador/{genero}", name="paginador")
     */

    public function index(PaginatorInterface $paginator, Request $request, $genero){

        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository(Canciones::class)->BuscarCancion($genero);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
     
        return $this->render('paginador/paginador.html.twig',[
            'pagination'=> $pagination
        ]
      );

    }
     /**
     * @Route("/AdicionDatos", name="adiciondatos")
     */



    public function AdicionDatos(): Response
    {        
        $entityManager = $this->getDoctrine()->getManager();
        $cocoslocos = $entityManager->getRepository(Generos::class)->findBy([], ['id'=>'ASC']);
        
       return $this->render('AdicionarDatos/AdicionDatos.html.twig', [
            'cocoslocos' => $cocoslocos,
            
        ]);

    }






    /**
     * @Route("/HacerAdicionDatos", name="haceradiciondatos")
     */
    public function HacerAdicionarDatos(Request $request): Response
    {       
        // $all_params = $request->request->all();
        // var_dump($all_params);
        $ncancion = $request->get("ncancion");
        $tonalidad = $request->get("tonalidad");
        $tempo = $request->get("tempo");
        $tematica = $request->get("tematica");
        $letra = $request->get("letra");
        $genero = $request->get("genero");
        $generos = $request->get("tonoss");
    

        $enviarCanciones = new Canciones();
        $enviarCanciones->setNombreCancion($ncancion);
        $enviarCanciones->setTematica($tematica);
        $enviarCanciones->setTonalidad($tonalidad);
        $enviarCanciones->setTempo($tempo);
        $enviarCanciones->setGenero($genero);
        $enviarCanciones->setLetra($letra);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($enviarCanciones);
      
     
            $enviargeneros = new Canciones();
            $enviargeneros->setGeneros($generos);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enviargeneros);
            $entityManager->flush();
        // $enviarCanciones->setTono($tono);

     

        return $this->render('AdicionarDatos/HacerAdicionDatos.html.twig');
    //    return new JsonResponse([
    //        'generos' => $generos,
    //         'nombre_cancion' => $ncancion,
    //         'tono_id' => $tono,
    //         'tonalidad' => $tonalidad,
    //         'tempo' => $tempo,
    //         'tematica' => $tematica,
    //         'letra' => $letra,
    //         'all_params' => $all_params,
       
    //    ]);
}
}
