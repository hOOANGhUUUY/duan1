
// JS thích sản phẩm Trạm Nhỏ Xinh 
const heartButton = document.querySelectorAll('.heart-button');
heartButton.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('active');
    });
});
// END JS thích sản phẩm Trạm Nhỏ Xinh 
















// JS Slide banner sản phẩm Trạm Nhỏ Xinh 
const containerSlider = document.querySelector('.slider-container');
const slideItems = document.querySelectorAll('.slide');
const containerDots = document.querySelector('.dots-container');
const tongSoSlide = slideItems.length;
let viTriHienTai = 0;
for (let i = 0; i < tongSoSlide; i++) {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => diChuyenDenSlide(i));
    containerDots.appendChild(dot);
}
const capNhatSlider = () => {
    containerSlider.style.transform = `translateX(-${viTriHienTai * 100}%)`;
    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === viTriHienTai);
    });
};
const diChuyenDenSlide = (index) => {
    viTriHienTai = index;
    capNhatSlider();
};
const chuyenSlideTuDong = () => {
    viTriHienTai = (viTriHienTai + 1) % tongSoSlide;
    capNhatSlider();
};
let slideInterval = setInterval(chuyenSlideTuDong, 3000);
document.querySelector('.banner-home').addEventListener('mouseenter', () => clearInterval(slideInterval));
document.querySelector('.banner-home').addEventListener('mouseleave', () => {
    slideInterval = setInterval(chuyenSlideTuDong, 3000);
});
containerSlider.addEventListener('click', (e) => {
    const doRongContainer = containerSlider.offsetWidth;
    const viTriClick = e.clientX;
    if (viTriClick < doRongContainer / 2) {
        viTriHienTai = (viTriHienTai - 1 + tongSoSlide) % tongSoSlide; 
    } else {
        viTriHienTai = (viTriHienTai + 1) % tongSoSlide; 
    }
    capNhatSlider();
});

// END JS Slide banner sản phẩm Trạm Nhỏ Xinh 










// JS Sản phẩm nổi bật Trạm Nhỏ Xinh 
const nutTrai = document.querySelector('.prev-btn');
const nutPhai = document.querySelector('.next-btn');
const khungSanPham = document.querySelector('.box-hot-product .products-container');
let viTriCuon = 0;
const chieuRongSanPham = 280;
const maxCuon = khungSanPham.scrollWidth - khungSanPham.clientWidth;
let lastScrollTime = 0;
let scrollTimeout;

nutTrai.addEventListener('click', () => {
    viTriCuon -= chieuRongSanPham * 2;
    if (viTriCuon < 0) viTriCuon = 0;
    khungSanPham.scrollTo({
        left: viTriCuon,
        behavior: 'smooth'
    });
});

nutPhai.addEventListener('click', () => {
    viTriCuon += chieuRongSanPham * 2;
    if (viTriCuon > maxCuon) viTriCuon = maxCuon;
    khungSanPham.scrollTo({
        left: viTriCuon,
        behavior: 'smooth'
    });
});

khungSanPham.addEventListener('scroll', () => {
    viTriCuon = khungSanPham.scrollLeft;
});

khungSanPham.addEventListener('wheel', (e) => {
    e.preventDefault();


    const speedX = e.deltaX;
    const speedY = e.deltaY;


    const scrollAmountX = speedX * 40; 
    const scrollAmountY = speedY * 40; 
    // console.log(scrollAmountY);
    
  
    if (Math.abs(scrollAmountX) > 5000 || Math.abs(scrollAmountY) > 5000) {
        return;
    }
    const currentTime = Date.now();
    if (currentTime - lastScrollTime > 20) {
        if (Math.abs(scrollAmountX) > Math.abs(scrollAmountY)) {
            khungSanPham.scrollLeft += scrollAmountX;
        } 
        else {
            khungSanPham.scrollTop += scrollAmountY;
        }

        lastScrollTime = currentTime;
    }
});
// END JS Sản phẩm nổi bật Trạm Nhỏ Xinh 






// JS Đăng nhập Trạm Nhỏ Xinh 
document.querySelector(".show-password").addEventListener("click", function () {
    const passwordField = document.getElementById("password");
    const icon = this.querySelector("i");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});
//   hiện box đănh nhập 
let clickDangNhap = document.querySelector('.nav_drop-down .dangnhap')
clickDangNhap.addEventListener('click', function () {
    let boxLogin = document.querySelector('.main-box-login')
    boxLogin.style.display = "block"

    const overlay = document.getElementById("overlay");
    overlay.addEventListener('click', function () {
        boxLogin.style.display = "none"
    })
    const closeButton = document.getElementById("closeButton");
    closeButton.addEventListener('click', function () {
        boxLogin.style.display = "none"
    })

})
//END JS Đăng nhập Trạm Nhỏ Xinh 
// JS Đăng ký Trạm Nhỏ Xinh 
document.querySelectorAll(".re-show-password").forEach((button) => {
    button.addEventListener("click", function () {
        const passwordField = button.previousElementSibling;
        const icon = button.querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
});
// hiện box đăng ký
let clickDangKy = document.querySelector('.nav_drop-down .dangky')
clickDangKy.addEventListener('click', function () {
    let boxRerister = document.querySelector('.main-box-register')
    boxRerister.style.display = "block"

    const reOverlay = document.getElementById("re-overlay");
    reOverlay.addEventListener('click', function () {
        boxRerister.style.display = "none"
    })
    const reCloseButton = document.getElementById("re-closeButton");
    reCloseButton.addEventListener('click', function () {
        boxRerister.style.display = "none"
    })

})
// END JS Đăng ký Trạm Nhỏ Xinh 




// JS Giỏ hàng Trạm Nhỏ Xinh 
const cartTang = document.querySelectorAll('.giam');
const cartGiam = document.querySelectorAll('.tăng');
const cartSo = document.querySelectorAll('.so');
const giaProduct = document.querySelectorAll('.cart-Price .price');
const tenSanPham = document.querySelector('.productName'); 
const totalPriceElement = document.querySelector('.totalPrice'); 
const totalProductElement = document.querySelector('.totalProduct'); 

let tongSanPham = 0;
let tongTien = 0;
totalPriceElement.textContent = tongTien
totalProductElement.textContent = tongSanPham
function capNhatsoAndtongTien(buttonType, index) {
    const quantityElement = cartSo[index];
    let quantity = parseInt(quantityElement.textContent);

    if (buttonType === 'minus') {
        if (quantity > 1) quantity--; 
    } else if (buttonType === 'plus') {
        quantity++;
    }
    quantityElement.textContent = quantity;
    const price = parseInt(giaProduct[index].textContent.replace('.', '').replace('Đ', ''));
    const totalPriceProduct = quantity * price;
    tongSanPham = 0;
    tongTien = 0;
    cartSo.forEach((item, i) => {
        const soLuong = parseInt(item.textContent);
        const gia = parseInt(giaProduct[i].textContent.replace('.', '').replace('Đ', ''));
        tongSanPham += soLuong;
        tongTien += soLuong * gia;
    });
    totalProductElement.textContent = tongSanPham;
    totalPriceElement.textContent = tongTien.toLocaleString('vi-VN') + "Đ";
    if (tongSanPham === 0) {
        tenSanPham.textContent = "Không có sản phẩm";
        totalProductElement.textContent = "0";
        totalPriceElement.textContent = "0Đ";
    } else {
        tenSanPham.textContent = "Tên sản phẩm";
    }
}
cartTang.forEach((button, index) => {
    button.addEventListener('click', () => capNhatsoAndtongTien('minus', index));
});
cartGiam.forEach((button, index) => {
    button.addEventListener('click', () => capNhatsoAndtongTien('plus', index));
});

// END JS Giỏ hàng Trạm Nhỏ Xinh 

