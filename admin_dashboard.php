<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="Style/admin_dashboard.css?v=1" />
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

    <!-- Main Content Area -->
    <div class="main-content">
        <main class="admin-content">
            <h1>Welcome to the Admin Panel</h1>
            <p>Use the navigation menu to manage the system.</p>
            <hr><hr>

            <!-- Display User Count with Badge -->
        <section class="stats">

            <div class="stat-item">
                <h3>Total Users</h3>
                <?php
                // Database connection
                include('config/db_connection.php');

                // Query to count the number of users
                $user_query = "SELECT COUNT(*) AS user_count FROM user";
                $result = mysqli_query($conn, $user_query);
                $user_count = 0;

                if ($result && $row = mysqli_fetch_assoc($result)) {
                    $user_count = $row['user_count'];
                }
                ?>

                <div class="user-badge">
                    <span><?php echo $user_count; ?></span>
                </div>
            </div>
        </section>
                <hr><hr>
        <!-- Donation amount  -->
        <section class="stats">
        <section class="stats">
    <div class="stat-item">
        <h3>Total Amount Donated</h3>
        <?php
        // Database connection
        include('config/db_connection.php');

        // Query to get the total donation amount grouped by fund purpose
        $donation_query = "SELECT fund_purpose, SUM(amount) AS total_amount FROM donation GROUP BY fund_purpose";
        $result = mysqli_query($conn, $donation_query);

        if (mysqli_num_rows($result) > 0) {
            // Display each fund purpose and its total donation amount
            while ($row = mysqli_fetch_assoc($result)) {
                $fund_purpose = $row['fund_purpose'];
                $total_amount = $row['total_amount'];
        ?>

                <div class="donation-badge">
                    <span><?php echo $total_amount; ?> USD</span>
                </div>
                <p><strong>Fund Purpose:</strong> <?php echo $fund_purpose; ?></p>

        <?php
            }
        } else {
            echo "<p>No donations found.</p>";
        }
        ?>
    </div>
</section>


    </div>
    </main>

</body>
</html>
