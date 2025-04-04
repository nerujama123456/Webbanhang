<?php
include 'app/views/shares/header.php';

// Kiểm tra quyền truy cập
if (!SessionHelper::isAdmin()) {
    header("Location: /webbanhang/Product/");
    exit();
}
?>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-darkgreen text-white rounded-3">
            <h2 class="mb-0">Thêm sản phẩm mới</h2>
        </div>
        <div class="card-body">
            <!-- Hiển thị lỗi nếu có -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger fade show" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li>
                                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data"
                onsubmit="return validateForm();">
                <!-- Tên sản phẩm -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">
                        <i class="fas fa-tag"></i> Tên sản phẩm:
                    </label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                        placeholder="Nhập tên sản phẩm" required>
                </div>

                <!-- Mô tả -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label">
                        <i class="fas fa-pencil-alt"></i> Mô tả:
                    </label>
                    <textarea id="description" name="description" class="form-control form-control-lg"
                        placeholder="Mô tả sản phẩm" required></textarea>
                </div>

                <!-- Giá -->
                <div class="form-group mb-4">
                    <label for="price" class="form-label">
                        <i class="fas fa-dollar-sign"></i> Giá:
                    </label>
                    <input type="number" id="price" name="price" class="form-control form-control-lg" step="0.01"
                        placeholder="Giá sản phẩm" required>
                </div>

                <!-- Danh mục -->
                <div class="form-group mb-4">
                    <label for="category_id" class="form-label">
                        <i class="fas fa-box"></i> Danh mục:
                    </label>
                    <select id="category_id" name="category_id" class="form-select form-select-lg" required>
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group mb-4">
                    <label for="image" class="form-label">
                        <i class="fas fa-camera"></i> Hình ảnh:
                    </label>
                    <input type="file" id="image" name="image" class="form-control-file"
                        accept="image/jpeg, image/png, image/gif">
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-darkgreen btn-lg px-5">
                        <i class="fas fa-check-circle"></i> Thêm sản phẩm
                    </button>
                    <a href="/webbanhang/Product" class="btn btn-secondary btn-lg px-5">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    function validateForm() {
        var price = document.getElementById("price").value;
        if (isNaN(price) || price <= 0) {
            alert("Giá phải là một số dương.");
            return false;
        }
        return true;
    }
</script>

<!-- Custom CSS -->
<style>
    .card {
        background-color: #ffffff;
        border-radius: 15px;
    }

    .card-header {
        background-color: #006400;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        padding: 40px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: 0 0 10px rgba(0, 100, 0, 0.5);
        border-color: #006400;
    }

    .btn {
        font-size: 1.1rem;
        padding: 12px 30px;
        border-radius: 25px;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 100, 0, 0.2);
    }

    .alert {
        font-size: 1rem;
        border-radius: 8px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group i {
        margin-right: 10px;
    }
</style>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>