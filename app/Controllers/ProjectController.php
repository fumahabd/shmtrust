<?php
namespace App\Controllers;

use App\Models\Project;

class ProjectController
{    
    public function loadProjectPaginate() {
        header('Content-type: application/json');
        $page = $_GET['page'];
        $limit = $_GET['limit'];
        $project = new Project();
        $projects = $project->projects($page, $limit);
        echo json_encode(['success' => true, 'data' => $projects]);
    }
    public function projectModal(){
        $id = $_GET['dataId'] ?? null;
        $mode = $_GET['mode'] ?? 'add';
        $data = [];
        if($id && $mode=='edit'){
            $project = new Project();
            $data = $project->get($id) ?? [];
        }
        view('admin.project-modal', ['mode'=>$mode, 'project'=>$data]);
    }
    public function store(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/projects/';
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
            $service = new Project();
            $res = $service->store($data);
            if ($res['success']) {
                $data["id"]=$res['id'];
                $data["sl"]=$res['sl'];
                $data['status']= 1;
                echo json_encode(['success' => true, 'message' => 'Project Added Successfully !', 'data' => $data]);
            }
        }
    }
    public function update(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $image_upload_dir = 'storage/projects/';
        $image_max_size = 5 * 1024 * 1024; // 5 MB
        $allowed_image_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $previousImage = $data['previousImage'] ?? "";
        $projectImageName = '';
        $projects = new Project();
        if (empty($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Project ID is required!']);
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
            $projectImageName = uploadFile($image, $image_upload_dir, $allowed_image_types, $image_max_size);
            $projects->deletePrevFile($data["id"],$image_upload_dir);
        } else {
            $projectImageName = explode('/storage/projects/', $previousImage)[1];
            $projectImageName= 'storage/projects/'.$projectImageName;
        }
        try {
            $data['image'] = $projectImageName;
            $res = $projects->update($data);
            if ($res['success']) {
                echo json_encode(['success' => true, 'message' => 'Project Added Successfully !', 'data' => $res['data']]);
            }else{
                echo json_encode(['success' => false, 'message' => 'Project update failed!']);
            }
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'message' => 'Error updating Project: ' . $th->getMessage()]);
        }        
    }
    public function delete(){
        header('Content-type: application/json');
        if (empty($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Something Wrong !']);
            return 0;
        }
        $id = sanitizeInput($_POST['id']);
        $services = new Project();
        $res = $services->delete($id);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
            return 0;
        } else {
            echo json_encode(['success' => false, 'message' => $res['message']]);
        }
    }
    public function changeProjectStatus(){
        header("Content-Type: application/json");
        $data = array_map('sanitizeInput', $_POST);
        $service = new Project();
        $res = $service->changeStatus($data);
        if ($res['success']) {
            echo json_encode(['success' => true, 'message' => $res['message']]);
        }
    }
}