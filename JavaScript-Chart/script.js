Chart.defaults.font.family = 'calibri';
Chart.defaults.font.size = 14;
Chart.defaults.color = '#0F1035';

function hideTicksAndGrid() {
  return {
    ticks: { display: false },
    grid: { display: false }
  };
}

// Bar Chart
new Chart(document.getElementById('barChart'), {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
      label: 'Votes',
      data: [10, 19, 3],
      backgroundColor: ['red', 'blue', 'yellow']
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Bubble Chart
new Chart(document.getElementById('bubbleChart'), {
  type: 'bubble',
  data: {
    datasets: [{
      label: 'Bubbles',
      data: [{ x: 10, y: 20, r: 10 }, { x: 15, y: 10, r: 15 }],
      backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Mixed Chart
new Chart(document.getElementById('mixedChart'), {
  type: 'bar',
  data: {
    labels: ['A', 'B', 'C'],
    datasets: [
      { type: 'bar', label: 'Bar Dataset', data: [10, 20, 30], backgroundColor: 'gray' },
      { type: 'line', label: 'Line Dataset', data: [30, 10, 20], borderColor: 'red' }
    ]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Line Chart
new Chart(document.getElementById('lineChart'), {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar'],
    datasets: [{
      label: 'Sales',
      data: [65, 59, 80],
      borderColor: 'blue',
      tension: 0.4
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Scatter Chart
new Chart(document.getElementById('scatterChart'), {
  type: 'scatter',
  data: {
    datasets: [{
      label: 'Scatter Dataset',
      data: [{ x: -10, y: 0 }, { x: 0, y: 10 }, { x: 10, y: 5 }],
      backgroundColor: 'purple'
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Doughnut Chart
new Chart(document.getElementById('doughnutChart'), {
  type: 'doughnut',
  data: {
    labels: ['A', 'B', 'C'],
    datasets: [{
      label: 'Data',
      data: [30, 40, 30],
      backgroundColor: ['green', 'orange', 'purple']
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Polar Area Chart
new Chart(document.getElementById('polarChart'), {
  type: 'polarArea',
  data: {
    labels: ['Red', 'Green', 'Yellow'],
    datasets: [{
      data: [11, 16, 7],
      backgroundColor: ['red', 'green', 'yellow']
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});

// Radar Chart
new Chart(document.getElementById('radarChart'), {
  type: 'radar',
  data: {
    labels: ['Speed', 'Strength', 'Agility'],
    datasets: [{
      label: 'Stats',
      data: [65, 59, 90],
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'blue'
    }]
  },
  options: {
    plugins: { legend: { display: false }, title: { display: false } },
    scales: { x: hideTicksAndGrid(), y: hideTicksAndGrid() }
  }
});
