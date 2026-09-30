<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Category extends BaseController
{
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function view(string $slug = 'theory-of-machine-lab'): string
    {
        $category = $this->categoryModel->getCategory($slug);

        if (!$category) {
            // Default to theory-of-machine-lab or show 404
            $all = $this->categoryModel->getAllCategories();
            $category = reset($all);
        }

        $allCategories = $this->categoryModel->getAllCategories();

        $data = [
            'title' => $category['title'] . ' | Mohan Brothers — Ambros India',
            'meta_description' => substr($category['desc'], 0, 160) . '...',
            'category' => $category,
            'all_categories' => $allCategories,
        ];

        return view('category/view', $data);
    }
}
