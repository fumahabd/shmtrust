<?php
namespace App\Models;

use App\Config\Database;

class Service
{
    private $serviceTable = 'services';
    protected $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }
    public function services($page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        $data = [];

        $stmt = $this->connection->prepare("SELECT * FROM {$this->serviceTable} ORDER BY sl LIMIT ? OFFSET ?
    ");
        $stmt->bind_param('ii', $limit, $offset);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function activeServices($limit = 20)
    {
        $data = [];
        $status = 1;
        $stmt = $this->connection->prepare("SELECT * FROM {$this->serviceTable} WHERE status = ? ORDER BY sl LIMIT ?");
        $stmt->bind_param('ii', $status, $limit);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function get($id) {
        $stmt = $this->connection->prepare("SELECT * FROM {$this->serviceTable} WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        return $row ?: null; // return null if not found
    }
    public function store($data){
        $result = $this->connection->query("SELECT MAX(sl) AS max_sl FROM {$this->serviceTable}");
        $row = $result->fetch_assoc();
        $nextSl = ($row['max_sl'] ?? 0) + 1;

        $stmt = $this->connection->prepare("INSERT INTO {$this->serviceTable} (title, text, icon, sl) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $stmt->bind_param('sssi', $data['title'], $data['text'], $data['icon'], $nextSl);
        if ($stmt->execute()) {
            $insertedId = $stmt->insert_id;
            return ['success' => true, 'id' => $insertedId, 'sl' => $nextSl];
        } else {
            return ['success'=>false,'error' => $stmt->error];
        }
    }
    public function update($data){
        $stmt = $this->connection->prepare("UPDATE {$this->serviceTable} 
        SET title = ?, text = ?, icon = ? WHERE id = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $stmt->bind_param('sssi', $data['title'], $data['text'], $data['icon'], $data['id']);
        if ($stmt->execute()) {
            $fetchStmt = $this->connection->prepare("SELECT * FROM {$this->serviceTable} WHERE id = ?");
            if ($fetchStmt === false) {
                die('Prepare failed: ' . htmlspecialchars($this->connection->error));
            }
            $fetchStmt->bind_param('i', $data['id']);
            $fetchStmt->execute();
            $result = $fetchStmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return ['success' => true, 'data'=>$row];
            }
        } else {
            return ['success'=>false,'error' => $stmt->error];
        }
    }
    public function delete($id)
    {
        $fetchStmt = $this->connection->prepare("SELECT icon FROM {$this->serviceTable} WHERE id = ?");
        if ($fetchStmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $fetchStmt->bind_param('i', $id);
        $fetchStmt->execute();
        $result = $fetchStmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['icon'];
            $realPath = realpath($imagePath);
            if ($realPath && file_exists($realPath)) {
                unlink($realPath);
            }
        } else {
            return ['success' => false, 'message' => 'Record not found!'];
        }
        $deleteStmt = $this->connection->prepare("DELETE FROM {$this->serviceTable} WHERE id = ?");
        if ($deleteStmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $deleteStmt->bind_param('i', $id);
        if ($deleteStmt->execute()) {
            if ($deleteStmt->affected_rows > 0) {
                return ['success' => true, 'message' => 'Record and image deleted successfully!'];
            } else {
                return ['success' => false, 'message' => 'Failed to delete the record!'];
            }
        } else {
            return ['success' => false, 'message' => 'Delete query failed!'];
        }
    }
    public function deletePrevFile($id, $dir){
        $fetchStmt = $this->connection->prepare("SELECT icon FROM {$this->serviceTable} WHERE id = ?");
        if ($fetchStmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $fetchStmt->bind_param('i', $id);
        $fetchStmt->execute();
        $result = $fetchStmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['icon'];
            $realPath = realpath($imagePath);
            if ($realPath && file_exists($realPath)) {
                unlink($realPath);
            }
        } else {
            return ['success' => false, 'message' => 'Record not found!'];
        }
    }
    public function changeStatus($data){
        $fetchStmt = $this->connection->prepare("SELECT * FROM {$this->serviceTable} WHERE id = ?");
        if ($fetchStmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
        $fetchStmt->bind_param('i', $data['id']);
        $fetchStmt->execute();
        $result = $fetchStmt->get_result();
        if ($result->num_rows > 0) {
            $stmt = $this->connection->prepare("UPDATE {$this->serviceTable} 
            SET status = ? WHERE id = ?");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($this->connection->error));
            }
            $stmt->bind_param('si', $data['status'], $data['id']);
            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Service Status Updated Successfully !'];
            }
        }else{
            return ['success' => true, 'message' => 'Service Not Found !'];
        }
    }
}