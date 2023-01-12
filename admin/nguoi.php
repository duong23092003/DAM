<?php include_once("header.php");?>

<!-- List SP -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Danh sách người dùng</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tên Người Dùng</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                        require('db.php');
                        $sql = "SELECT * FROM user";
                        $data = $conn->query($sql);
                        while($row=$data->fetch()){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php echo $row['diachi']; ?></td>
                            <td><a class="btn btn-outline-primary m-2" href="remove_user.php?id=<?php echo $row['id']; ?>">Xóa</a></td>
                        </tr>
                        
                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


<!-- List SP end -->

<?php include_once("footer.php");?>