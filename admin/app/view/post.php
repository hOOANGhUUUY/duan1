<div class="main">
    <div class="main-category">
        <div class="main-danhmuc">
            <p>Bài viết</p>
            <a href="index.php?page=addPost">+ Thêm bài viết</a>
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
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Lượt xem</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                <!-- 1 box -->
                 <?php
                    $html ='';
                    foreach($postDB as $item){
                        extract($item);
                        $html .= '
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>'.$title.'</td>
                                <td>'.$catePost.'</td>
                                <td>'.$view.'</td>
                                <td>'.$datePost.'</td>

                                <td>'.$status.'</td>
                                <td><a href="index.php?page=viewEditPost&id='.$id.'">Sửa</a></td>
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