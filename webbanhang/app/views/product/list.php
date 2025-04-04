<?php include 'app/views/shares/header.php'; ?>
<div class="container">
    <h1 class="my-4">Danh sách sản phẩm</h1>
    <a href="/webbanhang/Product/add" class="btn btn-success mb-3">Thêm sản phẩm mới</a>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                            class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <p class="text-primary font-weight-bold">Giá:
                            <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND
                        </p>
                        <p class="text-muted">Danh mục:
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>"
                            class="btn btn-warning btn-sm">Sửa</a>
                        <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                            Xóa
                        </a>
                        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>"
                            class="btn btn-primary btn-sm">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>