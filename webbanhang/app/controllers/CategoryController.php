<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        include 'app/views/category/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory($name, $description);

            if ($result === true) {
                header('Location: /webbanhang/Category');
            } else {
                $errors = $result;
                include 'app/views/category/add.php';
            }
        }
    }

    /*    public function edit($id)
        {
            $category = $this->categoryModel->getCategoryById($id);
            if ($category) {
                include 'app/views/category/edit.php';
            } else {
                echo "Không thấy danh mục.";
            }
        }*/
    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);

        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            die("❌ Lỗi: Không tìm thấy danh mục có ID: " . htmlspecialchars($id, ENT_QUOTES, 'UTF-8'));
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $edit = $this->categoryModel->updateCategory($id, $name, $description);

            if ($edit) {
                header('Location: /webbanhang/Category');
            } else {
                echo "Đã xảy ra lỗi khi lưu danh mục.";
            }
        }
    }

    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /webbanhang/Category');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }

}
?>