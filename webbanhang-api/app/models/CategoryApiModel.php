<?php
require_once 'Database.php';
require_once 'CategoryModel.php';

header("Content-Type: application/json; charset=UTF-8");
$db = (new Database())->getConnection();
$categoryModel = new CategoryModel($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $category = $categoryModel->getCategoryById($_GET['id']);
            echo json_encode($category ?: ["message" => "Danh mục không tồn tại"]);
        } else {
            echo json_encode($categoryModel->getCategories());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['name'], $data['description'])) {
            $result = $categoryModel->addCategory($data['name'], $data['description']);
            echo json_encode($result === true ? ["message" => "Danh mục đã được tạo"] : $result);
        } else {
            echo json_encode(["message" => "Dữ liệu không hợp lệ"]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'], $data['name'], $data['description'])) {
            $result = $categoryModel->updateCategory($data['id'], $data['name'], $data['description']);
            echo json_encode($result ? ["message" => "Danh mục đã được cập nhật"] : ["message" => "Không thể cập nhật danh mục"]);
        } else {
            echo json_encode(["message" => "Dữ liệu không hợp lệ"]);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (isset($data['id'])) {
            $result = $categoryModel->deleteCategory($data['id']);
            echo json_encode($result ? ["message" => "Danh mục đã bị xóa"] : ["message" => "Không thể xóa danh mục"]);
        } else {
            echo json_encode(["message" => "ID không hợp lệ"]);
        }
        break;

    default:
        echo json_encode(["message" => "Phương thức không được hỗ trợ"]);
        break;
}
?>