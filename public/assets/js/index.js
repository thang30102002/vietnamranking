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