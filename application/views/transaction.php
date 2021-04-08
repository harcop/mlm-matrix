
<!DOCTYPE html>
<html>

<?php include('include/head.php');?>

<body>
 <!-- Sidenav -->
    <?php 
    include('include/sidebar.php');
    ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php 
//      include('include/navbar.php');
      ?>
    <!-- Header -->
    <?php 
      include('include/tree_header.php');
      ?>
    <!-- Page content -->
    <div class="container-fluid mt-1">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow alert alert-primary">
            <div class="card-header border-0">
              <h3 class="mb-0 text-success">Bonus</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="bonus_data">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">New User</th>
                    <th scope="col">Date</th>
<!--                    <th scope="col"></th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php echo ($bonus != '')?$bonus:'<tr><td>No bonus yet<td></tr>';?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
        <div class="row mt-4">
        <div class="col">
          <div class="card shadow alert alert-primary">
            <div class="card-header border-0">
              <h3 class="mb-0 text-primary">Fund Transaction</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="fund_data">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">From</th>
                    <th scope="col">Amount</th>
                    <th scope="col">To</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    echo ($fund_received != '')?$fund_received:'<tr><td>No Fund received yet<td></tr>';
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        
        <div class="row mt-4">
        <div class="col">
          <div class="card shadow alert alert-primary">
            <div class="card-header border-0">
              <h3 class="mb-0 text-warning">Withdraw Transaction</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-stripped" id="withdraw_data">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    echo ($fund_withdraw != '')?$fund_withdraw:'<tr><td>No new withdrawn yet<td></tr>';
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include('include/footer.php');?>
            <script>
        //     $(document).ready( function () {
        //         $('#bonus_data').DataTable();
        //         $('#fund_data').DataTable();
        //         $('#withdraw_data').DataTable();
        //     });
        // </script>
    </div>
  </div>
</body>

</html>