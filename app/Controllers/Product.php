<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    protected ProductModel $productModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function view(string $slug = 'static-dynamic-balancing-apparatus'): string
    {
        $product = $this->productModel->getProduct($slug);

        if (! $product) {
            $product = $this->productModel->getProduct('static-dynamic-balancing-apparatus');
        }

        $category = null;
        if (isset($product['category_slug'])) {
            $category = $this->categoryModel->getCategory($product['category_slug']);
        }

        $allCategories = $this->categoryModel->getAllCategories();

        $data = [
            'title'            => $product['name'] . ' | ' . ($product['category_name'] ?? 'Engineering Lab Equipment') . ' | Ambross India',
            'meta_description' => substr($product['overview'], 0, 160) . '...',
            'product'          => $product,
            'category'         => $category,
            'all_categories'   => $allCategories,
        ];

        return view('product/view', $data);
    }
}
