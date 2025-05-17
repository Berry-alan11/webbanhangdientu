<?php include 'header.php'; ?>

<div class="container mt-5 mb-5">
    <h2 class="mb-4">Liên hệ với chúng tôi</h2>

    <p>Nếu bạn có bất kỳ câu hỏi, góp ý hoặc cần hỗ trợ, vui lòng điền vào biểu mẫu bên dưới hoặc liên hệ trực tiếp với chúng tôi qua thông tin liên hệ.</p>

    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <h5>Thông tin liên hệ</h5>
            <p><strong>Địa chỉ:</strong> 123 Nguyễn Văn Linh, Q.7, TP.HCM</p>
            <p><strong>Email:</strong> support@webbanhangdientu.vn</p>
            <p><strong>Hotline:</strong> 1900 6750</p>
        </div>

        <div class="col-md-6">
            <form method="post" action="contact_process.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email của bạn</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Nội dung</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
