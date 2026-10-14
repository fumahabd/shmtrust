<?php
namespace App\Controllers;

use App\Models\Service;

class ServiceController
{    
    public function loadServicePaginate() {
        header('Content-type: application/json');
        $page = $_GET['page'];
        $limit = $_GET['limit'];
        $service = new Service();
        $services = $service->services($page, $limit);
        echo json_encode(['success' => true, 'data' => $services]);
    }
    public function serviceModal(){
        $id = $_GET['dataId'] ?? null;
        $mode = $_GET['mode'] ?? 'add';
        $data = [];
        if($id && $mode=='edit'){
            $service = new Service();
            $data = $service->get($id) ?? [];
        }
        view('admin.service-modal', ['mode'=>$mode, 'service'=>$data]);
    }
    public function store(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/services/';
        $image_max_size = 5 * 1024 * 1024; // 5 MB
        $allowed_image_types = ['image/svg+xml'];
        if (!empty($_FILES['icon']['name'])) {
            $image = [
                'name' => $_FILES['icon']['name'],
                'type' => $_FILES['icon']['type'],
                'tmp_name' => $_FILES['icon']['tmp_name'],
                'error' => $_FILES['icon']['error'],
                'size' => $_FILES['icon']['size']
            ];
            $filename = uploadFile($image, $image_upload_dir, $allowed_image_types, $image_max_size);
            if (!$filename) {
                $_SESSION['error'][] = "Failed to upload image!";
                return 0;
            }
            $data['icon'] = $filename;
            $service = new Service();
            $res = $service->store($data);
            if ($res['success']) {
                $data["id"]=$res['id'];
                $data["sl"]=$res['sl'];
                $data['status']= 1;
                echo json_encode(['success' => true, 'message' => 'Service Added Successfully !', 'data' => $data]);
            }
        }
    }
    public function update(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/services/';
        $image_max_size = 5 * 1024 * 1024; // 5 MB
        $allowed_image_types = ['image/svg+xml'];
        $previousIcon = $data['previousImage'] ?? "";
        $serviceIconName = '';
        $services = new Service();
        if (empty($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Service ID is required!']);
            return;
        }
        if (!$previousIcon && empty($_FILES['icon']['name'])) {
            echo json_encode(['success' => false, 'message' => 'Icon is required!']);
            return;
        }
        if (!empty($_FILES['icon']['name'])) {
            $image = [
                'name' => $_FILES['icon']['name'],
                'type' => $_FILES['icon']['type'],
                'tmp_name' => $_FILES['icon']['tmp_name'],
                'error' => $_FILES['icon']['error'],
                'size' => $_FILES['icon']['size']
            ];
            $serviceIconName = uploadFile($image, $image_upload_dir, $allowed_image_types, $image_max_size);
            $services->deletePrevFile($data["id"],$image_upload_dir);
        } else {
            $serviceIconName = explode('/storage/services/', $previousIcon)[1];
            $serviceIconName= 'storage/services/'.$serviceIconName;
        }
        try {
            $data['icon'] = $serviceIconName;
            $res = $services->update($data);
            if ($res['success']) {
                echo json_encode(['success' => true, 'message' => 'Service Added Successfully !', 'data' => $res['data']]);
            }else{
                echo json_encode(['success' => false, 'message' => 'Service update failed!']);
            }
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'message' => 'Error updating service: ' . $th->getMessage()]);
        }        
    }
    public function delete(){
        header('Content-type: application/json');
        if (empty($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Something Wrong !']);
            return 0;
        }
        $id = sanitizeInput($_POST['id']);
        $services = new Service();
        $res = $services->delete($id);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
            return 0;
        } else {
            echo json_encode(['success' => false, 'message' => $res['message']]);
        }
    }
    public function changeServiceStatus(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $service = new Service();
        $res = $service->changeStatus($data);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
        }
    }
}