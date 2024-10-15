<!-- Modal -->
<div class="modal fade modal-login" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/player/register" method="post" id="myForm" onsubmit="return validatePhoneNumber();";>
          <div class="container">
            <label for="name"><b>Họ và tên </b></label>
            <input type="text" placeholder="Vui lòng nhập họ tên của bạn" id="name" name="name" required>

            <label for="ranking"><b>Hạng </b></label>
             <select class="w3-select w3-border" name="ranking">
                <option value="H">H</option>
                <option value="G">G</option>
                <option value="F">F</option>
                <option value="E">E</option>
                <option value="D">D</option>
                <option value="C">C</option>
                <option value="B">B</option>
                <option value="A">A</option>
                <option value="CN">CN - Chuyên nghiệp</option>
            </select>
            
            <label for="phone"><b>Số điện thoại </b></label>
            <input type="text" placeholder="Vui lòng nhập số điện thoại" id="phone" name="phone" required>
            <span id="phoneError" style="color:red; display:none;"></span>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập mật khẩu" id="password" name="psw" required>

            <label for="psw"><b>Nhập lại mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập lại mật khẩu" id="check_password" name="psw" required>
            <span id="passwordError" style="color:red; display:none;"></span>

            <button class="btn-login" type="submit">Đăng ký</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    function validatePhonePassword(){
        
    }
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

        

        var passwordInput = document.getElementById('password').value; // Lấy giá trị từ input
        var passwordCheck = document.getElementById('check_password').value; // Lấy giá trị từ input

        // Kiểm tra định dạng
        if (!phonePattern.test(phoneInput) || passwordInput !== passwordCheck) {
            return false; // Ngăn không cho gửi form
        } else {
            return true; // Cho phép gửi form
        }
}

    
    

</script>