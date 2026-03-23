import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
import { getDatabase, ref, onValue } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-database.js";

const firebaseConfig = {
	apiKey: "AIzaSyD-4viZ0SJcKW-vRwjDOZtXjhLhXPWXnDw",
	authDomain: "sensoremulator.firebaseapp.com",
	databaseURL: "https://sensoremulator-default-rtdb.firebaseio.com",
	projectId: "sensoremulator",
	storageBucket: "sensoremulator.appspot.com",
	messagingSenderId: "410626311115",
	appId: "1:410626311115:web:24c25cd8ef9e62b62bec4e",
	measurementId: "G-QESD44RL09"
};

const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const sensorRef = ref(db, 'SensorData');

// Polar Area Chart
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
				min: -10,
				max: 10,
				ticks: {
					stepSize: 1
				}
			}
		}
	}
});

// Bubble Chart
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
			x: {
				title: { display: false },
				min: -15,
				max: 15,
				ticks: { display: false }
			},
			y: {
				title: { display: false },
				min: -15,
				max: 15,
				ticks: { display: false }
			}
		}
	}
});

// Realtime update dari Firebase
onValue(sensorRef, (snapshot) => {
	const data = snapshot.val();
	if (data && data.sensor) {
		const { x, y, z } = data.sensor;

		// --- Update Polar Chart ---
		sensorChart.data.datasets[0].data = [x, y, z];
		sensorChart.update();

		// --- Update Bubble Chart ---
		const magnitude = Math.sqrt(x*x + y*y + z*z);
		bubbleChart.data.datasets[0].data = [{
			x: x,
			y: y,
			r: Math.min(Math.max(magnitude, 2), 20)
		}];
		bubbleChart.update();
	}
});
