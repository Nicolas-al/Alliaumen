<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Portfolio;
use App\Repository\CommentsRepository;
use App\Repository\PortfolioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/projets", name="projects")
     */
    public function index(PortfolioRepository $repoPortfolio, EntityManagerInterface $manager)
    {
        
        $projects = $repoPortfolio->findAll();
        
       
        // on récupère l'IP utilisateur et les IP ban
        $ip = array($_SERVER['REMOTE_ADDR']);
        $ipBan = json_decode(file_get_contents('/Users/nicolasalliaume/Documents/Code/dev-Me/Local-sites/ProjetsOpenclassroom/alliaumen/ip.json'), true);

        return $this->render('portfolio/index.html.twig', [
            'projects' => $projects,
            'ip' => $ip,
            'ipBan' => $ipBan
        ]);
    }
    
       

}
