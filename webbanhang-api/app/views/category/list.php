<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-darkgreen text-white rounded-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0">📋 Danh sách danh mục sản phẩm</h2>
            <a href="/webbanhang/Category/add" class="btn btn-light btn-lg">
                ➕ Thêm danh mục
            </a>
        </div>
        <div class="card-body">
            <!-- Hiển thị thông báo -->
            <?php if (!empty($_SESSION['success_message'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success_message'];
                    unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>

            <!-- Bảng danh mục -->
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $index => $category): ?>
                        <tr>
                            <td>
                                <?php echo $index + 1; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <a href="/webbanhang/Category/edit/<?php echo $category['id']; ?>"
                                    class="btn btn-warning btn-sm">
                                    ✏️ Sửa
                                </a>
                                <a href="/webbanhang/Category/delete/<?php echo $category['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                    ❌ Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="text-center">🚫 Không có danh mục nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

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
        font-size: 1.2rem;
    }

    .table th {
        background-color: #004d40 !important;
        color: white;
    }

    .btn {
        font-size: 1rem;
        padding: 8px 15px;
        border-radius: 10px;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 100, 0, 0.2);
    }
</style>