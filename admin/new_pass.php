<?php include('db.php'); 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="imga/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>New Password</h3>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $err = array();
                            if($_POST['confirm'] != $_POST['new_pas']) {
                                $err['fail'] = 'Wrong password';
                            } else {
                                $err['success'] = 'Change password successfully!';
                                $user->forgetPass($_POST['new_pas'], $_SESSION['mail']);
                                header('signin.php');
                            }
                        }
                        ?>
                        <div>
                            <?php if(isset($err['fail'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $err['fail']?>
                                </div>
                            <?php elseif($err['success']): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $err['success']?>
                                </div>
                            <?php else : ?>
                                <div class="alert alert-danger" role="alert">
                                    Change new password!
                                </div>
                            <?php endif; ?>
                        </div>

                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" value="<?php if(isset($_POST['new_pass'])) echo $_POST['new_pas'] ?>" id="floatingInput" placeholder="Enter password" name="new_pas">
                                <label for="floatingInput">New Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" value="<?php if(isset($_POST['confirm'])) echo $_POST['confirm'] ?>" id="floatingPassword" placeholder="Enter password" name="confirm">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>