<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController
{    
    public function loadProductPaginate() {
        header('Content-type: application/json');
        $page = $_GET['page'];
        $limit = $_GET['limit'];
        $product = new Product();
        $products = $product->products($page, $limit);
        echo json_encode(['success' => true, 'data' => $products]);
    }
    public function productModal(){
        $id = $_GET['dataId'] ?? null;
        $mode = $_GET['mode'] ?? 'add';
        $data = [];
        if($id && $mode=='edit'){
            $product = new Product();
            $data = $product->get($id) ?? [];
        }
        view('admin.product-modal', ['mode'=>$mode, 'product'=>$data]);
    }
    public function store(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/products/';
        $image_max_size = 5 * 1024 * 1024; // 5 MB
        $allowed_image_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!empty($_FILES['image']['name'])) {
            $image = [
                'name' => $_FILES['image']['name'],
                'type' => $_FILES['image']['type'],
                'tmp_name' => $_FILES['image']['tmp_name'],
                'error' => $_FILES['image']['error'],
                'size' => $_FILES['image']['size']
            ];
            $filename = uploadFile($image, $image_upload_dir, $allowed_image_types, $image_max_size);
            if (!$filename) {
                $_SESSION['error'][] = "Failed to upload image!";
                return 0;
            }
            $data['image'] = $filename;
            $service = new Product();
            $res = $service->store($data);
            if ($res['success']) {
                $data["id"]=$res['id'];
                $data["sl"]=$res['sl'];
                $data['status']= 1;
                echo json_encode(['success' => true, 'message' => 'Product Added Successfully !', 'data' => $data]);
            }
        }
    }
    public function update(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/products/';
        $image_max_size = 5 * 1024 * 1024; // 5 MB
        $allowed_image_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $previousImage = $data['previousImage'] ?? "";
        $productImageName = '';
        $products = new Product();
        if (empty($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Product ID is required!']);
            return;
        }
        if (!$previousImage && empty($_FILES['image']['name'])) {
            echo json_encode(['success' => false, 'message' => 'Image is required!']);
            return;
        }
        if (!empty($_FILES['image']['name'])) {
            $image = [
                'name' => $_FILES['image']['name'],
                'type' => $_FILES['image']['type'],
                'tmp_name' => $_FILES['image']['tmp_name'],
                'error' => $_FILES['image']['error'],
                'size' => $_FILES['image']['size']
            ];
            $productImageName = uploadFile($image, $image_upload_dir, $allowed_image_types, $image_max_size);
            $products->deletePrevFile($data["id"],$image_upload_dir);
        } else {
            $productImageName = explode('/storage/products/', $previousImage)[1];
            $productImageName= 'storage/products/'.$productImageName;
        }
        try {
            $data['image'] = $productImageName;
            $res = $products->update($data);
            if ($res['success']) {
                echo json_encode(['success' => true, 'message' => 'Product Added Successfully !', 'data' => $res['data']]);
            }else{
                echo json_encode(['success' => false, 'message' => 'Product update failed!']);
            }
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'message' => 'Error updating Product: ' . $th->getMessage()]);
        }        
    }
    public function delete(){
        header('Content-type: application/json');
        if (empty($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Something Wrong !']);
            return 0;
        }
        $id = sanitizeInput($_POST['id']);
        $services = new Product();
        $res = $services->delete($id);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
            return 0;
        } else {
            echo json_encode(['success' => false, 'message' => $res['message']]);
        }
    }
    public function changeProductStatus(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $service = new Product();
        $res = $service->changeStatus($data);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
        }
    }
}