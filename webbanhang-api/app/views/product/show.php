<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-darkgreen text-white rounded-3">
            <h2 class="mb-0">
                <?php echo htmlspecialchars($product->name ?? 'Sản phẩm không có tên', ENT_QUOTES, 'UTF-8'); ?>
            </h2>
        </div>
        <div class="card-body">
            <!-- Hiển thị hình ảnh -->
            <?php if (!empty($product->image)): ?>
                <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                    class="img-fluid rounded mx-auto d-block mb-4" alt="Product Image" style="max-height: 300px;">
            <?php else: ?>
                <p class="text-muted text-center">Không có hình ảnh</p>
            <?php endif; ?>

            <!-- Thông tin sản phẩm -->
            <p><strong>Mô tả:</strong>
                <?php echo nl2br(htmlspecialchars($product->description ?? 'Không có mô tả', ENT_QUOTES, 'UTF-8')); ?>
            </p>
            <p class="text-primary font-weight-bold">
                <i class="fas fa-dollar-sign"></i> Giá:
                <?php echo number_format($product->price ?? 0, 0, ',', '.'); ?> VND
            </p>
            <p class="text-muted">Danh mục:
                <?php echo htmlspecialchars($product->category_name ?? 'Không có danh mục', ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <!-- Nút thêm vào giỏ hàng -->
            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-lg mt-3">Thêm
                vào
                giỏ hàng</a>

            <!-- Nút quay lại -->
            <a href="/webbanhang/Product" class="btn btn-secondary btn-lg mt-3">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
            </a>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>