<?php include_once("header.php");?>

<!-- List SP -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Danh sách sản phẩm</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá Sản Phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Xóa</th>
                                    <th scope="col">Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                        require('db.php');
                        $sql = "SELECT * FROM sanpham";
                        $data = $conn->query($sql);
                        while($row=$data->fetch()){ ?>
                        <tr>
                            <td><?php echo $row['id_sp']; ?></td>
                            <td><?php echo $row['name_sp']; ?></td>
                            <td><?php echo $row['gia_sp']; ?></td>
                            <td><img width="70%" src="<?php echo $row['img_sp']; ?>" alt=""></td>
                            <td><?php echo $row['mota_sp']; ?></td>
                            <td><a class="btn btn-outline-primary m-2" href="delete.php?id=<?php echo $row['id_sp']; ?>">Xóa</a></td>
                            <td><a class="btn btn-outline-primary m-2" href="edit.php?id=<?php echo $row['id_sp']; ?>">Sửa</a></td>
                        </tr>
                        
                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


<!-- List SP end -->

<?php include_once("footer.php");?>