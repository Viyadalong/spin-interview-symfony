<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/product", name="product_index")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/create", name="product_create")
     */
    public function create(Request $request): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/form.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/product/edit/{id}", name="product_edit")
     */
    public function edit(Request $request, Product $product): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->doctrine->getManager()->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/form.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}" , name="product_delete")
     */
    public function delete($id): Response
    {
        $em = $this->doctrine->getManager();
        $product = $this->doctrine->getRepository(Product::class);
        $product = $product->find($id);

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('product_index');

    }

    /**
     * @Route("product/byCategory" , name="product_by_category")
     */
    public function byCategory(CategoryRepository $category): Response
    {
        return $this->render('product/byCategory.html.twig', [
            'categories' => $category->findBy([], ['displayOrder' => 'asc'])
        ]);
    }

    /**
     * @Route("product/byCategory/{categoryId}" , name="product_by_category_list")
     */
    public function productsListedByCategory($categoryId): Response
    {
        $category = $this->doctrine->getRepository(Category::class)->find($categoryId);
        $products = $this->doctrine->getRepository(Product::class)->findBy(['category' => $category], ['name' => 'asc']);

        return $this->render('product/listedByCategory.html.twig', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
