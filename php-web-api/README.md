# PHP Web API

This project is a PHP-based web API designed to handle various functionalities such as user authentication, product management, and shopping cart operations. Below is an overview of the project's structure and its key components.

## Directory Structure

- **public/**: Contains the main entry point of the application.
  - `index.php`: The main API endpoint that routes requests.

- **src/**: Contains the core components of the application.
  - **Controllers/**: Contains controller classes that handle the logic for different routes.
    - `BaseController.php`: The base controller class.
  - **Models/**: Contains model classes that interact with the database.
    - `BaseModel.php`: The base model class.
  - **Routes/**: Contains route definitions for the API.
    - `api.php`: The file where API routes are defined.
  - **Services/**: Contains service classes for business logic.
    - `BaseService.php`: The base service class.

- **config/**: Contains configuration files.
  - `config.php`: General configuration settings.
  - `db.php`: Handles database connection settings.
  - `auth.php`: Manages JWT authentication.

- **tests/**: Contains test files for the application.
  - `ExampleTest.php`: An example test file.

- **endpoints/**: Contains the various API endpoints.
  - `register.php`: Handles user registration.
  - `login.php`: Manages user login.
  - `logout.php`: Handles user logout.
  - `add_product.php`: Allows users to add products to their cart.
  - `search.php`: Handles product search functionality.
  - `cart.php`: Displays the user's shopping cart.
  - `checkout.php`: Manages the checkout process.
  - `products.php`: Displays a list of products.
  - `reviews.php`: Manages product reviews.
  - `user.php`: Handles user account updates.
  - `notifications.php`: Manages sending notifications to users.
  - `history.php`: Displays the transaction history for users.

- **vendor/**: Contains third-party libraries, including the JWT library (firebase/php-jwt).

- **.htaccess**: Restricts direct access to certain files and directories.

- **composer.json**: Contains project dependencies and autoloading information.

## Getting Started

To get started with this project, clone the repository and install the necessary dependencies using Composer:

```bash
composer install
```

Make sure to configure your database settings in `config/db.php` and set up JWT authentication in `config/auth.php`.

## Usage

You can access the API endpoints through the `public/index.php` file. The API supports various operations such as user registration, login, product management, and more.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

<!-- Cấu trúc file php -->
/web3k_api/
│── /config/
│    ├── db.php             // Kết nối cơ sở dữ liệu
│    ├── auth.php           // Xác thực JWT
│── /endpoints/
│    ├── register.php       // Đăng ký
│    ├── login.php          // Đăng nhập
│    ├── logout.php         // Đăng xuất
│    ├── add_product.php    // Thêm sản phẩm vào giỏ hàng
│    ├── search.php         // Tìm kiếm sản phẩm
│    ├── cart.php           // Hiển thị giỏ hàng
│    ├── checkout.php       // Thanh toán
│    ├── products.php       // Hiển thị danh sách sản phẩm
│    ├── reviews.php        // Quản lý đánh giá sản phẩm
│    ├── user.php           // Cập nhật thông tin tài khoản
│    ├── notifications.php  // Gửi thông báo
│    ├── history.php        // Lịch sử giao dịch
│── /vendor/                // Thư viện JWT (firebase/php-jwt)
│── .htaccess               // Chặn truy cập trực tiếp
│── index.php               // API endpoint chung
