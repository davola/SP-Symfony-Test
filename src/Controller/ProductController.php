<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $products = $entityManager->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [
                'products' => $products,
            ]
        );
    }

    /**
     * @Route("/products/{id}", name="product", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
        $entityManager->detach($product);
        $entityManager->flush();

        return new JsonResponse(['success' => true, 'id' => $id]);
    }
}
