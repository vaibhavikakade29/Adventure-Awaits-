<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adventure Admin Dashboard</title>
  <link rel="stylesheet" href="css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-header">
        <img src="img/banner/logo.jpg" alt="Adventure Logo" class="logo">
        <h5>"Where Every Journey is an Adventure!"</h5>
      </div>
      <ul class="sidebar-menu">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="usermgmt.php">User Management</a></li>
        <li><a href="bookingsmgmt.php">Booking Management</a></li>
        <li><a href="contactmgmt.php">Contact Management</a></li>
        <li><a href="reviewsmgmt.php">Review Management</a></li>
        
      </ul>
    </div>
    
    <div class="main-content">
      <header>
        <h1>Welcome To<br> Adventure Admin Dashboard</h1>
      </header>
      
      <div class="summary">
        <h2>Summary Statistics</h2>
        <div class="summary-stats">
          <div class="summary-stat">
            <h3>Total Adventures</h3>
            <p>120</p>
          </div>
          <div class="summary-stat">
            <h3>Total Bookings</h3>
            <p>450</p>
          </div>
          <div class="summary-stat">
            <h3>Total Revenue</h3>
            <p>₹1,20,000</p>
          </div>
          <div class="summary-stat">
            <h3>Upcoming Bookings</h3>
            <p>75</p>
          </div>
        </div>
        <div class="summary-stats">
          <div class="summary-stat">
            <h3>Total Visitors</h3>
            <p>5000</p>
          </div>
          <div class="summary-stat">
            <h3>New Registrations</h3>
            <p>100</p>
          </div>
          <div class="summary-stat">
            <h3>Cancel Booking</h3>
            <p>30</p>
          </div>
          <div class="summary-stat">
            <h3>Recent Feedback</h3>
            <p>5</p>
          </div>
        </div>
      </div>
      
      <div class="charts">
        <h2>Adventure Distribution</h2>
        <canvas id="adventureChart" width="400" height="300"></canvas>
      </div>
      
      <script>
        const adventures = {
          land: ["Mountain Trekking", "Forest Hiking", "Desert Safari", "Cave Exploration", "Rock Climbing", "Wildlife Safari"],
          water: ["River Rafting", "Scuba Diving", "Snorkeling", "Fishing", "Kayaking", "Waterfall Rappelling"],
          air: ["Paragliding", "Hot Air Balloon", "Skydiving", "Helicopter Ride", "Bungee Jumping", "Gliding"]
        };

        const ctx = document.getElementById('adventureChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Land Adventures', 'Water Adventures', 'Air Adventures'],
            datasets: [{
              label: 'Number of Adventures',
              data: [adventures.land.length, adventures.water.length, adventures.air.length],
              backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: false
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </div>
</body>
</html>
