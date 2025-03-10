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
      <h2>Review Management</h2>
      <table id="userTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Message</th>
            <th>Rating</th>
            
          </tr>
        </thead>
        <tbody>
    <?php
    include 'database.php'; // Include database connection
    
    $sql = "SELECT id, name, review, rating FROM reviews";
    $result = $conn->query($sql);
    
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['review']}</td>
                    <td>{$row['rating']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No users found</td></tr>";
    }
    
    $conn->close();
    ?>
</tbody>
      </table>
    </div>
  </div>
</body>
</html>
