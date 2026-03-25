# Software Requirements Specification (SRS) - WebNangCao

## 1. Chức năng Đăng ký / Đăng nhập (`login.php`, `register.php`)
* **Mô tả:** Cho phép người dùng tạo tài khoản và truy cập vào hệ thống.
* **Tác nhân:** Người dùng.
* **Luồng chính:** Người dùng nhập Email/Username và Mật khẩu -> Hệ thống kiểm tra trong Database -> Chuyển hướng đến Dashboard nếu thành công.

## 2. Chức năng Quản lý Sinh viên (`list_students.php`, `add_student.php`)
* **Mô tả:** Hiển thị danh sách và thêm mới thông tin sinh viên vào hệ thống.
* **Tác nhân:** Admin/Giảng viên.
* **Luồng chính:** Chọn "Thêm sinh viên" -> Nhập thông tin (Tên, MSSV, Lớp) -> Hệ thống lưu vào DB và hiển thị lại tại trang danh sách.

## 3. Chức năng Giỏ hàng (`cart.php`)
* **Mô tả:** Cho phép người dùng quản lý các mục đã chọn trước khi xác nhận.
* **Tác nhân:** Người dùng.
* **Luồng chính:** Người dùng thêm sản phẩm/khóa học -> Hệ thống lưu vào session/database -> Người dùng có thể xem, xóa hoặc cập nhật số lượng trong giỏ hàng.
