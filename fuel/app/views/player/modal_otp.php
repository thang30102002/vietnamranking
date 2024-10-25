<div class="modal fade modal-otp" id="OtpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
        <header class="mb-8">
            <h3 class="text-2xl font-bold mb-1">Nhập mã xác thực</h3>
            <p class="text-[15px] text-slate-500">Mã xác thực đã được gửi vào email. Vui lòng nhập mã xác thực.</p>
        </header>
        <form id="otp-form" class="otp-form" action="/checkTkon" method="post">
            <div class="otp-input flex items-center justify-center gap-3">
                <input required  
                    type="text" name="input_otp_1"
                    class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                    pattern="\d*" maxlength="1" />
                <input required 
                    type="text" name="input_otp_2"
                    class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                    maxlength="1" />
                <input required 
                    type="text" name="input_otp_3"
                    class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                    maxlength="1" />
                <input required   
                    type="text" name="input_otp_4"
                    class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                    maxlength="1" />
                <input required 
                type="text" name="input_otp_5"
                class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                maxlength="1" />
            </div>
            <div class="max-w-[260px] mx-auto mt-4">
                <button type="submit" name="action" value="authentic"
                    class="btn-modal-body btn-action w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Xác thực</button>
            </div>
        </form>
        <div class="text-sm text-slate-500 mt-4">Bạn chưa nhận được mã? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">Gửi lại</a></div>
    </div>
    
      </div>
    </div>
  </div>
</div>
