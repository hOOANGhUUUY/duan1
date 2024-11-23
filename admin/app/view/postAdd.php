<div class="main">
    <div class="main-category">
        <div class="main-danhmuc">
            <p>Thêm bài viết</p>
            <a href="../html/adminPost.html">Quay về</a>
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
     <?php
     print_r($listCatePost);
     print_r($date)
     ?>
    <form action="index.php?page=addPost" method="POST">
        <div class="main-product">
            <div class="category-main-product">
            <label for="Tên danh mục">Danh mục</label>
                <select name="danhMuc" id="">
                    <?php
                        $html = '';
                        foreach($listCatePost as $item){
                            extract($item);?>
                            <option value="<?=$id?>"><?=$name?></option>

                        <?php
                        }
                        ?>
                    
                    <!-- <option value="">Đã hoạt động</option>
                    <option value="">Tạm ngưng</option>
                    <option value="">Đã hủy</option> -->
                </select>
            </div>
            <div class="category-main-product">
                <label for="Tên danh mục">Tiêu đề</label>
                <input type="text" name="tieuDe">
            </div>
            <div class="category-main-product">
                <label for="">Mô tả ngắn</label>
                <input type="text" name="moTaNgan">
            </div>
            <div class="text-main-product">
                <label for="">Nội dung</label>
                <!-- <input type="text"> -->
                <textarea name="noiDung" id="" cols="50" rows="5"></textarea>
            </div>
            <!-- Hình ảnh -->
            <div class="category-main-product">
                <label for="">Hình ảnh</label>
                <input type="file" name="img">
            </div>
            <div class="category-main-product">
                <label for="status">Trạng thái</label>
                <select name="status" id="">
                    <option value="1">Đã hoạt động</option>
                    <option value="2">Tạm ngưng</option>
                    <option value="3">Đã hủy</option>
                </select>
            </div>
        </div>
        <div class="submit-main-product">
            <button type="submit" name="submitForm"><a href="#">Thêm bài viết</a></button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</body>

</html>