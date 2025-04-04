<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm & danh mục</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background: linear-gradient(90deg, #004d40, #00695c);
            padding: 15px;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #a7ffeb !important;
        }

        .btn-custom {
            background-color: #00897b;
            color: white;
            border-radius: 30px;
            padding: 12px 25px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #00796b;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Quản lý sản phẩm & danh mục</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Mục cho tất cả người dùng -->
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/">📋 Danh sách sản phẩm</a>
                </li>

                <!-- Chỉ hiển thị nếu user là Admin -->
                <?php if (SessionHelper::isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/add">➕ Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Category/">📂 Quản lý danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Category/add">➕ Thêm danh mục</a>
                    </li>
                <?php endif; ?>

                <!-- Hiển thị tên người dùng -->
                <li class="nav-item">
                    <?php
                    if (SessionHelper::isLoggedIn()) {
                        echo "<a class='nav-link username'>👤 " . htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")</a>";
                    } else {
                        echo "<a class='nav-link' href='/webbanhang/account/login'>🔑 Đăng nhập</a>";
                    }
                    ?>
                </li>

                <!-- Nút đăng xuất nếu đã đăng nhập -->
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/webbanhang/account/logout">🚪 Đăng xuất</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Quản lý sản phẩm & danh mục</h1>
        <p>Trang quản lý sản phẩm và danh mục dành cho quản trị viên.</p>
        <a href="/webbanhang/Product/" class="btn btn-custom">📋 Danh sách sản phẩm</a>
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/webbanhang/Product/add" class="btn btn-custom">➕ Thêm sản phẩm</a>
            <a href="/webbanhang/Category/" class="btn btn-custom">📂 Quản lý danh mục</a>
            <a href="/webbanhang/Category/add" class="btn btn-custom">➕ Thêm danh mục</a>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>