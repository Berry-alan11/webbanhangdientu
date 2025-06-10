<?php include "C:\Users\LENOVO\OneDrive\Máy tính\Documentos\GitHub\webbanhangdientu\php\header2.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
</head>
<body>
  <div class="login-bg">
    <div class="login-form">
      <h2>ĐĂNG NHẬP</h2>
      <form action="login_process.php" method="post">
        <input
          type="email"
          placeholder="Email"
          name="email"
          required
        />
        <input
          type="password"
          placeholder="Mật khẩu"
          name="passwords"
          required
        />
        <button type="submit">ĐĂNG NHẬP</button>
      </form>
      <div class="login-links">
        <a href="#">Quên mật khẩu?</a>
        <a href="register.php">Đăng ký tại đây</a>
      </div>
      <p class="login-or">hoặc đăng nhập qua</p>
      <div class="login-social">
        <button class="facebook-btn">
          <i class="fab fa-facebook-f"></i> Facebook
        </button>
        <button class="google-btn">
          <i class="fab fa-google-plus-g"></i> Google
        </button>
      </div>
    </div>
  </div>
</body>
</html>

<?php include "footer2.php"?>
<!-- <html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="login-form items-center bg-white rounded-md shadow-md w-full max-w-sm p-6">
    <h2 class="text-center text-gray-900 font-normal mb-6">ĐĂNG NHẬP</h2>
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
  </div>
</body>
</html> -->

<!-- ?php include "footer.php";?> -->