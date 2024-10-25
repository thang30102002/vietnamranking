// Đợi khi tài liệu đã được tải hoàn toàn
document.addEventListener('DOMContentLoaded', function() {
    // Tìm phần tử có ID là 'notification'
    var notification = document.getElementById('notification');

    // Nếu phần tử tồn tại
    if (notification) {
        // Đặt timeout 5 giây (5000 milliseconds)
        setTimeout(function() {
            // Ẩn thông báo bằng cách thay đổi style display
            notification.style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 giây
    }
});




    document.getElementById('email').addEventListener('input', function() {
    var emailInput = this.value;
    var emailError = document.getElementById('emailError');

    // Biểu thức chính quy để kiểm tra định dạng số điện thoại Việt Nam
    var phonePattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Kiểm tra định dạng
    if (!phonePattern.test(emailInput)) {
        emailError.textContent = 'Email không hợp lệ. Vui lòng nhập lại.';
        emailError.style.display = 'block'; // Hiển thị thông báo lỗi
    } else {
        emailError.textContent = '';
        emailError.style.display = 'none'; // Ẩn thông báo lỗi
    }
    });

    document.getElementById('phone').addEventListener('input', function() {
    var phoneInput = this.value;
    var phoneError = document.getElementById('phoneError');

    // Biểu thức chính quy để kiểm tra định dạng số điện thoại Việt Nam
    var phonePattern = /^(0[3|5|7|8|9][0-9]{8})$/;

    // Kiểm tra định dạng
    if (!phonePattern.test(phoneInput)) {
        phoneError.textContent = 'Số điện thoại không hợp lệ. Vui lòng nhập lại.';
        phoneError.style.display = 'block'; // Hiển thị thông báo lỗi
    } else {
        phoneError.textContent = '';
        phoneError.style.display = 'none'; // Ẩn thông báo lỗi
    }
    });

    document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var checkPasswordError = document.getElementById('checkPasswordError');


    // Kiểm tra định dạng
    if (password.length < 6) {
        checkPasswordError.textContent = 'Mật khẩu phải ít nhất 6 kí tự.';
        checkPasswordError.style.display = 'block'; // Hiển thị thông báo lỗi
    } else {
        checkPasswordError.textContent = '';
        checkPasswordError.style.display = 'none'; // Ẩn thông báo lỗi
    }
    });

    document.getElementById('check_password').addEventListener('input', function() {
    var passwordInput = this.value;
    var password = document.getElementById('password');
    var passwordError = document.getElementById('passwordError');

    var passwordValue = password.value;
    // Kiểm tra định dạng
    if (passwordValue !== passwordInput ) {
        passwordError.textContent = 'Mật khẩu chưa đúng. Vui lòng nhập lại.';
        passwordError.style.display = 'block'; // Hiển thị thông báo lỗi
    } else {
        passwordError.textContent = '';
        passwordError.style.display = 'none'; // Ẩn thông báo lỗi
    }
    });

    function validatePhoneNumber() {
        var phoneInput = document.getElementById('phone').value; // Lấy giá trị từ input
        // Biểu thức chính quy để kiểm tra số điện thoại hợp lệ
        var phonePattern = /^(0[3|5|7|8|9]\d{8})$/; // Có thể điều chỉnh theo yêu cầu
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Có thể điều chỉnh theo yêu cầu
        var emailInput = document.getElementById('email').value; // Lấy giá trị từ input
        var passwordInput = document.getElementById('password').value; // Lấy giá trị từ input
        var passwordCheck = document.getElementById('check_password').value; // Lấy giá trị từ input

        // Kiểm tra định dạng
        if (!phonePattern.test(phoneInput) || passwordInput !== passwordCheck || passwordInput.length < 6 || !emailPattern.test(emailInput)) {
            return false; // Ngăn không cho gửi form
        } else {
            return true; // Cho phép gửi form
        }
}
// modal

    
    

