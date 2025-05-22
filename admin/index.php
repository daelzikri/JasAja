<?php
include 'order_data.php';
include 'koneksi.php'; 

$testimonialQuery = "
    SELECT 
        testimonials.id,
        users.name AS customer_name,
        services.name AS service_name,
        testimonials.testimonial_text,
        testimonials.status
    FROM testimonials
    INNER JOIN users ON testimonials.user_id = users.id
    INNER JOIN services ON testimonials.service_id = services.id
    ORDER BY testimonials.id DESC
";

$testimonialResult = mysqli_query($conn, $testimonialQuery);




$testimonialCount = mysqli_num_rows($testimonialResult);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      .sidebar {
        min-height: 100vh;
        background-color: #343a40;
      }
      .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.75);
      }
      .sidebar .nav-link:hover {
        color: white;
        background-color: rgba(255, 255, 255, 0.1);
      }
      .sidebar .nav-link.active {
        color: white;
        background-color: rgba(255, 255, 255, 0.2);
      }
      .status-badge {
        font-size: 0.8rem;
        padding: 0.35em 0.65em;
      }
      .card-counter {
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: 0.3s linear all;
      }
      .card-counter:hover {
        box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.3);
        transition: 0.3s linear all;
      }
      .card-counter.primary {
        background-color: #007bff;
        color: #fff;
      }
      .card-counter.danger {
        background-color: #ef5350;
        color: #fff;
      }
      .card-counter.success {
        background-color: #66bb6a;
        color: #fff;
      }
      .card-counter.info {
        background-color: #26c6da;
        color: #fff;
      }
      .card-counter i {
        font-size: 3rem;
        opacity: 0.5;
        position: relative;
      }
      .card-counter .count-numbers {
        padding-left: 10px;

        right: 35px;
        top: 20px;
        font-size: 2rem;
        display: inline;
      }
      .card-counter .count-name {
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.8;
        display: block;
        font-size: 1rem;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-sm-2 px-0 sidebar">
          <div class="text-center py-4">
            <h4 class="text-white">JasAja</h4>
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#dashboard" data-bs-toggle="tab">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#orders" data-bs-toggle="tab">
                <i class="fas fa-shopping-cart me-2"></i>Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services" data-bs-toggle="tab">
                <i class="fas fa-concierge-bell me-2"></i>Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonials" data-bs-toggle="tab">
                <i class="fas fa-comment me-2"></i>Testimonial
              </a>
            </li>
          
            <li class="nav-item mt-4">
              <a class="nav-link" href="../beranda/index.php">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
              </a>
            </li>
          </ul>
        </div>

        <!-- Main Content -->
        <div class="col-sm-10">
          <nav class="navbar navbar-light bg-light">
            <div class="container-lg">
              <span class="navbar-brand mb-0 h1">Dashboard</span>
              
            </div>
          </nav>

          <div class="tab-content p-4">
            <!-- Dashboard Tab -->
            <div class="tab-pane fade show active" id="dashboard">
              <h2 class="mb-4">Dashboard Overview</h2>

              <div class="row mb-4">
                <div class="col-lg-3">
                  <div class="card-counter primary">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="count-numbers"><?php echo $stats['total_orders']; ?></span>
                    <span class="count-name">Total Orders</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card-counter danger">
                    <i class="fas fa-clock"></i>
                    <span class="count-numbers"><?php echo $stats['pending_orders']; ?></span>
                    <span class="count-name">Pending Orders</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card-counter success">
                    <i class="fas fa-check-circle"></i>
                    <span class="count-numbers"><?php echo $stats['completed_orders']; ?></span>
                    <span class="count-name">Completed Orders</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card-counter info">
                    <h5>Rp</h5>
                    <span class="count-numbers"><?= number_format($stats['total_revenue'], 0, ',', '.'); ?>
                    </span>
                   
                  </div>
                </div>
              </div>

              <!-- recenet ordernya -->
              <div class="card mb-4">
                <div class="card-header">
                  <h5>Recent Orders</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th>Service</th>
                          <th>Date</th>
                          <th>Amount</th>
                          <th>Status</th>

                        </tr>
                      </thead>
                       <tbody>
                          <?php
                          foreach ($_SESSION['orders'] as $row) {
                            echo "<tr>";
                            echo "<td>#ORD-" . $row['id'] . "</td>";
                            echo "<td>" . $row['customer_name'] . "</td>";
                            echo "<td>" . $row['service_name'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td>Rp " . number_format($row['amount'], 0, ',', '.') . "</td>";

                            
                            $badge = 'bg-secondary';
                            if ($row['status'] == 'pending') $badge = 'bg-warning';
                            else if ($row['status'] == 'in-progress') $badge = 'bg-info';
                            else if ($row['status'] == 'completed') $badge = 'bg-success';

                            echo "<td><span class='badge $badge status-badge'>" . $row['status'] . "</span></td>";
                            
                            echo "</tr>";
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- section orders nya-->
            <div class="tab-pane fade" id="orders">
              <div class="d-flex justify-content-between mb-4">
                <h2>Order Management</h2>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th>Service</th>
                          <th>Date</th>
                          <th>Amount</th>
                          <th>Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($_SESSION['orders'] as $order): ?>
                          <tr>
                            <td>#ORD-<?php echo $order['id']; ?></td>
                            <td><?php echo $order['customer_name']; ?></td>
                            <td><?php echo $order['service_name']; ?></td>
                            <td><?php echo $order['created_at']; ?></td>
                            <td>Rp <?= number_format($order['amount'], 0, ',', '.'); ?></td>
                            <td>
                              <form method="POST" action="update_status.php" style="display:flex; align-items:center; gap:5px;">
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <select name="status" class="form-select">
                                  <option value="pending" <?php if ($order['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                  <option value="in-progress" <?php if ($order['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                                  <option value="completed" <?php if ($order['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                              </form>
                            </td>
                         
                          </tr>
                        <?php endforeach; ?>
                      </tbody>

                    </table>
                  </div>

                </div>
              </div>
            </div>

            <!-- Services Tab -->
            <div class="tab-pane fade" id="services">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                     <thead>
                      <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = "SELECT * FROM services";
                      $result = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                      <tr >
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td style="white-space: normal; word-wrap: break-word; max-width: 200px;">
                            <?= $row['description']; ?>
                        </td>
                        <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                        </td>
                        <td>
                          <button
                            class="btn btn-sm btn-primary btn-edit-row"
                            data-id="<?= $row['id']; ?>"
                            data-name="<?= $row['name']; ?>"
                            data-description="<?= $row['description']; ?>"
                            data-price="<?= $row['price']; ?>"
                          >Edit</button>
                        </td>
                      </tr>

                      <!-- hide dulu -->
                      <tr class="edit-form-row d-none">
                        <form action="update_service.php" method="POST">
                          <td><input type="hidden" name="id" class="form-id"></td>
                          <td><input type="text" name="name" class="form-control form-name" required></td>
                          <td><input type="text" name="description" class="form-control form-description" required></td>
                          <td><input type="number" name="price" class="form-control form-price" required></td>
                          <td >
                            <button type="submit" class="btn btn-success btn-sm mb-1">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-sm btn-cancel-edit">Batal</button>
                          </td>
                        </form>
                      </tr>
                    <?php } ?>
                    </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonials Tab -->
            <div class="tab-pane fade" id="testimonials">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                    <h2>Testimonial Management</h2>

                  </div>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Customer</th>
                          <th>Service</th>
                          <th>Testimonial</th>

                          <th>Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($testimonialCount > 0): ?>
                          <?php while($testimonial = mysqli_fetch_assoc($testimonialResult)): ?>
                            <tr>
                              <td><?= $testimonial['id'] ?></td>
                              <td><?= htmlspecialchars($testimonial['customer_name']) ?></td>
                              <td><?= htmlspecialchars($testimonial['service_name']) ?></td>
                              <td><?= htmlspecialchars($testimonial['testimonial_text']) ?></td>
                         
                             <form action="update_testi.php" method="POST">
                              <td>
                                <input type="hidden" name="id" value="<?= $testimonial['id'] ?>">
                                <select class="form-select form-select-sm" name="status">
                                  <option value="pending" <?= $testimonial['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                  <option value="published" <?= $testimonial['status'] == 'published' ? 'selected' : '' ?>>Published</option>
                                  <option value="rejected" <?= $testimonial['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                                </select>
                              </td>
                              <td>
                                <button type="submit" name="action" value="update" class="btn btn-sm btn-primary me-1">
                                  <i class="fas fa-edit"></i>
                                </button>
                                <button type="submit" name="action" value="delete" onclick="return confirm('Yakin ingin menghapus ni?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>

                              </td>
                            </form>
                            </tr>
                          <?php endwhile; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="7" class="text-center">No testimonials found</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Users Tab -->
         
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  // Tampilkan form edit dan sembunyikan row data
  document.querySelectorAll('.btn-edit-row').forEach((btn) => {
    btn.addEventListener('click', function () {
      const displayRow = this.closest('tr');
      const formRow = displayRow.nextElementSibling;

      displayRow.classList.add('d-none');
      formRow.classList.remove('d-none');
    });
  });


  document.querySelectorAll('.btn-cancel-edit').forEach((btn) => {
    btn.addEventListener('click', function () {
      const formRow = this.closest('tr');
      const displayRow = formRow.previousElementSibling;

      formRow.classList.add('d-none');
      displayRow.classList.remove('d-none');
    });
  });
</script>


  </body>
</html>
<!DOCTYPE html>
