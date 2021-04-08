
<!DOCTYPE html>
<html>

<?php include('include/head.php');?>

<body>
 
  <!-- Sidenav -->
    <?php include('include/sidebar.php');?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include('include/navbar.php');?>
    <!-- Header -->
    <?php include('include/header.php');?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Register</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn btn-sm btn-primary">Reload</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="notification">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">New User</th>
                    <th scope="col">Referral</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo ($new_note != '')?$new_note:'<tr><td>No new registered<td></tr>';?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include('include/footer.php');?>
        <!--<script>-->
        <!--    $(document).ready( function () {-->
        <!--        $('#notification').DataTable();-->
        <!--    });-->
        <!--</script>-->
    </div>
  </div>
</body>

</html>