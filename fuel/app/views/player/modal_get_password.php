<div class="modal fade modal-login" id="getPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/getPass" method="post" id="myForm" onsubmit="return validatePhoneNumberNew();">
          <div class="container">
            <label for="phone"><b>Email </b></label>
            <input type="text" placeholder="Vui lòng nhập email của bạn" id="emailGetPass" name="email_get_pass" required>
            <span id="emailErrorNew" style="color:red; display:none;"></span>

            <label for="psw"><b>Mật khẩu mới</b></label>
            <input type="password" placeholder="Vui lòng nhập mật khẩu mới" id="passwordNew" name="password_get_pass" required>
            <span id="checkPasswordErrorNew" style="color:red; display:none;"></span>

            <label for="psw"><b>Nhập lại mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập lại mật khẩu" id="check_passwordNew" name="psw_get_pass" required>
            <span id="passwordErrorNew" style="color:red; display:none;"></span>
            <!-- HTML -->
            <button id="hiddenBtnGetPass" style="display:none;" data-toggle="modal" data-target="#OtpModalGetPass"></button>
            <button name="action" value="getPass" class="btn-login btn-modal-body" type="submit" >Cập nhật</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo View::forge('player/modal/modal_otp_get_pass');?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = "<?php echo Session::get_flash('modalOtpGetPass') ? 'true' : 'false'; ?>";
        if (successMessage === 'true') {
            document.getElementById('hiddenBtnGetPass').click();
        }
    });

    document.getElementById('emailGetPass').addEventListener('input', function() {
    var emailInput = this.value;
    var emailError = document.getElementById('emailErrorNew');

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



    document.getElementById('passwordNew').addEventListener('input', function() {
    var password = this.value;
    var checkPasswordError = document.getElementById('checkPasswordErrorNew');


    // Kiểm tra định dạng
    if (password.length < 6) {
        checkPasswordError.textContent = 'Mật khẩu phải ít nhất 6 kí tự.';
        checkPasswordError.style.display = 'block'; // Hiển thị thông báo lỗi
    } else {
        checkPasswordError.textContent = '';
        checkPasswordError.style.display = 'none'; // Ẩn thông báo lỗi
    }
    });

    document.getElementById('check_passwordNew').addEventListener('input', function() {
    var passwordInput = this.value;
    var password = document.getElementById('passwordNew');
    var passwordError = document.getElementById('passwordErrorNew');

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

    function validatePhoneNumberNew() {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Có thể điều chỉnh theo yêu cầu
        var emailInput = document.getElementById('emailGetPass').value; // Lấy giá trị từ input
        var passwordInput = document.getElementById('passwordNew').value; // Lấy giá trị từ input
        var passwordCheck = document.getElementById('check_passwordNew').value; // Lấy giá trị từ input

        // Kiểm tra định dạng
        if (passwordInput !== passwordCheck || passwordInput.length < 6 || !emailPattern.test(emailInput)) {
            return false; // Ngăn không cho gửi form
        } else {
            return true; // Cho phép gửi form
        }
}
</script>