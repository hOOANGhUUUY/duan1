<?php
class userController
{
    private $userModel;
    function __construct()
    {
        $this->userModel = new userModel();
    }


    // Hàm này để trả về Require_one
    function renderView($view, $data = [])
    {
        extract($data);
        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }

    // Hàm này để hiển thị tất cả người dùng
    function viewUser()
    {
        $usersDB = $this->userModel->getAllUser();
        foreach ($usersDB as &$user) {
            $roleHtml = '';
            if ($user['role'] === 0) {
                $roleHtml = 'Người dùng';
            } else if ($user['role'] === 1) {
                $roleHtml = 'Quản trị';
            }
            $user['role'] = $roleHtml;

            $activeHtml = '';
            if ($user['active'] === 0) {
                $activeHtml = '<span class="status pending">Chưa kích hoạt</span>';
            } else if ($user['active'] === 1) {
                $activeHtml = '<span class="status success">Đã kích hoạt</span>';
            } else if ($user['active'] === 2) {
                $activeHtml = '<span class="status danger">Đã hủy</span>';
            }
            $user['active'] = $activeHtml;
        }
        $this->renderView('user', ['usersDB' => $usersDB]);
    }


    // Hàm này để thêm người dùng vào DB
    function addUser()
    {
        $error = '';
        if (isset($_POST['submitAddUser'])) {
            $data = [];
            $data['email'] = $_POST['emailNGuoiDung'];
            // $data['password'] = md5($_POST['passNguoiDung']);
            $passwordUser = $_POST['passNguoiDung'];
            $rePasswordUser = $_POST['xacNhanPassNguoiDung'];
            $data['name'] = $_POST['tenNguoiDung'];
            $data['role'] = $_POST['role'];
            $data['active'] = $_POST['activeNguoiDung'];
            //Kiểm tra các ô input
            $error = (empty($data['name'])) ? 'Tên không dc để trống' : $error;
            $error = (empty($data['email'])) ? 'Email không được để trống' : 
            ((filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) ? 'Không phải là Email': $error);

            if(empty($error)){
                $this->userModel->insertUser($data);

            }

 
            // kiểm tra mật khẩu


            // if($passwordUser === $rePasswordUser){
            //     $data['password'] = md5($passwordUser);
            //     $this->userModel->insertUser($data);
            //     echo '<script>alert("Thêm người dùng thành công")</script>';
            // }else{
            //     $error = 'Xác nhận mật khẩu và mật khẩu không khớp';
            // }
            // End kiểm tra mật khẩu

            echo print_r($data);
        }
        $this->renderView('userAdd', ['error' => $error]);
    }


    // HÀM NÀY ĐỂ HIỂN THỊ THÔNG TIN CẦN CHỈNH SỬA NGƯỜI DÙNG
    function viewEditUser()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $userID = $this->userModel->getUser($id);
            $this->renderView('userEdit', ['userID' => $userID]);
        }
    }


    // HÀM NÀY ĐỂ CHỈNH SỬA NGƯỜI DÙNG
    function editUser()
    {
        if (isset($_POST['submitEditUser'])) {
            $data = [];
            $data['email'] = $_POST['emailNguoiDung'];
            $data['name'] = $_POST['tenNguoiDung'];
            $data['role'] = $_POST['role'];
            $data['active'] = $_POST['activeNguoiDung'];
            $data['id'] = $_POST['idNguoiDung'];
            $this->userModel->editUser($data);
        }
    }
}
