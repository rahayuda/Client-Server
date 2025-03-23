let notificationCount = 0;

// Fungsi untuk warna acak
function getRandomColor() {
    let letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function showNotification() {
    notificationCount++;

    let notificationContainer = document.getElementById("notification-container");

    // Buat elemen notifikasi utama
    let notification = document.createElement("div");
    notification.classList.add("notification");
    notification.style.background = getRandomColor();

    // Buat header notifikasi
    let header = document.createElement("div");
    header.classList.add("notification-header");
    header.innerText = "Notifikasi";

    // Buat body notifikasi
    let body = document.createElement("div");
    body.classList.add("notification-body");
    body.innerText = `Halo! Ini adalah notifikasi ${notificationCount}`;

    // Buat footer dengan tanggal & waktu
    let footer = document.createElement("div");
    footer.classList.add("notification-footer");
    footer.innerText = new Date().toLocaleString(); // Menampilkan waktu saat notifikasi muncul

    // Event klik untuk menutup notifikasi
    notification.onclick = function () {
        notification.style.opacity = "0";
        setTimeout(() => {
            notification.remove();
        }, 500);
    };

    // Gabungkan semua elemen ke dalam notifikasi utama
    notification.appendChild(header);
    notification.appendChild(body);
    notification.appendChild(footer);

    // Tambahkan ke dalam container
    notificationContainer.appendChild(notification);

    // Hapus otomatis setelah 3 detik jika tidak diklik
    setTimeout(() => {
        if (document.body.contains(notification)) {
            notification.style.opacity = "0";
            setTimeout(() => {
                notification.remove();
            }, 500);
        }
    }, 3000);
}
