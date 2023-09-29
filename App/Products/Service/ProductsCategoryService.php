<?php

declare(strict_types=1);

namespace App\Products\Service;

use App\Products\Application\Input\InputSaveCategoryProducts;
use App\Products\Repository\ProductsCategoryRepository;

class ProductsCategoryService
{
    private $productsCategoryRepository;

    public function __construct()
    {
        $this->productsCategoryRepository = new ProductsCategoryRepository();
    }

    public function listCategoriesProducts(): array
    {
        return $this->productsCategoryRepository->productsCategoryList();
    }

    public function newCategoryProducts(InputSaveCategoryProducts $saveCategoryProducts): int
    {
        $data = [
            'name' => $saveCategoryProducts->getName()
        ];

        return $this->productsCategoryRepository->insertNewCategoryProducts($data);
    }
}
