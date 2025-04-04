<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-darkgreen text-white rounded-3">
            <h2 class="mb-0">✏️ Chỉnh sửa danh mục</h2>
        </div>
        <div class="card-body">
            <!-- Hiển thị lỗi -->
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

            <form method="POST" action="/webbanhang/Category/update" onsubmit="return validateCategoryForm();">
                <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

                <!-- Tên danh mục -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">
                        <i class="fas fa-folder"></i> Tên danh mục:
                    </label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                        value="<?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <!-- Mô tả danh mục -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label">
                        <i class="fas fa-info-circle"></i> Mô tả:
                    </label>
                    <textarea id="description" name="description" class="form-control form-control-lg"
                        required><?php echo htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <!-- Nút thao tác -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-darkgreen btn-lg px-5">
                        <i class="fas fa-save"></i> Lưu thay đổi
                    </button>
                    <a href="/webbanhang/Category" class="btn btn-secondary btn-lg px-5">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    function validateCategoryForm() {
        var name = document.getElementById("name").value.trim();
        if (name === "") {
            alert("Tên danh mục không được để trống.");
            return false;
        }
        return true;
    }
</script>

<!-- CSS tùy chỉnh -->
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

    .form-control {
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    .form-control:focus {
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
</style>