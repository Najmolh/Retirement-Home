<?php
// Database connection
include('config/db_connection.php');

// Fetch unassigned appointments
$query = "SELECT * FROM appointments WHERE doctor_name IS NULL OR time_slot IS NULL";
$result = mysqli_query($conn, $query);
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <!-- <link rel="stylesheet" href="Style/admin_dashboard.css"> -->
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
        <h1>Unassigned Appointments</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <form action="assign_appointment.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Details</th>
                            <th>Assign Doctor</th>
                            <th>Assign Time Slot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['health_issue']; ?></td>
                                <td>
                                    <input type="text" name="doctor_name[<?php echo $row['id']; ?>]" placeholder="Enter Doctor's Name" required>
                                </td>
                                <td>
                                    <input type="time" name="time_slot[<?php echo $row['id']; ?>]" required>
                                </td>
                                <td>
                                    <button type="submit" name="assign" value="<?php echo $row['id']; ?>">Assign</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
        <?php else: ?>
            <p>No unassigned appointments available.</p>
        <?php endif; ?>
    </main>
</body>
</html>
