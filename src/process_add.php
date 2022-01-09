<?php
    // Xử lý giá trị GỬI TỚI
    if(isset($_POST['txttenduan'])){
        $tenduan = $_POST['txtenduan'];
    }

    $nam = $_POST['txtnam'];
    $linhvuc = $_POST['txtlinhvuc'];
    $nhiemvu = $_POST['txtnhiemvu'];
    $coquanthuchien = $_POST['txtcoquan'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','1951064074_kttv_bdkh');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "INSERT INTO duan (tenduan, namthuchien, linhvuc, nhiemvu, coquanthuchien) VALUES ('$tenduan','$nam','$linhvuc','$nhiemvu','$coquanthuchien')";
    // echo $sql;
    $ketqua = mysqli_query($conn,$sql);
    
    if(!$ketqua){
        header("location: error.php"); //Chuyển hướng lỗi
    }else{
        header("location: index.php"); //Chuyển hướng lại Trang Quản trị
    }

    // Bước 03: Đóng kết nối
    mysqli_close($conn);

?>