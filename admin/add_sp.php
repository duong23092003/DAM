<?php include_once("header.php"); ?>
<?php
$name_product = isset($_POST['name']) ? $_POST['name'] : "";
$cost_product = isset($_POST['cost']) ? $_POST['cost'] : "";
$image = isset($_FILES["image"]) ? $_FILES["image"] : "";
$mota = isset($_POST['mota']) ? $_POST['mota'] : "";
$err = [];
if (isset($_POST['name'])) {
    if ($name_product == "") {
        array_push($err, 'Bạn chưa nhập danh mục');
    }
    if ($cost_product == "") {
        array_push($err, 'Bạn chưa nhập danh mục');
    }
    if ($mota == "") {
        array_push($err, 'Bạn chưa nhập danh mục');
    }
    if ($_FILES['image']['error'] > 0) {
        echo "File Upload Bị Lỗi";
    } else {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_path = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        if (strlen(strstr($file_type, 'image')) > 0) {
            if ((round($file_size / 1024, 0)) <= 10240) {
                $now = DateTime::createFromFormat('U.u', microtime(true));
                $result = $now->format("m_d_Y_H_i_s_u");
                $krr    = explode('_', $result);
                $result = implode("", $krr);
               
                move_uploaded_file($_FILES['image']['tmp_name'], 'imga/' . $result . $file_name);
                $image = $result . $file_name;
            } else {
                echo "Vui lòng nhập file < 10MB";
               
            }
        } else {
            echo "Vui lòng nhập file định dạng là ảnh";
        }
    }
}
if (isset($_POST['name']) && count($err) == 0) {
    $name_product = htmlspecialchars(addslashes(trim($name_product)));
    $cost_product = htmlspecialchars(addslashes(trim($cost_product)));
    $image = htmlspecialchars(addslashes(trim($image)));
    $mota = htmlspecialchars(addslashes(trim($mota)));
    require('db.php');
    $sql = "INSERT INTO sanpham (name_sp, gia_sp, img_sp, mota_sp) VALUES ('$name_product','$cost_product','$image','$mota')";
    $conn->exec($sql);
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
}
?>


<!-- Thêm SP -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-left rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Thêm sản phẩm</h6>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá Sản Phẩm</label>
                <input type="text" name="cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                <textarea type="text" name="mota" class="form-control" id="exampleInputEmail1" style="height: 100px" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Thêm hình ảnh</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <?php if (count($err) > 0) { ?>
                <ul class="alert alert-danger">
                    <?php foreach ($err as $value) {
                    ?>
                        <li><?php echo $value ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
        </form>
    </div>
</div>

<!-- Thêm SP end -->

<?php include_once("footer.php"); ?>