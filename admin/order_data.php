<?php 
session_start();

include 'koneksi.php';

$query = "SELECT 
            orders.id, 
            users.name AS customer_name, 
            services.name AS service_name, 
            orders.created_at, 
            orders.amount, 
            orders.status
          FROM orders
          JOIN users ON orders.user_id = users.id
          JOIN services ON orders.service_id = services.id
          ORDER BY orders.created_at DESC
          LIMIT 7";

$result = mysqli_query($conn, $query);

$_SESSION['orders'] = [];
while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['orders'][] = $row;
}
$statsQuery = "SELECT 
  COUNT(*) AS total_orders,
  COUNT(IF(status = 'pending', 1, NULL)) AS pending_orders,
  COUNT(IF(status = 'completed', 1, NULL)) AS completed_orders,
  SUM(IF(status = 'completed', amount, 0)) AS total_revenue
FROM orders";

$statsResult = mysqli_query($conn, $statsQuery);
$stats = mysqli_fetch_assoc($statsResult);
?>