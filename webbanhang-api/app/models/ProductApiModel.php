<?php
require_once 'Database.php'; // Giả sử bạn có một file để kết nối DB

class ProductApiModel
{
    private $conn;
    private $table_name = "product";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Get all products
    public function getProducts()
    {
        $query = "SELECT p.id, p.name, p.description, p.price, p.image, c.name as category_name
                  FROM " . $this->table_name . " p
                  LEFT JOIN category c ON p.category_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode(["products" => $result]);
    }

    // Get a single product by ID
    public function getProductById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode(["product" => $result ?: "Not found"]);
    }

    // Add a new product
    /*
    public function addProduct($data)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, description, price, category_id, image)
                  VALUES (:name, :description, :price, :category_id, :image)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':image', $data['image']);

        if ($stmt->execute()) {
            return json_encode(["message" => "Product created successfully"]);
        }

        return json_encode(["error" => "Failed to create product"]);
    }
    */
    public function addProduct($data)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, description, price, category_id, image)
              VALUES (:name, :description, :price, :category_id, :image)";
        $stmt = $this->conn->prepare($query);

        // Kiểm tra image, nếu không có thì để rỗng
        $image = !empty($data['image']) ? $data['image'] : "uploads/default.png";

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':image', $image); // Cập nhật image

        if ($stmt->execute()) {
            return json_encode(["message" => "Product created successfully"]);
        }

        return json_encode(["error" => "Failed to create product"]);
    }
    // Update a product
    public function updateProduct($id, $data)
    {
        $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, price=:price, category_id=:category_id, image=:image 
                  WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':image', $data['image']);

        if ($stmt->execute()) {
            return json_encode(["message" => "Product updated successfully"]);
        }

        return json_encode(["error" => "Failed to update product"]);
    }

    // Delete a product
    public function deleteProduct($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return json_encode(["message" => "Product deleted successfully"]);
        }

        return json_encode(["error" => "Failed to delete product"]);
    }
}
?>