<?php
session_start();

// Kiểm tra nếu cần hủy session hoàn toàn
if (isset($_SESSION['destroy_after']) && $_SESSION['destroy_after'] === true) {
    // Lưu thông báo tạm thời
    $logout_message = $_SESSION['logout_message'] ?? null;
    
    // Hủy session
    session_destroy();
    
    // Khởi tạo session mới
    session_start();
    
    // Đặt lại thông báo nếu có
    if ($logout_message) {
        $_SESSION['logout_message'] = $logout_message;
    }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="bg-white rounded-md shadow-md w-full max-w-sm p-6">
    <h2 class="text-center text-gray-900 font-normal mb-6">ĐĂNG NHẬP</h2>
    
    <?php if(isset($_SESSION['logout_message'])): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?php 
          echo $_SESSION['logout_message']; 
          unset($_SESSION['logout_message']);
        ?>
      </div>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['login_error'])): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php 
          echo $_SESSION['login_error']; 
          unset($_SESSION['login_error']);
        ?>
      </div>
    <?php endif; ?>
    
    <form class="space-y-4" action="login_process.php" method="post">
      <input
        type="email"
        placeholder="Email"
        name="email"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400"
      />
      <input
        type="password"
        placeholder="Mật khẩu"
        name="passwords"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400"
      />
      <button
        type="submit"
        class="w-full bg-black text-white font-semibold py-2 rounded-md hover:bg-gray-900 transition"
      >
        ĐĂNG NHẬP
      </button>
    </form>
    <div class="mt-3 flex justify-between text-gray-700 text-sm">
      <a href="#" class="hover:underline">Quên mật khẩu?</a>
      <a href="register.php" class="hover:underline">Đăng ký tại đây</a>
    </div>
    <p class="text-center text-gray-700 text-sm mt-3">hoặc đăng nhập qua</p>
    <div class="mt-3 flex space-x-2">
      <button
        class="flex items-center justify-center space-x-2 bg-[#3b5998] text-white text-sm font-normal rounded-md px-3 py-2 w-1/2"
      >
        <i class="fab fa-facebook-f"></i>
        <span>Facebook</span>
      </button>
      <button
        class="flex items-center justify-center space-x-2 bg-[#dd4b39] text-white text-sm font-normal rounded-md px-3 py-2 w-1/2"
      >
        <i class="fab fa-google-plus-g"></i>
        <span>Google</span>
      </button>
    </div>
    <div class="mt-4 text-center">
      <a href="index.php" class="text-blue-600 hover:underline">Quay lại trang chủ</a>
    </div>
  </div>
</body>
</html>

<?php
//session_start();
//include 'footer.php'; // Kết nối đến cơ sở dữ liệu
?>