<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Liên Hệ</title>
    
  
</head>
<body>
    <div class="container">
        <h1>Thông tin Liên Hệ</h1>
        <h2>{{ $title }}</h2>
        <p><span class="label">Họ và tên:</span> {{ $fullname }}</p>
        <p><span class="label">Email:</span> {{ $email }}</p>
        <p><span class="label">Số điện thoại:</span> {{ $phone }}</p>
        <p><span class="label">Nội dung:</span></p>
        <div class="message-content">
            {{ $messageContent }}
        </div>
    </div>
</body>
</html>
