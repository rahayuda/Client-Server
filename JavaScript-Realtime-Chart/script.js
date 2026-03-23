// script.js
import { firebaseConfig } from './config.js';
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
import { getDatabase, ref, onValue } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-database.js";

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const sensorRef = ref(db, 'SensorData');

// --- Polar Area Chart ---
const ctx = document.getElementById('sensorChart').getContext('2d');
const sensorChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Sensor X', 'Sensor Y', 'Sensor Z'],
        datasets: [{
            label: 'Sensor Axis Values',
            data: [0, 0, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            r: {
                min: -15, // Diperlebar agar data tidak mepet
                max: 15,
                ticks: { stepSize: 2 }
            }
        }
    }
});

// --- Bubble Chart ---
const bubbleCtx = document.getElementById('bubbleChart').getContext('2d');
const bubbleChart = new Chart(bubbleCtx, {
    type: 'bubble',
    data: {
        datasets: [{
            label: 'Akselerometer',
            data: [{ x: 0, y: 0, r: 5 }],
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)'
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: { min: -15, max: 15 },
            y: { min: -15, max: 15 }
        }
    }
});

// --- Realtime update dari Firebase ---
onValue(sensorRef, (snapshot) => {
    const data = snapshot.val();
    
    // Sesuai struktur di gambar: data.sensor mengandung x, y, z
    if (data && data.sensor) {
        const { x, y, z } = data.sensor;

        // Update Polar Chart
        sensorChart.data.datasets[0].data = [x, y, z];
        sensorChart.update();

        // Update Bubble Chart
        const magnitude = Math.sqrt(x*x + y*y + z*z);
        bubbleChart.data.datasets[0].data = [{
            x: x,
            y: y,
            r: Math.min(Math.max(magnitude * 2, 5), 30) // r dinamis agar lebih visual
        }];
        bubbleChart.update();
    }
}, (error) => {
    console.error("Gagal mengambil data Firebase:", error);
});
