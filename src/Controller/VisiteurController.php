<?php

// src/Controller/VisiteurController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisiteurController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        // Récupération ou initialisation du compteur de visites depuis la session
        $session = $request->getSession();
        $compteurVisites = $session->get('compteur_visites', 0);
        
        // Affichage temporaire pour le débogage
        dump($compteurVisites); // Vérifiez si cette valeur est correcte
        
        $compteurVisites++;

        // Enregistrement du compteur mis à jour dans la session
        $session->set('compteur_visites', $compteurVisites);

        // Passage de la variable compteurVisites au template Twig
        return $this->render('visiteur/index.html.twig', [
            'compteurVisites' => $compteurVisites,
        ]);
    }
}
