<?php
include('config/db_connection.php');

// Fetch reviews with user names
$sql = "
    SELECT 
        feedback.user_id, 
        user.name AS user_name, 
        feedback.comments, 
        feedback.rating 
    FROM 
        feedback 
    JOIN 
        user 
    ON 
        feedback.user_id = user.user_id 
    ORDER BY 
        feedback.user_id DESC 
    LIMIT 5
";

$result = $conn->query($sql);

$reviews = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = [
            'user_id' => $row['user_id'],
            'name' => $row['user_name'],
            'comments' => $row['comments'],
            'rating' => $row['rating']
        ];
    }
}

// Encode reviews as JSON and output
echo json_encode($reviews, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
