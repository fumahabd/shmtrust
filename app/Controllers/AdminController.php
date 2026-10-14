<?php
namespace App\Controllers;

use App\Models\User;

class AdminController
{
    public function index()
    {
        view('admin.index');
    }
    public function updateRowOrder(){
        header("Content-Type: application/json");
        $data = json_decode(file_get_contents("php://input"), true);
        $order = $data['order'] ?? [];
        $tableName = sanitizeInput($data['arrayName'] ?? '');
        // List of allowed tables
        $myTables = ['services', 'products', 'projects'];
        // Check if the table name is valid
        if (!in_array($tableName, $myTables)) {
            echo json_encode(['success' => false, 'message' => 'Table Not Found!']);
            return; // Exit the function
        }
        $user = new User();
        $user->updateTableOrder($tableName, $order);
        echo json_encode(['success' => true, 'message' => 'Order Updated !']);
    }
}