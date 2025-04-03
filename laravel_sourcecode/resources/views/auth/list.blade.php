<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f0f0f0;
        }
        .pagination {
            margin: 20px;
        }
        .pagination a {
            text-decoration: none;
            padding: 8px 12px;
            margin: 0 5px;
            border: 1px solid #ccc;
            background: #f0f0f0;
            color: black;
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
    <h2>Danh sách user</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Age</th>
            <th>git </th>
            <th>Thao tác</th>
        </tr>
        <tbody id="userTable"></tbody>
    </table>
    <div class="pagination" id="pagination"></div>
    <footer>
        Lập trình web @01/2024
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // if (localStorage.getItem("loggedIn") !== "true") {
            //     window.location.href = "login.html"; // Chưa đăng nhập thì quay lại trang login
            // }
        });
        
        const users = JSON.parse(localStorage.getItem("users")) || [];
        const currentUser = users; // Giả lập lấy user đầu tiên
        // console.log(users);
        // for (var i = 0; i < users.length; i++) {
        //     currentUser.username;
        // }

        // const users = [
        //     { username: "UPVH", email: "ATJW@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "IFUK", email: "KULB@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "DZZQ", email: "ERNB@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "NJYY", email: "ROIF@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "YUMG", email: "KITN@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "WZSU", email: "CVTL@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "WXFQ", email: "MIUZ@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "XZOR", email: "YZLV@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "HGGO", email: "OYYX@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'},
        //     { username: "PXZX", email: "YSML@gmail.com", diachi:"tp.Thu Duc", sdt: '0000000123'}
        // ];
        
        function renderTable(page = 1) {
            const rowsPerPage = 5;
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedUsers = users.slice(start, end);
            
            const userTable = document.getElementById("userTable");
            userTable.innerHTML = "";
            
            paginatedUsers.forEach((user, index) => {
                userTable.innerHTML += `
                    <tr>
                        <td>${start + index + 1}</td>
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.tuoi}</td>
                        <td>${user.git}</td>
                        <td>
                            <a href="{{ route('user.updateInfo') }}">Edit</a> | <a href="">View</a> | <a href="#">Delete</a>
                        </td>
                    </tr>
                `;
            });
            renderPagination(page);
        }
        
        function renderPagination(currentPage) {
            const totalPages = Math.ceil(users.length / 5);
            const pagination = document.getElementById("pagination");
            pagination.innerHTML = "";
            
            if (currentPage > 1) {
                pagination.innerHTML += `<a href="#" onclick="renderTable(${currentPage - 1})">Previous</a>`;
            }
            
            for (let i = 1; i <= totalPages; i++) {
                pagination.innerHTML += `<a href="#" onclick="renderTable(${i})">${i}</a>`;
            }
            
            if (currentPage < totalPages) {
                pagination.innerHTML += `<a href="#" onclick="renderTable(${currentPage + 1})">Next</a>`;
            }
        }
        
        renderTable();
    </script>
</body>
</html>
