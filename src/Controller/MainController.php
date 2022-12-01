<?php

namespace App\Controller;

use App\Repository\CVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SkillsRepository;
use App\Repository\PortfolioRepository;
use Symfony\Component\HttpFoundation\Request;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(PortfolioRepository $repoPortfolio, CVRepository $repoCV)
    {
        
        $portfolio = $repoPortfolio->findAll();
        $cv = $repoCV->findFirst();
        
        //vérification de la validation du formulaire
       
        return $this->render('main/index.html.twig', [
            'portfolio' => $portfolio,
            'cv' => $cv
        ]);
    }

     /**
     * @Route("/competences", name="skills")
     */
    public function showSkills(SkillsRepository $repoSkills)
    {
        $skills = $repoSkills->findAll();
        return $this->render('main/skills.html.twig', [
            'skills' => $skills,
        ]);
        
    }

    /**
     * @Route("/sendmail", name="sendmail", methods={"POST","GET"})
     */
    public function sendMail(Request $request)
    {

        $mail = htmlspecialchars($request->get('mail'));
        $name = htmlspecialchars($request->get('name'));
        $firstName = htmlspecialchars($request->get('firstname'));
        $msg = htmlspecialchars($request->get('message'));
        
        // $msg = $_GET['message'];

        // on envoi le mail
        // $message = (new \Swift_Message('Nouveau contact'))
        // on attribut l'expéditeur
        // ->setFrom($mail)
        // on attribut le destinataire
        // ->setTo('alliaume.nicolas@gmail.com')
        // on crée le message avec la vue Twig
        // ->setBody(
        //     $this->render('emails/contact.html.twig', [
        //     'name' => $name,
        //     'firstName' => $firstName,
        //     'mail' => $mail,
        //     'message' => $msg
        //     ]),
        //     'text/html'
        // );
        // $mailer->send($message);

        return $this->render('emails/contact.html.twig', [
            'name' => $name,
            'firstName' => $firstName,
            'mail' => $mail,
            'message' => $msg
        ]);
    }

    /**
     * @Route("/legacy", name="mentions")
     */
    public function mentions(){
        return $this->render('mentions_legales/mentions-legales.html.twig');
    }
    
}
