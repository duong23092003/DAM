<?php
session_start();
ob_start();
$nameUser = null;

if (isset($_SESSION['trangThai'])) {
    $nameUser = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="imga/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="liba/animate/animate.min.css" rel="stylesheet">
    <link href="liba/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="cssa/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="cssa/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                    <div class="nav-item dropdown">
                        <a href="signin.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <small class="fa fa-user text-body"><span class="d-none d-lg-inline-flex"><?php echo "&nbsp;" . $nameUser ?></span></small>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <?php
                            if (isset($nameUser)) { ?>
                                <form action="logout.php" method="post">
                                    <button button name="btn-logout" class="dropdown-item" type="submit">Đăng xuất</button>
                                </form>
                            <?php } else { ?>
                                <a href="signin.php" class="dropdown-item">Đăng nhập</a>
                                <a href="signup.php" class="dropdown-item">Đăng ký</a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-2" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        require("db.php");
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }

                        $offset = 4 * ($page - 1);
                        $stmt = $conn->query("select * from sanpham limit 4 offset $offset ");
                        $result = $stmt->fetchAll((PDO::FETCH_NUM));
                        foreach ($result as $row) {
                        ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="<?php echo $row[3] ?>" alt="">
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?php echo $row[1] ?></a>
                                        <span class="text-primary me-1"><?php echo $row[2] ?></span>
                                        <span class="text-body text-decoration-line-through">$29.00</span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="linkPage">
                        <?php
                        $stmt1 = $conn->query("select * from sanpham");
                        if ($page == 1) {
                            $pre = ceil($stmt1->rowCount() / 4);
                            $nt = $page + 1;
                        } elseif ($page == ceil($stmt1->rowCount() / 4)) {
                            $pre = $page - 1;
                            $nt = 1;
                        } else {
                            $pre = $page - 1;
                            $nt = $page + 1;
                        }

                        echo '<a id="linkNum" href="?page=' . $pre . '">Pre</a>';

                        for ($i = 1; $i <= ceil($stmt1->rowCount() / 4); $i++) {
                            echo '<a id="linkNum" href="?page=' . $i . '">' . $i . '</a>';
                        }

                        echo '<a id="linkNum" href="?page=' . $nt . '">Next</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="liba/wow/wow.min.js"></script>
    <script src="liba/easing/easing.min.js"></script>
    <script src="liba/waypoints/waypoints.min.js"></script>
    <script src="liba/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="jsa/main.js"></script>
</body>

</html>