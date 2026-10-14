<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\Search;
use App\Models\Service;

class HomeController
{
    public function index()
    {
        view('index');
    }
    public function searchKey()
    {
        $search = new Search();
        $keys = $search->keys();
        echo json_encode(['success' => true, 'searchkey' => $keys]);
    }
    public function search($key)
    {
        $key = sanitizeInput($key);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $search = new Search();
        $article = $search->search($key, $page);
        if (!empty($article)) {
            view('searchedarticle', ['article' => $article]);
        } else {
            echo 'N';
        }
    }
    public function storeKey()
    {
        $key = sanitizeInput($_POST['key']);
        $is_find = sanitizeInput($_POST['status']);
        $search = new Search();
        $search->storeKey($key, $is_find);
    }
    public function searchCategory($key)
    {
        $key = sanitizeInput($key);
        $is_find = 0;
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $search = new Search();
        $article = $search->searchCategory($key, $page);
        if (!empty($article)) {
            view('searchedarticle', ['article' => $article]);
            $is_find = 1;
        } else {
            echo 'N';
        }
        $search->storeKey($key, $is_find);
    }
    public function about()
    {
        view('about');
    }
    public function services()
    {
        $service = new Service();
        $services = $service->activeServices(20);
        view('services',['services'=>$services]);
    }
    public function products()
    {
        $product = new Product();
        $products = $product->activeProducts(20);
        view('products', ['products'=>$products]);
    }
    public function projects()
    {
        $project = new Project();
        $projects = $project->activeProjects(20);
        $ongoingProjects=$projects['ongoing']??null;
        $completedProjects=$projects['completed']??null;
        $proposedProjects=$projects['proposed']??null;
        view('projects', ['ongoingProjects'=>$ongoingProjects, 'completedProjects'=>$completedProjects, 'proposedProjects'=>$proposedProjects]);
    }
    public function academy()
    {
        view('academy');
    }
    public function doctors()
    {
        view('doctors');
    }
    public function support()
    {
        view('support');
    }
    public function gallery()
    {
        view('gallery');
    }
    public function career()
    {
        view('career');
    }
    public function contact()
    {
        view('contact');
    }
    public function terms()
    {
        view('terms');
    }
    public function privacy()
    {
        view('privacy');
    }
    public function cookie()
    {
        view('cookie');
    }
    public function notFound()
    {
        return require './pages/components/404.php';
    }
    public function accessDeined()
    {
        return require './pages/components/503.php';
    }
    public function logout()
    {
        unset($_SESSION['temp']);
        session_destroy();
        header('Location: /');
        exit();
    }
}