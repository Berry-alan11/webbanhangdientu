<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Đăng Ký</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
  <div class="bg-white rounded-lg shadow-md w-full max-w-sm p-6">
    <h2 class="text-center font-semibold text-lg mb-2">ĐĂNG KÝ</h2>
    <p class="text-center text-sm mb-6">Đã có tài khoản, đăng nhập tại <a href="login.php" class="text-blue-600 hover:underline">đây</a></p>
    <form class="space-y-4" action="register_process.php" method="post">
      <input
        type="text"
        placeholder="Họ"
        name = "lastname"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input
        type="text"
        placeholder="Tên"
        name = "firstname"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input
        type="email"
        placeholder="Email"
        name="email"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input
        type="tel"
        placeholder="Số điện thoại"
        name="phonenumber"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input
        type="password"
        placeholder="Mật khẩu"
        name="passwords"
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <button
        type="submit"
        class="w-full bg-black text-white font-semibold rounded-md py-2 text-sm hover:bg-gray-900 transition"
      >
        Đăng ký
      </button>
    </form>
    <p class="text-center text-sm mt-6 mb-3">Hoặc đăng nhập bằng</p>
    <div class="flex justify-center space-x-3">
      <button
        class="flex items-center space-x-2 bg-[#3b5998] text-white text-xs px-3 py-2 rounded"
        type="button"
      >
        <i class="fab fa-facebook-f"></i>
        <span>Facebook</span>
      </button>
      <button
        class="flex items-center space-x-2 bg-[#db4437] text-white text-xs px-3 py-2 rounded"
        type="button"
      >
        <i class="fab fa-google-plus-g"></i>
        <span>Google</span>
      </button>
    </div>
  </div>
</body>
</html>