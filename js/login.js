// Hàm để hiển thị hoặc ẩn mật khẩu
function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const passwordButton = document.querySelector('.show-password i');

    if (passwordField.type === "password") {
        passwordField.type = "text"; // Hiển thị mật khẩu
        passwordButton.classList.remove('fa-eye'); // Thêm icon "mắt mở"
        passwordButton.classList.add('fa-eye-slash'); // Xóa icon "mắt đóng"
    } else {
        passwordField.type = "password"; // Ẩn mật khẩu
        passwordButton.classList.remove('fa-eye-slash'); // Xóa icon "mắt mở"
        passwordButton.classList.add('fa-eye'); // Thêm icon "mắt đóng"
    }
}

// Hàm để đóng box đăng nhập
function closeLoginBox() {
    document.querySelector('.login-box').classList.add('hidden');
}

// Hàm mở box đăng nhập
function openLoginBox() {
    document.querySelector('.login-box').classList.remove('hidden');
}

// Mở box đăng nhập khi trang load
document.addEventListener('DOMContentLoaded', function () {
    openLoginBox();
});
