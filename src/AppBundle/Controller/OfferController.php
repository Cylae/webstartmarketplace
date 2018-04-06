<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Offer;
use AppBundle\Form\OfferType;
use Symfony\Component\Security\Core\User\UserInterface;

class OfferController extends Controller
{
    /**
     * @Route("/offer/add", name="addOffer")
     * @Security("has_role('ROLE_USER')")
     */
    public function addOfferAction(Request $request, UserInterface $user = null)
    {
        $offer = new Offer();
        $form = $this->createForm(OfferType::class, $offer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $offer->setAuthor($user);

            $file = $offer->getOfferImg();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );

            $offer->setOfferImg($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('offer/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
