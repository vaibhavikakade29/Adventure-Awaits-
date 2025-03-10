<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="css/dashboard.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      loadUsers();
    });

    function loadUsers() {
      $.ajax({
        url: 'fetch_users.php',
        method: 'GET',
        success: function(response) {
          $('#userTable tbody').html(response);
        }
      });
    }

    function deleteUser(userId) {
      if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
          url: 'delete_user.php',
          method: 'POST',
          data: { id: userId },
          success: function() {
            loadUsers();
          }
        });
      }
    }
  </script>
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
      <h2>Booking Management</h2>
      <table id="userTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Adventure Name</th>
            <th>Booking Date</th>
            <th>Adventure Package</th>
            <th>No.of Members</th>
            <th>Total Price</th>
            
          </tr>
        </thead>
        <tbody>
            <?php
            include 'database.php'; // Include database connection
            
            $sql = "SELECT id, username,  email, phone, adventure, date, package,     total_people,   total_price FROM bookings";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['adventure']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['adventure']}</td>
                            <td>{$row['package']}</td>
                            <td>{$row['total_people']}</td>
                            <td>{$row['total_price']}</td>
                           
                            
                            
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No users found</td></tr>";
            }
            
            $conn->close();
            ?>
            
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
