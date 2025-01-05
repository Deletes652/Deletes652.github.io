<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ห้องพัก - Luxury Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Loader -->
    <div class="loader-container">
        <div class="loader"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">LUXURY HOTEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="rooms.php">ห้องพัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#facilities">สิ่งอำนวยความสะดวก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/bannsuan.amaleena">ติดต่อเรา</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Rooms Section -->
    <section class="rooms-section py-5 mt-5">
        <div class="container"><br><br>
            <h2 class="section-title text-center mb-5">ห้องพักของเรา</h2>
            <div class="row">
                <!-- Deluxe Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="room-card">
                        <div class="room-image-container">
                            <img src="image3.jpg" alt="Deluxe Room" class="room-image">
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">ห้องดีลักซ์</h3>
                            <ul class="room-amenities">
                                <li><i class="fas fa-user"></i> สำหรับ 2 ท่าน</li>
                                <li><i class="fas fa-utensils"></i> อาหารเช้าระดับพรีเมียม</li>
                                <li><i class="fas fa-wifi"></i> Free High-Speed WiFi</li>
                                <li><i class="fas fa-swimming-pool"></i> สระว่ายน้ำ</li>
                                <li><i class="fas fa-spa"></i> สปาและฟิตเนส</li>
                            </ul>
                            <div class="room-price">฿5,000 / คืน</div>
                            <button class="btn-book-now" onclick="openBookingModal('ห้องดีลักซ์', 5000)">จองเลย</button>
                        </div>
                    </div>
                </div>

                <!-- Suite Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="room-card">
                        <div class="room-image-container">
                            <img src="image22.webp" alt="Suite Room" class="room-image">
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">ห้องสวีท</h3>
                            <ul class="room-amenities">
                                <li><i class="fas fa-user"></i> สำหรับ 2 ท่าน</li>
                                <li><i class="fas fa-utensils"></i> อาหารเช้าระดับพรีเมียม</li>
                                <li><i class="fas fa-wifi"></i> Free High-Speed WiFi</li>
                                <li><i class="fas fa-swimming-pool"></i> สระว่ายน้ำส่วนตัว</li>
                                <li><i class="fas fa-spa"></i> สปาและฟิตเนส</li>
                                <li><i class="fas fa-motorcycle"></i> บริการรถมอเตอร์ไซค์</li>
                            </ul>
                            <div class="room-price">฿8,000 / คืน</div>
                            <button class="btn-book-now" onclick="openBookingModal('ห้องสวีท', 8000)">จองเลย</button>
                        </div>
                    </div>
                </div>

                <!-- Premium Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="room-card">
                        <div class="room-image-container">
                            <img src="image2.jpg" alt="Premium Suite" class="room-image">
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">ห้องพรีเมียม</h3>
                            <ul class="room-amenities">
                                <li><i class="fas fa-user"></i> สำหรับ 2 ท่าน</li>
                                <li><i class="fas fa-utensils"></i> อาหารเช้าระดับพรีเมียม</li>
                                <li><i class="fas fa-wifi"></i> Free High-Speed WiFi</li>
                                <li><i class="fas fa-swimming-pool"></i> สระว่ายน้ำส่วนตัว</li>
                                <li><i class="fas fa-spa"></i> สปาและฟิตเนส</li>
                                <li><i class="fas fa-ship"></i> ทริปท่องเที่ยวเกาะบนเรือสำราญสุดพิเศษ</li>
                            </ul>
                            <div class="room-price">฿15,000 / คืน</div>
                            <button class="btn-book-now" onclick="openBookingModal('ห้องพรีเมียม', 15000)">จองเลย</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">จองห้องพัก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="confirmation.php" method="POST" id="bookingForm">
                        <input type="hidden" name="roomType" id="roomType">
                        <input type="hidden" name="basePrice" id="basePrice">
                        <input type="hidden" name="totalPrice" id="totalPrice">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>วันที่เช็คอิน</label>
                                <input type="date" class="form-control" name="checkIn" required>
                            </div>
                            <div class="col-md-6">
                                <label>วันที่เช็คเอาท์</label>
                                <input type="date" class="form-control" name="checkOut" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label>จำนวนผู้เข้าพัก</label>
                            <select class="form-control" name="guests" required>
                                <option value="1">1 ท่าน</option>
                                <option value="2">2 ท่าน</option>
                                <option value="3">3 ท่าน (+500 บาท/คืน)</option>
                                <option value="4">4 ท่าน (+1,000 บาท/คืน)</option>
                            </select>
                            <small class="text-muted">*หมายเหตุ: มีค่าบริการเพิ่มเติมสำหรับผู้เข้าพักเกิน 2 ท่าน</small>
                        </div>
                        
                        <div class="mb-3">
                            <label>ชื่อผู้จอง</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>อีเมล</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" class="form-control" name="phone" pattern="[0-9]{10}" required>
                            <small class="text-muted">กรุณากรอกหมายเลขโทรศัพท์ 10 หลัก</small>
                        </div>
                        
                        <div class="price-summary card p-3 mb-3">
                            <!-- ส่วนนี้จะถูกอัพเดทด้วย JavaScript -->
                        </div>

                        <div class="alert alert-info">
                            <strong>โปรโมชั่นพิเศษ!</strong>
                            <ul>
                                <li>จองตั้งแต่ 3 คืนขึ้นไป รับส่วนลด 10%</li>
                                <li>จองตั้งแต่ 7 คืนขึ้นไป รับส่วนลด 15%</li>
                            </ul>
                        </div>
                        
                        <button type="submit" class="btn-book-now w-100 mt-4">ยืนยันการจอง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
