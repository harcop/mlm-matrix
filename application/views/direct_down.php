
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
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0 text-success">Direct Download</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="downline">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Referral</th>
                    <th scope="col">Date</th>
<!--                    <th scope="col"></th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php echo ($downline != '')?$downline:'<tr><td>No Direct downline yet<td></tr>';?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include('include/footer.php');?>
            <script>
             $(document).ready( function () {
                 $('#downline').DataTable();
             });
        // </script>
    </div>
  </div>
</body>

</html>