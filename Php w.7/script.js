// ฟังก์ชันเปิด Modal และเริ่มต้นการจอง
function openBookingModal(roomType, price) {
    const bookingData = {
        roomType: roomType,
        basePrice: price,
        nights: 1,
        guests: 1,
        totalPrice: price
    };

    // เก็บข้อมูลใน session storage
    sessionStorage.setItem('bookingData', JSON.stringify(bookingData));

    // ตั้งค่าฟอร์ม
    initializeBookingForm(bookingData);

    // แสดง Modal
    new bootstrap.Modal(document.getElementById('bookingModal')).show();
}

// ฟังก์ชันเริ่มต้นฟอร์มการจอง
function initializeBookingForm(bookingData) {
    const form = document.getElementById('bookingForm');
    form.reset();

    // ตั้งค่าวันที่ขั้นต่ำ
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    const checkInInput = document.querySelector('input[name="checkIn"]');
    const checkOutInput = document.querySelector('input[name="checkOut"]');

    checkInInput.min = today.toISOString().split('T')[0];
    checkInInput.value = today.toISOString().split('T')[0];
    checkOutInput.min = tomorrow.toISOString().split('T')[0];
    checkOutInput.value = tomorrow.toISOString().split('T')[0];

    // ตั้งค่าข้อมูลเริ่มต้น
    document.getElementById('roomType').value = bookingData.roomType;
    document.getElementById('basePrice').value = bookingData.basePrice;
    
    updatePriceSummary(bookingData);
}

// ฟังก์ชันคำนวณราคาและรายละเอียดการจอง
function calculateBookingDetails() {
    const bookingData = JSON.parse(sessionStorage.getItem('bookingData'));
    const checkIn = new Date(document.querySelector('input[name="checkIn"]').value);
    const checkOut = new Date(document.querySelector('input[name="checkOut"]').value);
    const guests = parseInt(document.querySelector('select[name="guests"]').value);

    const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
    
    // คำนวณราคาพิเศษตามจำนวนคืน
    let pricePerNight = bookingData.basePrice;
    if (nights >= 7) {
        pricePerNight *= 0.85; // ส่วนลด 15% สำหรับการพัก 7 คืนขึ้นไป
    } else if (nights >= 3) {
        pricePerNight *= 0.90; // ส่วนลด 10% สำหรับการพัก 3-6 คืน
    }

    // คำนวณราคาเพิ่มเติมตามจำนวนผู้เข้าพัก
    let guestSurcharge = 0;
    if (guests > 2) {
        guestSurcharge = (guests - 2) * 500; // คิดค่าบริการเพิ่ม 500 บาทต่อคนที่เกิน
    }

    const totalPrice = (pricePerNight * nights) + (guestSurcharge * nights);

    return {
        roomType: bookingData.roomType,
        basePrice: bookingData.basePrice,
        pricePerNight: pricePerNight,
        nights: nights,
        guests: guests,
        guestSurcharge: guestSurcharge,
        totalPrice: totalPrice
    };
}

// ฟังก์ชันอัพเดทการแสดงผลสรุปราคา
function updatePriceSummary(details) {
    const discountText = details.pricePerNight < details.basePrice 
        ? `<div class="price-row discount">
            <span>ส่วนลดพิเศษ:</span>
            <span>-฿${(details.basePrice - details.pricePerNight).toLocaleString()}/คืน</span>
           </div>` 
        : '';

    const guestSurchargeText = details.guestSurcharge > 0 
        ? `<div class="price-row surcharge">
            <span>ค่าบริการผู้เข้าพักเพิ่มเติม:</span>
            <span>฿${details.guestSurcharge.toLocaleString()}/คืน</span>
           </div>` 
        : '';

    const summaryHTML = `
        <h4>สรุปการจอง</h4>
        <div class="price-row">
            <span>ประเภทห้อง:</span>
            <span>${details.roomType}</span>
        </div>
        <div class="price-row">
            <span>ราคาปกติ:</span>
            <span>฿${details.basePrice.toLocaleString()}/คืน</span>
        </div>
        ${discountText}
        ${guestSurchargeText}
        <div class="price-row">
            <span>จำนวนคืน:</span>
            <span>${details.nights} คืน</span>
        </div>
        <div class="price-row">
            <span>จำนวนผู้เข้าพัก:</span>
            <span>${details.guests} ท่าน</span>
        </div>
        <div class="price-row total">
            <span>ราคารวมทั้งสิ้น:</span>
            <span>฿${details.totalPrice.toLocaleString()}</span>
        </div>
    `;
    
    document.querySelector('.price-summary').innerHTML = summaryHTML;
    document.getElementById('totalPrice').value = details.totalPrice;
}

// ฟังก์ชันส่งฟอร์มการจอง
function submitBooking(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const searchParams = new URLSearchParams();

    for (const [key, value] of formData.entries()) {
        searchParams.append(key, value);
    }

    // ส่งต่อไปยังหน้า confirmation พร้อมข้อมูลการจอง
    window.location.href = `confirmation.html?${searchParams.toString()}`;
}

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bookingForm');
    const inputs = form.querySelectorAll('input[type="date"], select[name="guests"]');

    inputs.forEach(input => {
        input.addEventListener('change', function() {
            const details = calculateBookingDetails();
            if (details) updatePriceSummary(details);
        });
    });
});

// Room Cards Animation
const roomCards = document.querySelectorAll('.room-card');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });

roomCards.forEach(card => {
    observer.observe(card);
});

// Loader
window.addEventListener('load', () => {
    setTimeout(() => {
        document.querySelector('.loader-container').style.opacity = '0';
        setTimeout(() => {
            document.querySelector('.loader-container').style.display = 'none';
        }, 500);
    }, 2000);
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
