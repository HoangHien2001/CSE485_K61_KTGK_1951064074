<?php
    // deleteEmployee: NHẬN DỮ LIỆU TỪ admin.php gửi sang
    $maduan = $_GET['maduan'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','1951064074_kttv_bdkh');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "SELECT * FROM duan WHERE maduan = '$maduan'";

    $result = mysqli_query($conn,$sql); //Nó chỉ ra về 1 bản ghi, mà mình chỉ cần lấy 1 bản ghi thôi

    // Bước 03: Xử lý kết quả
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $idphim = $row['maduan'];
    }

    // Bước 04: Đóng kết nối
    mysqli_close($conn);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dự án</a>
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">Thoát</button>
                </form>
                </div>
            </div>
            </nav>
        </div>
    </header>
    <main>
    <div class="container">
        <h5 class="text-center text-primary mt-5">Sửa thông tin</h5>
    
        <form action="process-pdate.php" method="post">

            <div class="form-group">
                <label for="txttenduan">Tên dự án</label>
                <input type="text" class="form-control" id="txttenduan" name="txttenduan" placeholder="Nhập tên dự án" value="<?php echo $row['tenduan']; ?>">
              
            </div>
            <div class="form-group">
                <label for="txtnam">Năm thực hiện</label>
                <input type="text" class="form-control" id="txtnam" name="txtnam" placeholder="Nhập năm dự án" value="<?php echo $row['namduan']; ?>">
                
            </div>
            <div class="form-group">
                <label for="txtlinhvuc">Lĩnh vực</label>
                <input type="text" class="form-control" id="txtlinhvuc" name="txtlinhvuc" placeholder="Lĩnh vực" value="<?php echo $row['linhvuc']; ?>">
              
            </div>
            <div class="form-group">
                <label for="txnhiemvu">Nhiệm vụ</label>
                <input type="text" class="form-control" id="txtnhiemvu" name="txtnhiemvu" placeholder="Nhập nhiệm vụ" value="<?php echo $row['nhiemvu']; ?>">
              
            </div>
            <div class="form-group">
                <label for="txtcoquan">Cơ quan thực hiện</label>
                <input type="text" class="form-control" id="txtcoquan" name="txtcoquan" placeholder="Nhập cơ quan thực hiện" value="<?php echo $row['coquanthuchien']; ?>">
               
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>
        </form>
    </div>    
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>