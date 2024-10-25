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
        <form action="/register" method="post" id="myForm" onsubmit="return validatePhoneNumber();";>
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
            <label for="phone"><b>Email </b></label>
            <input type="text" placeholder="Vui lòng nhập email của bạn" id="email" name="email" required>
            <span id="emailError" style="color:red; display:none;"></span>

            <label for="phone"><b>Số điện thoại </b></label>
            <input type="text" placeholder="Vui lòng nhập số điện thoại" id="phone" name="phone" required>
            <span id="phoneError" style="color:red; display:none;"></span>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập mật khẩu" id="password" name="password" required>
            <span id="checkPasswordError" style="color:red; display:none;"></span>

            <label for="psw"><b>Nhập lại mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập lại mật khẩu" id="check_password" name="psw" required>
            <span id="passwordError" style="color:red; display:none;"></span>
            <!-- HTML -->
            <button id="hiddenBtn" style="display:none;" data-toggle="modal" data-target="#OtpModal"></button>

            <button name="action" value="register" class="btn-login btn-modal-body" type="submit" >Đăng ký</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>


<?php echo View::forge('player/modal_otp');?>

<script>
  document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('otp-form')
            const inputs = [...form.querySelectorAll('input[type=text]')]
            const submit = form.querySelector('button[type=submit]')

            const handleKeyDown = (e) => {
                if (
                    !/^[0-9]{1}$/.test(e.key)
                    && e.key !== 'Backspace'
                    && e.key !== 'Delete'
                    && e.key !== 'Tab'
                    && !e.metaKey
                ) {
                    e.preventDefault()
                }

                if (e.key === 'Delete' || e.key === 'Backspace') {
                    const index = inputs.indexOf(e.target);
                    if (index > 0) {
                        inputs[index - 1].value = '';
                        inputs[index - 1].focus();
                    }
                }
            }

            const handleInput = (e) => {
                const { target } = e
                const index = inputs.indexOf(target)
                if (target.value) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus()
                    } else {
                        submit.focus()
                    }
                }
            }

            const handleFocus = (e) => {
                e.target.select()
            }

            const handlePaste = (e) => {
                e.preventDefault()
                const text = e.clipboardData.getData('text')
                if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                    return
                }
                const digits = text.split('')
                inputs.forEach((input, index) => input.value = digits[index])
                submit.focus()
            }

            inputs.forEach((input) => {
                input.addEventListener('input', handleInput)
                input.addEventListener('keydown', handleKeyDown)
                input.addEventListener('focus', handleFocus)
                input.addEventListener('paste', handlePaste)
            })
        })     
        

    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = "<?php echo Session::get_flash('modalOtp') ? 'true' : 'false'; ?>";
        if (successMessage === 'true') {
            document.getElementById('hiddenBtn').click();
        }
    });
</script>


