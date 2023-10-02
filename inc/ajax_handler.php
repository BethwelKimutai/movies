<?php
include('db_connection.php'); // Include the database connection code

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Handle AJAX request to fetch data
    if ($action === 'fetch_data') {
        $category = $_GET['category'];

        // Construct and execute the SQL query based on the category
        $stmt = $conn->prepare("SELECT * FROM media WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return data as JSON
        echo json_encode($result);
    }
} else {
    echo "Invalid request";
}
?>
