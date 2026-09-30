<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    protected CategoryModel $categoryModel;
    protected ProductModel $productModel;
    protected $session;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->session = session();
    }

    private function checkAuth()
    {
        if (!$this->session->get('is_admin_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please login to access the admin portal.');
        }
        return null;
    }

    public function index()
    {
        if ($this->session->get('is_admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return redirect()->to('/admin/login');
    }

    public function login()
    {
        if ($this->session->get('is_admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login', [
            'title' => 'Admin Login | Ambros India Control Panel'
        ]);
    }

    public function attemptLogin()
    {
        $username = trim($this->request->getPost('username') ?? '');
        $password = trim($this->request->getPost('password') ?? '');

        // Support default admin login: admin / admin123 or admin@Ambros.com / admin123
        if (($username === 'admin' || $username === 'admin@Ambros.com') && $password === 'admin123') {
            $this->session->set([
                'is_admin_logged_in' => true,
                'admin_user' => 'Ambros Administrator',
                'admin_email' => 'admin@ambros.com',
                'logged_in_time' => date('Y-m-d H:i:s')
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, Administrator!');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username or password. (Default: admin / admin123)');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/admin/login')->with('success', 'You have been logged out successfully.');
    }

    public function dashboard()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $categories = $this->categoryModel->getAllCategories();
        $products = $this->productModel->getAllProducts();
        $enquiries = $this->loadEnquiries();

        $newEnquiriesCount = 0;
        foreach ($enquiries as $e) {
            if (($e['status'] ?? 'new') === 'new') {
                $newEnquiriesCount++;
            }
        }

        return view('admin/dashboard', [
            'title' => 'Dashboard | Ambros Admin Panel',
            'categories_count' => count($categories),
            'products_count' => count($products),
            'enquiries_count' => count($enquiries),
            'new_enquiries_count' => $newEnquiriesCount,
            'recent_enquiries' => array_slice(array_reverse($enquiries), 0, 5),
            'recent_products' => array_slice($products, 0, 5),
            'active_tab' => 'dashboard'
        ]);
    }

    /* -------------------------------------------------------------
     * CATEGORIES MANAGEMENT
     * ------------------------------------------------------------- */
    public function categories()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $categories = $this->categoryModel->getAllCategories();

        return view('admin/categories/index', [
            'title' => 'Lab Categories Management | Ambros Admin',
            'categories' => $categories,
            'active_tab' => 'categories'
        ]);
    }

    public function createCategory()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        return view('admin/categories/form', [
            'title' => 'Add New Laboratory Category | Ambros Admin',
            'category' => null,
            'action_url' => base_url('admin/categories/store'),
            'active_tab' => 'categories'
        ]);
    }

    public function storeCategory()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $title = $this->request->getPost('title');
        $slug = $this->request->getPost('slug') ?: url_title(strtolower($title), '-', true);

        $outcomesRaw = $this->request->getPost('learning_outcomes') ?? '';
        $outcomes = array_filter(array_map('trim', explode("\n", $outcomesRaw)));

        // Image handling (upload or URL/path fallback)
        $heroImg = $this->request->getPost('hero_img') ?: 'assets/images/refrigeration-lab.jpg';
        $uploadedFile = $this->request->getFile('hero_img_file');
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $targetDir = FCPATH . 'uploads/categories';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $uploadedFile->move($targetDir, $newName);
            $heroImg = 'uploads/categories/' . $newName;
        }

        $data = [
            'slug' => $slug,
            'num' => $this->request->getPost('num') ?: '00',
            'title' => $title,
            'subtitle' => $this->request->getPost('subtitle'),
            'hero_img' => $heroImg,
            'desc' => $this->request->getPost('desc'),
            'learning_outcomes' => $outcomes,
        ];

        $this->categoryModel->saveCategory($data);
        return redirect()->to('/admin/categories')->with('success', 'Laboratory category added successfully!');
    }

    public function editCategory(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $category = $this->categoryModel->getCategory($slug);
        if (!$category) {
            return redirect()->to('/admin/categories')->with('error', 'Category not found.');
        }

        return view('admin/categories/form', [
            'title' => 'Edit Category: ' . $category['title'],
            'category' => $category,
            'action_url' => base_url('admin/categories/update/' . $slug),
            'active_tab' => 'categories'
        ]);
    }

    public function updateCategory(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $category = $this->categoryModel->getCategory($slug);
        if (!$category) {
            return redirect()->to('/admin/categories')->with('error', 'Category not found.');
        }

        $title = $this->request->getPost('title');
        $outcomesRaw = $this->request->getPost('learning_outcomes') ?? '';
        $outcomes = array_filter(array_map('trim', explode("\n", $outcomesRaw)));

        // Image handling (upload or existing/URL fallback)
        $heroImg = $this->request->getPost('hero_img') ?: ($category['hero_img'] ?? 'assets/images/refrigeration-lab.jpg');
        $uploadedFile = $this->request->getFile('hero_img_file');
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $targetDir = FCPATH . 'uploads/categories';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $uploadedFile->move($targetDir, $newName);
            $heroImg = 'uploads/categories/' . $newName;
        }

        $data = [
            'slug' => $slug,
            'num' => $this->request->getPost('num'),
            'title' => $title,
            'subtitle' => $this->request->getPost('subtitle'),
            'hero_img' => $heroImg,
            'desc' => $this->request->getPost('desc'),
            'learning_outcomes' => $outcomes,
        ];

        $this->categoryModel->saveCategory($data);
        return redirect()->to('/admin/categories')->with('success', 'Laboratory category updated successfully!');
    }

    public function deleteCategory(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $this->categoryModel->deleteCategory($slug);
        return redirect()->to('/admin/categories')->with('success', 'Category removed successfully.');
    }

    /* -------------------------------------------------------------
     * PRODUCTS MANAGEMENT
     * ------------------------------------------------------------- */
    public function products()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        return view('admin/products/index', [
            'title' => 'Apparatus & Products Management | Ambros Admin',
            'products' => $products,
            'categories' => $categories,
            'active_tab' => 'products'
        ]);
    }

    public function createProduct()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $categories = $this->categoryModel->getAllCategories();

        return view('admin/products/form', [
            'title' => 'Add New Product / Test Rig | Ambros Admin',
            'product' => null,
            'categories' => $categories,
            'action_url' => base_url('admin/products/store'),
            'active_tab' => 'products'
        ]);
    }

    public function storeProduct()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $name = $this->request->getPost('name');
        $slug = $this->request->getPost('slug') ?: url_title(strtolower($name), '-', true);
        $catSlug = $this->request->getPost('category_slug');
        $category = $this->categoryModel->getCategory($catSlug);

        $expRaw = $this->request->getPost('experiments') ?? '';
        $experiments = array_filter(array_map('trim', explode("\n", $expRaw)));

        // Parse specifications key: value
        $specRaw = $this->request->getPost('specifications') ?? '';
        $specifications = [];
        foreach (explode("\n", $specRaw) as $line) {
            if (strpos($line, ':') !== false) {
                [$k, $v] = explode(':', $line, 2);
                $specifications[trim($k)] = trim($v);
            } elseif (trim($line)) {
                $specifications['Spec ' . (count($specifications) + 1)] = trim($line);
            }
        }

        // Parse utilities key: value
        $utilRaw = $this->request->getPost('utilities') ?? '';
        $utilities = [];
        foreach (explode("\n", $utilRaw) as $line) {
            if (strpos($line, ':') !== false) {
                [$k, $v] = explode(':', $line, 2);
                $utilities[trim($k)] = trim($v);
            } elseif (trim($line)) {
                $utilities['Utility ' . (count($utilities) + 1)] = trim($line);
            }
        }

        // Image handling (upload or URL/path fallback)
        $img = $this->request->getPost('img') ?: 'assets/images/static-dynamic-balancing.jpg';
        $uploadedFile = $this->request->getFile('img_file');
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $targetDir = FCPATH . 'uploads/products';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $uploadedFile->move($targetDir, $newName);
            $img = 'uploads/products/' . $newName;
        }

        $data = [
            'slug' => $slug,
            'code' => $this->request->getPost('code') ?: '1100',
            'name' => $name,
            'category_slug' => $catSlug,
            'category_name' => $category['title'] ?? 'Engineering Lab',
            'img' => $img,
            'badge' => $this->request->getPost('badge') ?: 'ISO 9001:2015 Precision Calibrated',
            'overview' => $this->request->getPost('overview'),
            'experiments' => $experiments,
            'utilities' => $utilities,
            'specifications' => $specifications,
        ];

        $this->productModel->saveProduct($data);
        return redirect()->to('/admin/products')->with('success', 'Product / Apparatus saved successfully!');
    }

    public function editProduct(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $product = $this->productModel->getProduct($slug);
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Product not found.');
        }

        $categories = $this->categoryModel->getAllCategories();

        return view('admin/products/form', [
            'title' => 'Edit Product: ' . $product['name'],
            'product' => $product,
            'categories' => $categories,
            'action_url' => base_url('admin/products/update/' . $slug),
            'active_tab' => 'products'
        ]);
    }

    public function updateProduct(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $product = $this->productModel->getProduct($slug);
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Product not found.');
        }

        $name = $this->request->getPost('name');
        $catSlug = $this->request->getPost('category_slug');
        $category = $this->categoryModel->getCategory($catSlug);

        $expRaw = $this->request->getPost('experiments') ?? '';
        $experiments = array_filter(array_map('trim', explode("\n", $expRaw)));

        $specRaw = $this->request->getPost('specifications') ?? '';
        $specifications = [];
        foreach (explode("\n", $specRaw) as $line) {
            if (strpos($line, ':') !== false) {
                [$k, $v] = explode(':', $line, 2);
                $specifications[trim($k)] = trim($v);
            } elseif (trim($line)) {
                $specifications['Spec ' . (count($specifications) + 1)] = trim($line);
            }
        }

        $utilRaw = $this->request->getPost('utilities') ?? '';
        $utilities = [];
        foreach (explode("\n", $utilRaw) as $line) {
            if (strpos($line, ':') !== false) {
                [$k, $v] = explode(':', $line, 2);
                $utilities[trim($k)] = trim($v);
            } elseif (trim($line)) {
                $utilities['Utility ' . (count($utilities) + 1)] = trim($line);
            }
        }

        // Image handling (upload or existing/URL fallback)
        $img = $this->request->getPost('img') ?: ($product['img'] ?? 'assets/images/static-dynamic-balancing.jpg');
        $uploadedFile = $this->request->getFile('img_file');
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $targetDir = FCPATH . 'uploads/products';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $uploadedFile->move($targetDir, $newName);
            $img = 'uploads/products/' . $newName;
        }

        $data = [
            'slug' => $slug,
            'code' => $this->request->getPost('code'),
            'name' => $name,
            'category_slug' => $catSlug,
            'category_name' => $category['title'] ?? 'Engineering Lab',
            'img' => $img,
            'badge' => $this->request->getPost('badge'),
            'overview' => $this->request->getPost('overview'),
            'experiments' => $experiments,
            'utilities' => $utilities,
            'specifications' => $specifications,
        ];

        $this->productModel->saveProduct($data);
        return redirect()->to('/admin/products')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct(string $slug)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $this->productModel->deleteProduct($slug);
        return redirect()->to('/admin/products')->with('success', 'Product removed successfully.');
    }

    /* -------------------------------------------------------------
     * ENQUIRIES MANAGEMENT
     * ------------------------------------------------------------- */
    public function enquiries()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $enquiries = $this->loadEnquiries();
        $statusFilter = $this->request->getGet('status');

        if ($statusFilter && $statusFilter !== 'all') {
            $enquiries = array_filter($enquiries, function ($e) use ($statusFilter) {
                return ($e['status'] ?? 'new') === $statusFilter;
            });
        }

        return view('admin/enquiries/index', [
            'title' => 'Enquiry & Quotation Management | Ambros Admin',
            'enquiries' => array_reverse($enquiries),
            'current_filter' => $statusFilter ?: 'all',
            'active_tab' => 'enquiries'
        ]);
    }

    public function updateEnquiryStatus()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $id = $this->request->getPost('id');
        $newStatus = $this->request->getPost('status');

        $enquiries = $this->loadEnquiries();
        foreach ($enquiries as &$e) {
            if (($e['id'] ?? '') === $id) {
                $e['status'] = $newStatus;
                break;
            }
        }

        $this->saveEnquiries($enquiries);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Status updated.']);
        }

        return redirect()->to('/admin/enquiries')->with('success', 'Enquiry status updated.');
    }

    public function deleteEnquiry(string $id)
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $enquiries = $this->loadEnquiries();
        $enquiries = array_values(array_filter($enquiries, function ($e) use ($id) {
            return ($e['id'] ?? '') !== $id;
        }));

        $this->saveEnquiries($enquiries);
        return redirect()->to('/admin/enquiries')->with('success', 'Enquiry record deleted.');
    }

    public function exportEnquiries()
    {
        if ($redirect = $this->checkAuth())
            return $redirect;

        $enquiries = $this->loadEnquiries();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Ambros_enquiries_' . date('Y-m-d') . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Date', 'Name', 'Email', 'Phone', 'Country', 'City', 'Product Code', 'Product Name', 'Category', 'Message', 'Status', 'IP']);

        foreach ($enquiries as $e) {
            fputcsv($output, [
                $e['id'] ?? '',
                $e['created_at'] ?? '',
                $e['name'] ?? '',
                $e['email'] ?? '',
                $e['phone'] ?? '',
                $e['country'] ?? '',
                $e['city'] ?? '',
                $e['product_code'] ?? '',
                $e['product_name'] ?? '',
                $e['category'] ?? '',
                $e['message'] ?? '',
                $e['status'] ?? 'new',
                $e['ip_address'] ?? ''
            ]);
        }

        fclose($output);
        exit;
    }

    /* -------------------------------------------------------------
     * HELPER METHODS
     * ------------------------------------------------------------- */
    private function loadEnquiries(): array
    {
        $logPath = WRITEPATH . 'enquiries.json';
        if (file_exists($logPath)) {
            $data = json_decode(file_get_contents($logPath), true);
            if (is_array($data)) {
                // Ensure every entry has an ID
                foreach ($data as $idx => &$item) {
                    if (empty($item['id'])) {
                        $item['id'] = 'ENQ-' . ($idx + 1001);
                    }
                    if (empty($item['status'])) {
                        $item['status'] = 'new';
                    }
                }
                return $data;
            }
        }
        return [];
    }

    private function saveEnquiries(array $data): bool
    {
        $logPath = WRITEPATH . 'enquiries.json';
        return file_put_contents($logPath, json_encode($data, JSON_PRETTY_PRINT)) !== false;
    }
}
