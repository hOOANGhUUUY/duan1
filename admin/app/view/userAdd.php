<div class="main">
                    <div class="main-category">
                        <div class="main-danhmuc">
                            <p>Thêm người dùng</p>
                            <a href="../html/adminUser.html">Quay về</a>
                        </div>
                        <div class="main-header">
                            <div class="right-main-header">
                                <input type="text" placeholder="Tìm kiếm">
                                <div class="filter"><i class="fa-solid fa-filter"></i></div>
                                <div class="sort"><i class="fa-solid fa-arrow-down-a-z"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- xong phần header -->
                    <form action="index.php?page=addUser" method="Post">
                        <div class="main-product">
                            <div class="category-main-product">
                                <label for="Tên danh mục">Tên người dùng</label>
                                <input type="text" name="tenNguoiDung">
                            </div>
                            <div class="category-main-product">
                                <label for="">Email</label>
                                <input type="text" name="emailNGuoiDung">
                            </div>
                            <div class="category-main-product">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="passNguoiDung">
                            </div>

                            <div class="category-main-product">
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" name="xacNhanPassNguoiDung">
                            </div>
                            <?php
                                if(isset($error) && !empty($error)){
                                    echo '<div style="color: red;">' . $error . '</div>';
                                }
                                ?>

                            <div class="category-main-product">
                                <label for="">Vai trò</label>
                                <select name="role" id="">
                                    <option value="1">Admin</option>
                                    <option value="0">Người dùng</option>
                                </select>
                            </div>
                            <div class="category-main-product">
                                <label for="status">Trạng thái</label>
                                <select name="activeNguoiDung" id="">
                                    <option value="1">Đã hoạt động</option>
                                    <option value="0">Tạm ngưng</option>
                                    <option value="2">Đã hủy</option>
                                </select>
                            </div>
                        </div>
                        <div class="submit-main-product">
                            <button type="submit" name="submitAddUser">Thêm người dùng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>