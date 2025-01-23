<?php
// Database connection
include('config/db_connection.php');

// Fetch contact requests (assuming there is a table 'contact' with fields 'name', 'email', and 'message')
$query = "SELECT * FROM contact WHERE name IS NOT NULL AND email IS NOT NULL AND message IS NOT NULL";
$result = mysqli_query($conn, $query);
?>  
  


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="Style/admin_dashboard.css?v=1" />
    <link rel="stylesheet" type="text/css" href="Style/unassigned_appointment.css?v=1" />
</head>
<body>
    <!-- Admin Sidebar -->
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="admin_manage_users.php">Manage Users</a></li>
                <li><a href="admin_manage_contact.php">Contact Requests</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <main>
        <h1>Contact Requests</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No contact requests available.</p>
        <?php endif; ?>
    </main>
</body>
</html>
