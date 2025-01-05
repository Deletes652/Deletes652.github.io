<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการจอง - Luxury Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="confirmation-section py-5">
        <div class="container">
            <div class="confirmation-card">
                <div class="confirmation-header">
                    <i class="fas fa-check-circle"></i>
                    <h2>การจองสำเร็จ</h2>
                </div>
                <div class="confirmation-details">
                    <?php
                    function convertToThaiText($number) {
                        $number = str_replace(",","",$number);
                        $digit = ["", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า"];
                        $position = ["", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน"];
                        $number = str_replace(",","",$number);
                        $number = explode(".",$number);
                        $ret = "";
                        $len = strlen($number[0]);
                        
                        for($i = 0; $i < $len; $i++) {
                            $current = substr($number[0], $len-$i-1, 1);
                            if($current != 0) {
                                if($i == 1 && $current == 1) {
                                    $ret = "สิบ".$ret;
                                } else if($i == 1 && $current == 2) {
                                    $ret = "ยี่สิบ".$ret;
                                } else {
                                    $ret = $digit[$current].$position[$i].$ret;
                                }
                            }
                        }
                        
                        $ret .= "บาทถ้วน";
                        return $ret;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $roomType = $_POST['roomType'];
                        $checkIn = $_POST['checkIn'];
                        $checkOut = $_POST['checkOut'];
                        $guests = $_POST['guests'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $totalPrice = $_POST['totalPrice'];
                        
                        echo "<div class='detail-row'>
                                <span class='label'>ประเภทห้อง:</span>
                                <span class='value'>$roomType</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>วันที่เช็คอิน:</span>
                                <span class='value'>$checkIn</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>วันที่เช็คเอาท์:</span>
                                <span class='value'>$checkOut</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>จำนวนผู้เข้าพัก:</span>
                                <span class='value'>$guests ท่าน</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>ชื่อผู้จอง:</span>
                                <span class='value'>$name</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>อีเมล:</span>
                                <span class='value'>$email</span>
                            </div>";
                        echo "<div class='detail-row'>
                                <span class='label'>เบอร์โทรศัพท์:</span>
                                <span class='value'>$phone</span>
                            </div>";
                        echo "<div class='detail-row total'>
                                <span class='label'>ราคารวมทั้งสิ้น:</span>
                                <span class='value'>฿$totalPrice</span>
                            </div>";
                        echo "<div class='thai-text-price'>
                                (" . convertToThaiText($totalPrice) . ")
                            </div>";
                    }
                    ?>
                </div>
                <div class="confirmation-footer">
                    <p>ขอบคุณที่เลือกใช้บริการ Luxury Hotel</p>
                    <p>เราจะส่งรายละเอียดการจองไปยังอีเมลของท่าน</p>
                    <a href="index.php" class="btn-home">กลับสู่หน้าหลัก</a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
