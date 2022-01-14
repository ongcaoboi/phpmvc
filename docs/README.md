# Ví dụ hay trong học lập trình
## Đây là dụ án cuối kỳ môn lập trình web
## Dự án do 3 sinh viên gồm:
- Trưởng nhóm: Hứa Tuấn Anh
- Thành viên: Nguyễn Văn Hoài Trung
- Thành viên: Lê Hồng Tụ

## Tông tin dự án
### Ngôn ngữ sử dụng 
- Back-end: Php
- Font-end: Html, css, javascript, jquery-ajax
- Database: MySql
### Thư viện được nhúng và sử dụng
- PHPMailer-master: Thư viện dùng để gửi mail
- Ckeditor: Thư viện soạn thảo văn bản trên trình duyệt
- Prism: Thư viện tô màu cho code
- Bootstrap, jquery
## Cấu trúc thư mục
### docs:
- Thư mục Bao-Cao: Chứa các file báo cáo hằng tuần và file báo cáo cuối kỳ
- Thư mục database: Chức file sql của dự án
- File README.md 
### viduhaytronglaptrinh.tat : thư mục source code của dự án
- Thư mục config: Chứa file cấu hình 
- Thư mục Controllers: Chức các controller thực hiện xử lý từng chức năng
- Thư mục core: Chứa file App.php điều hướng luồng dữ liệu qua các controller tương ứng dựa vào url
- Thư mục Models: Chứa các file model xử lý truy vấn đến database
- Thư mục PHPMailer-master: Thư viện gửi mail
- Thư mục public: Chứa các thư viện font-end và các file tĩnh
- Thư mục Views: Chứa các file xử lý giao diện của dự án
- File .htaccess: cấu hình lại đường dẫn của server
- File index.php file root của dự án, mọi chức năng của dự án đều được đi qua đây để xử lý
