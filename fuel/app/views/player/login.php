<!-- Modal -->
<div class="modal fade modal-login" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/login" method="post">
          <div class="container">
            <label for="email"><b> Email </b></label>
            <input type="text" placeholder="Vui lòng nhập email"  name="email" required>
            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Vui lòng nhập mật khẩu"  name="password" required>
            <button name="action" value="login" class="btn-login btn-modal-body" type="submit">Đăng nhập</button>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Lấy lại <button class="btn-get-pass"data-toggle="modal" data-target="#getPassModal">mật khẩu ?</button></span>
          </div>    
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="register" data-toggle="modal" data-target="#registerModal">Đăng ký</button>
      </div>
    </div>
  </div>
</div>
<?php echo View::forge('player/register');?>
<?php echo View::forge('player/modal_get_password');?>
<!-- Thêm jQuery và Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

