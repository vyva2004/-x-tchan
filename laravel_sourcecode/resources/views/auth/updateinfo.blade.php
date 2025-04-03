<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f8f9fa;
        }
        .browser {
            background: #ddd;
            padding: 10px;
            text-align: left;
        }
        .address-bar {
            background: white;
            padding: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            width: 80%;
        }
        nav {
            background: #fff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        nav a {
            text-decoration: none;
            color: black;
            margin: 0 10px;
        }
        nav .active {
            font-weight: bold;
        }
        .update-container {
            background: white;
            padding: 20px;
            width: 300px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            text-align: left;
            margin: 5px 0;
        }
        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button {
            background: blue;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background: darkblue;
        }
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <nav>
     <a href="/">Home</a> | <a href="{{ route('login') }}">Đăng nhập</a> | <a href="{{ route('user.createUser') }}" class="active">Đăng ký</a>
    </nav>
    <div class="update-container">
        <h2>Màn hình cập nhật</h2>
        <p class="error" id="errorMessage"></p>
        <form id="updateForm">
            <label for="username">Username</label>
            <input type="text" id="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" required>

            <label for="tuoi">Age</label>
            <input type="text" id="tuoi" required>

            <label for="git">Git</label>
            <input type="text" id="git" required>

            <button type="submit">Cập nhật</button>
        </form>
        <a href="login.html">Đã có tài khoản</a>
    </div>
    <footer>
        Lập trình web @01/2024
    </footer>

    <script>
        // Lấy thông tin người dùng từ localStorage (giả lập)
        document.addEventListener("DOMContentLoaded", function () {
            const users = JSON.parse(localStorage.getItem("users")) || [];
            const currentUser = users[0]; // Giả lập lấy user đầu tiên

            if (currentUser) {
                document.getElementById("username").value = currentUser.username;
                document.getElementById("email").value = currentUser.email;
                document.getElementById("tuoi").value = currentUser.age;
                document.getElementById("git").value = currentUser.Git;
            }
        });

        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const username = document.getElementById("username").value;
            // const password = document.getElementById("password").value;
            // const confirmPassword = document.getElementById("confirmPassword").value;
            const email = document.getElementById("email").value;
            const tuoi = document.getElementById("tuoi").value;
            const git = document.getElementById("git").value;
            const errorMessage = document.getElementById("errorMessage");

            // if (password !== confirmPassword) {
            //     errorMessage.textContent = "Mật khẩu nhập lại không khớp!";
            //     return;
            // }

            // Cập nhật dữ liệu trong localStorage
            let users = JSON.parse(localStorage.getItem("users")) || [];

            // users[0] = { username, password, email }; // Giả lập cập nhật user đầu tiên
            users[0] = { username, email, tuoi,  git};
            localStorage.setItem("users", JSON.stringify(users));

            alert("Cập nhật thành công!");
            window.location.href = "{{ route('user.list') }}"; // Chuyển hướng về trang danh sách
        });
    </script>
</body>
</html>
