<?php
namespace App\Models;

use App\Config\Database;

class User
{
    public $name;
    public $role;
    public $email;
    public $error;
    private $userstable = 'users';
    protected $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }
    public function login($name, $pass, $type='admin')
    {
        $name = mysqli_real_escape_string($this->connection, $name);
        $user_password = mysqli_real_escape_string($this->connection, $pass);
        if (empty($name)) {
            return ['error' => 'Fill up Name field!'];
        }
        if (empty($user_password)) {
            return ['error' => 'Fill up Password field!'];
        }
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
        $stmt = '';
        if ($type === 'admin') {
            $stmt = $this->connection->prepare("SELECT user_id, name, email, pass, role, status FROM {$this->userstable} WHERE name = ? AND role = ? LIMIT 1");
        }
        $stmt->bind_param("ss", $name, $type);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($user_password, $row['pass'])) {
                if ($row['status'] == 1) {
                    return ['user_id' => $row['user_id']];
                } else {
                    return ['error' => 'Please Contact to Admin !'];
                }

            } else {
                return ['error' => 'Incorrect Password'];
            }
        } else {
            return ['error' => 'User Not Found!'];
        }
    }
    public function signup($data, $type = 'admin')
    {
        $pass = password_hash($data['pass'], PASSWORD_DEFAULT);
        $stmt = $this->connection->prepare("SELECT * FROM {$this->userstable} WHERE (email =? OR ip = ?)  LIMIT 1");
        $stmt->bind_param('ss', $data['email'], $data['ip']);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $_SESSION['error'][] = 'You are already Registered. Please Log In !';
            return redirect('writer');
        } else {
            // Insert new user record
            $insertStmt = $this->connection->prepare("INSERT INTO {$this->userstable} (user_id, name,  email, pass, role, ip) VALUES (?, ?, ?, ?, ?, ?)");
            if ($insertStmt === false) {
                die('Prepare failed: ' . htmlspecialchars($this->connection->error));
            }
            $insertStmt->bind_param('ssssss', $data['user_id'], $data['name'], $data['email'], $pass, $type, $data['ip']);

            if ($insertStmt->execute()) {
                return [$data['user_id'], $data['name']];
            }
        }

    }
    public function user($id)
    {
        $stmt = $this->connection->prepare("SELECT name, email, role FROM {$this->userstable} WHERE user_id = ? LIMIT 1");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->role = $row['role'];
        } else {
            $this->error = 'User Not Found!';
        }
        return $this;
    }
    public function updateTableOrder($tableName, $order) {
        foreach ($order as $item) {
            // Update each row with the new sl value
            $sql = "UPDATE $tableName SET sl = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$item['sl'], $item['id']]);
        }
    }
}