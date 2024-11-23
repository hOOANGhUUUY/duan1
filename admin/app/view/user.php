<div class="main">
                    <div class="main-category">
                        <div class="main-danhmuc">
                            <p>Người dùng</p>
                            <a href="index.php?page=addUser">+ Thêm người dùng</a>
                        </div>
                        <div class="main-header">
                            <div class="left-main-header">
                                <p>Đã chọn 3 mục</p>
                                <a href="">Xóa</a>
                            </div>
                            <div class="right-main-header">
                                <input type="text" placeholder="Tìm kiếm">
                                <div class="filter"><i class="fa-solid fa-filter"></i></div>
                                <div class="sort"><i class="fa-solid fa-arrow-down-a-z"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- Body chính (Cứ sửa những cột trong bảng, nếu dư thì cứ xóa, nó tự nhảy) -->
                    <!--không cần phải css thêm -->
                    <div class="main-product">
                        <table>
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>vai trò</th>
                                    <th>Trạng thái</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1 box -->
                                 <?php
                                 $html = '';
                                 foreach($usersDB as $item){
                                    extract($item);
                                    $html .= '
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$role.'</td>
                                            <td>'.$active.'</td>
                                            <td><a href="index.php?page=viewEditUser&id='.$id.'">Sửa</a></td>
                                        </tr>
                                    ';
                                 }
                                 echo $html;
                                 ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- button chuyển trang -->
                    <div class="main-turnpage">
                        <button class="prev">1</button>
                        <button class="next">2</button>
                        <button class="nextpage">></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>