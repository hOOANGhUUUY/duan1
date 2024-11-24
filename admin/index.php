<?php
require_once '../app/model/database.php';
require_once 'app/view/menu.php';
require_once 'app/controller/homeController.php';


// danh mục bài viết
require_once '../app/model/postCateModel.php';
// bài viết model
require_once '../app/model/postModel.php';
//user model
require_once '../app/model/userModel.php';


//Danh mục bài viết controller
require_once 'app/controller/postCateController.php';
// bài viết controller
require_once 'app/controller/postController.php';
// user controller
require_once 'app/controller/userController.php';



// require_once 'app/view/category.php';
$db = new Database();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'post':
            $post = new postController();
            $post->view();
            break;
        case 'addPost':
            $addPost = new postController();
            $addPost->addPost();
            break;
        case 'viewEditPost':
            $viewEditPost = new postController();
            $viewEditPost->viewEditPost();
            break;
        case 'editPost':
            $editPost = new postController();
            $editPost->editPost();
            break;
        case 'user':
            $user = new userController();
            $user->viewUser();
            break;
        case 'addUser':
            $addUser = new userController();
            $addUser->addUser();
            break;
        case 'viewEditUser':
            $viewEditUser = new userController();
            $viewEditUser->ViewEditUser();
            break;
        case 'editUser':
            $editUser = new userController();
            $editUser->editUser();
            break;
        default:
            $home = new homeController();
            $home->viewHome();
            break;
    }
} else {
    $home = new homeController();
    $home->viewHome();
}
