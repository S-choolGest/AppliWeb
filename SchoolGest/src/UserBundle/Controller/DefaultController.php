<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Utilisateur;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@User/Default/index.html.twig');
    }

    public function loginAction($username, $pwd)
    {
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->findOneBy(['username' => $username]);
        $encoder_service = $this->get('security.encoder_factory');
        $encoder = $encoder_service->getEncoder($user);
        if($encoder->isPasswordValid($user->getPassword(), $pwd, $user->getSalt()))
            return $this->json(['id' => $user->getId(), 'username' => $user->getUsername(), 'nom' =>$user->getNom(), 'prenom' =>$user->getPrenom(), 'email'=>$user->getEmail(), 'cin'=>$user->getCin(), 'numTel' => $user->getNumTel(), 'dateNaissance'=>$user->getDateNaissance(), 'adresse' => $user->getAdresse(), 'role'=>$user->getRoles()[0], 'profil' => $user->getProfile()], 200);
        /*echo $pwd;
        $encoded_pass = $encoder->encodePassword($pwd, $user->getSalt());
        echo $encoded_pass;
        echo $user->getPassword();
        if($user->getPassword() == $encoded_pass){
            return $this->json(['id' => $user->getId(), 'message' => 'login success'], 200);
        }*/
        return $this->json(['id' => $user->getId(), 'message' => 'login failed'], 500);
    }

    public function frontAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index_front.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
