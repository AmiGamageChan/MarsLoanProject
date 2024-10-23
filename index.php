<!DOCTYPE html>
<html lang="en">

<!-- Table load query -->
<?php include "connection.php"; ?>
<?php
$rs = Database::searchRS("SELECT loan.loan_order_id, loan.product_name, loan.loan_amount, order_status.status AS status_name
FROM loan
INNER JOIN order_status ON order_status.id = loan.order_status_id
WHERE order_status.status = 'Pending'");
$num = $rs->num_rows;
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap.css">
  <title>Project</title>
  <style>
    .nav-bar-shadow {
      box-shadow: 0px 0px 10px 0px rgb(100, 100, 25);
    }
  </style>
</head>

<body class="bg-light f-size" onload="loadOrderID();">
  <div class="container-fluid nav-bar-shadow">
    <?php include "navBar.php"; ?>
  </div>

  <div class="container mt-4">
    <div class="mt-2">
      <label for="un" class="form-label">Loan Order ID</label><br>
      <input type="text" class="form-control form-control-sm" id="orderID" disabled>
    </div>

    <div class="mt-2">
      <label for="pw" class="form-label">Product Name</label>
      <input type="text" class="form-control form-control-sm" id="productName" value="">
    </div>

    <div class="mt-2">
      <label for="pw" class="form-label">Loan Amount</label>
      <input type="text" class="form-control form-control-sm" id="loanAmount" value="">
    </div>

    <button type="button" class="btn btn-primary btn w-100 mt-2" onclick="logOrder();">Log</button>


    <div class="mt-4">Previous Orders</div>

    <table class="table table-light border-success table-hover">
      <thead>
        <tr>
          <th scope="col" class="text-center">Order ID</th>
          <th scope="col" class="text-center">Product Name</th>
          <th scope="col" class="text-center">Loan Amount</th>
          <th scope="col" class="text-center">Status</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <!-- Table Load -->
        <?php
        for ($i = 0; $i < $num; $i++) {
          $d = $rs->fetch_assoc();

        ?>
          <tr>
            <td class="center-vertical"><?php echo $d["loan_order_id"] ?></td>
            <td class="center-vertical"><?php echo $d["product_name"] ?></td>
            <td class="center-vertical"><?php echo $d["loan_amount"] ?></td>
            <td class="center-vertical"><?php echo $d["status_name"] ?></td>
          </tr>
        <?php
        }
        ?>
        <!-- Table Load -->
      </tbody>
    </table>

  </div>

  <!--Footer-->
  <div class="col-12 mt-3">
    <p class="text-center">&copy; MyMars.lk </p>
  </div>
  <!--Footer-->
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>