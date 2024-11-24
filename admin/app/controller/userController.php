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
        $error = [];
        $data = [];
        if (isset($_POST['submitAddUser'])) {
            $data['email'] = $_POST['emailNGuoiDung'];
            $data['password'] = $_POST['passNguoiDung'];
            $rePasswordUser = $_POST['xacNhanPassNguoiDung'];
            $data['name'] = $_POST['tenNguoiDung'];
            $data['role'] = $_POST['role'];
            $data['active'] = $_POST['activeNguoiDung'];


            //Kiểm tra các ô input
            $error['name'] = (empty($data['name'])) ? 'Tên không được để trống' : '';
            $error['email'] = (empty($data['email'])) ? 'Email không được để trống' : ((filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) ? 'Không phải là Email' : '');
            $error['password'] = (empty($data['password'])) ? 'Mật khẩu không được để trống' : '';
            $error['rePassword'] = (empty($rePasswordUser)) ?
                'Xác nhận mật khẩu không được để trống' : (($data['password'] !== $rePasswordUser) ? 'Xác nhận mật khẩu và mật khẩu không khớp' : '');

            // thêm người dùng nếu không có lỗi
            if (empty($error['name']) && empty($error['email']) && empty($error['password']) && empty($error['rePassword'])) {
                $data['password'] = md5($data['password']);
                $this->userModel->insertUser($data);
                echo '<script>
                        alert("Thêm người dùng thành công")
                        window.location.href = "index.php?page=user";
                    </script>';
            }
        }
        $this->renderView('userAdd', ['error' => $error, 'data' => $data]);
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
        $data = [];
        $error = [];
        if (isset($_POST['submitEditUser'])) {

            $data['email'] = $_POST['emailNguoiDung'];
            $data['name'] = $_POST['tenNguoiDung'];
            $data['role'] = $_POST['role'];
            $data['active'] = $_POST['activeNguoiDung'];
            $data['id'] = $_POST['idNguoiDung'];
            $error['name'] = (empty($data['name'])) ? 'Tên không được để trống' : '';
            $error['email'] = (empty($data['email'])) ? 'Email không được để trống' : ((filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) ? 'Không phải là Email' : '');



            if (empty($error['name']) && empty($error['email'])) {
                $this->userModel->editUser($data);
                echo '<script>
                        alert("Sửa người dùng thành công");
                        window.location.href = "index.php?page=user";
                        </script>';
                exit;
            }

            $userID = $data;
        }

        $this->renderView('userEdit', ['error' => $error, 'userID' => $userID]);
    }
}
