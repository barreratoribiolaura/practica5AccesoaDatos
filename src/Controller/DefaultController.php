<?php

namespace App\Controller;

use App\Entity\Centre;
use App\Entity\Cicle;
use App\Entity\Provincia;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\ORMInvalidArgumentException;
use Proxies\__CG__\App\Entity\Regim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Error\Error;

class DefaultController extends AbstractController
{
    public function index()
    {
        return new Response('Hello!');
    }

    public function ej1()
    {

        $centresArray = [];

        $centres = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findAll();

        foreach ($centres as $centre) {
            $centresArray[] = [
                'nombre' => $centre->getCentre()
            ];
        }
        return new JsonResponse($centresArray);

    }

    public function ej2()
    {

        $centresArray = [];


        $centres = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findAll();

        foreach ($centres as $centre) {
            if ($centre->getProvincia()->getNom() == 'Prov. de València') {

                $centresArray[] = [
                    'nombre' => $centre->getCentre()
                ];
            }

        }
        return new JsonResponse($centresArray);

    }

    public function ej3()
    {

        $centreArray = [];


        $centres = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findAll();

        foreach ($centres as $centre) {
            $cicles = $centre->getCicle();
            $ciclesArray = [];
            foreach ($cicles as $cicle) {
                $ciclesArray[] = [
                    'codi' => $cicle->getCodi()
                ];
            }
            $centreArray[] = [
                'centre' => $centre->getCentre(),
                'cicles' => $ciclesArray
            ];

        }

        return new JsonResponse($centreArray);
    }

    public function ej4()
    {


        $centreArray = [];

        $centres = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findAll();

        foreach ($centres as $centre) {
            $cicles = $centre->getCicle();
            foreach ($cicles as $cicle) {
                if ($cicle->getCodi() == 'DAM') {
                    $centreArray[] = [
                        'id' => $centre->getId(),
                        'centre' => $centre->getCentre(),
                    ];
                }
            }
        }
        return new JsonResponse($centreArray);
    }

    public function ej5(Request $request )
    {

        $id = $request->get('id');

        $centre = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findOneBy(['id' => $id]);

        $ciclesArray = [];

        $cicles = $centre->getCicle();
        foreach ($cicles as $cicle) {
            $ciclesArray[] = [
                'id' => $cicle->getId(),
                'nom' => $cicle->getNom()
            ];
        }

        $centreArray = [];
        $centreArray[] = [
            'id' => $centre->getId(),
            'codi' => $centre->getCodi(),
            'centre' => $centre->getCentre(),
            'provincia' => $centre->getProvincia()->getNom(),
            'localitat' => $centre->getLocalitat(),
            'direccio' => $centre->getDireccio(),
            'telefon' => $centre->getTelefon(),
            'regim' => $centre->getRegim()->getNom(),
            'query' => $centre->getQuery(),
            'cicles' => $ciclesArray

        ];

        return new JsonResponse($centreArray);
    }

    public function ej6(){


        try{
            $centre = new Centre();

            $regim = $this->getDoctrine()->getManager()
                ->getRepository(Regim::class)
                ->findOneBy(['nom' => 'Públic']);

            $provincia = $this->getDoctrine()->getManager()
                ->getRepository(Provincia::class)
                ->findOneBy(['nom' => 'Prov. d\'Alacant']);


            //SACAR CICLOS EN ARRAYCOLLECITION RELACION N:M

            $cicles = $this->getDoctrine()->getManager()
                ->getRepository(Cicle::class)
                ->findAll();

            $ciclosCollection = new ArrayCollection();

            foreach ($cicles as $cicle) {
                if(in_array($cicle->getCodi(),['DAM','DAW','SMX'])){
                    $ciclosCollection->add($cicle);

                    $centresCicle = $cicle->getCentre();
                    $centresCicle[] = $centre;
                    $cicle->setCentre($centresCicle);
                }
            }

            $centre->setCentre("IES LAU2");
            $centre->setCodi('03013330');
            $centre->setDireccio("Av. AUGUSTA, 2");
            $centre->setLocalitat("03730 - XÀBIA");
            $centre->setTelefon('966428205');
            $centre->setQuery('IES-LA-MAR');

            $centre->setRegim($regim);
            $centre->setProvincia($provincia);
            $centre->setCicle($ciclosCollection);

            $this->getDoctrine()->getManager()->persist($centre);
            $this->getDoctrine()->getManager()->flush();

            return new JsonResponse("Se ha añadido correctamente");

        }catch (ORMInvalidArgumentException $e){
            return new JsonResponse("Ese centro ya existe");
        }

    }

    public function ej7(){

        $centre = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findOneBy(['centre'=>'IES LA SÈNIA']);

        if($centre == null) {
            return new JsonResponse("Ese centro no existe");
        }

        $centre->setTelefon('678678112');

        $this->getDoctrine()->getManager()->persist($centre);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse("Se ha actualizado correctamente");


    }

    public function ej8(){

        try{
            $centre = $this->getDoctrine()->getManager()
            ->getRepository(Centre::class)
            ->findOneBy(['centre'=>'IES LA MAR']);

            $this->getDoctrine()->getManager()->remove($centre);
            $this->getDoctrine()->getManager()->flush();

            return new JsonResponse("Se ha borrado correctamente");

            die;
        }catch (ORMInvalidArgumentException $e){
            return new JsonResponse("Ese centro no existe");
        }

    }

}
