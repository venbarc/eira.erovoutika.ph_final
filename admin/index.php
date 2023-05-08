<!DOCTYPE html>
<html>
  <head>
    <?php
      include "head_links.php";
    ?>
    
    <link
      href=""
      rel="stylesheet"
    />
    <title>
        Admin-Main
    </title>

    <?php
        session_start();
        include "../connect.php";
    ?>
  </head>
  <body>
  <?php
  include "./components/navbar.php";
  
  ?>

<?php
      // Query to Count all users 
      $query = "select count(*) from users";
      $result = $conn->query($query);

      if($result->num_rows > 0)
      {
        $row = $result->fetch_assoc();
        $total_user = $row["count(*)"];
      }
      else{
        echo '
            <h4> There are no users to be recorded! </h4>
        ';
      }
      // Query to Count all payments 
      $stmt = $conn->prepare("select count(*) from payments");
      $stmt->execute();
      $res = $stmt->get_result();

      if($res->num_rows > 0)
      {
        $row = $res->fetch_assoc();
        $total_payment = $row["count(*)"];
      }
      else{
        $total_payment = 0;
      }
      $stmt->close();

      // Query to Count all pending 
      $stmt = $conn->prepare("select count(*) from payments where approval = 0");
      $stmt->execute();
      $res = $stmt->get_result();

      if($res->num_rows > 0)
      {
        $row = $res->fetch_assoc();
        $total_pending = $row["count(*)"];
      }
      else{
        $total_pending = 0;
      }
      $stmt->close();

      // Query to Count all approved 
      $stmt = $conn->prepare("select count(*) from payments where approval = 1");
      $stmt->execute();
      $res = $stmt->get_result();

      if($res->num_rows > 0)
      {
        $row = $res->fetch_assoc();
        $total_approved = $row["count(*)"];
      }
      else{
        $total_approved = 0;
      }
      $stmt->close();

      // Query to Count all pending 
      $stmt = $conn->prepare("select count(*) from payments where approval = 2");
      $stmt->execute();
      $res = $stmt->get_result();

      if($res->num_rows > 0)
      {
        $row = $res->fetch_assoc();
        $total_reject = $row["count(*)"];
      }
      else{
        $total_reject = 0;
      }
      $stmt->close();

    ?>
    <!-- dashboard -->
    <div class="p-4 sm:ml-64">
      <div class=" rounded-lg dark:border-gray-700">
        <section class="bg-white dark:bg-gray-900">
          <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
              <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">ADMIN PANEL</h2>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap- xl:gap-10 lg:space-y-0">
              <!-- Pricing Card -->
              <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">Total of Number of Users</h3>
                <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold"><!-- INSERT ECHO TOTAL NUMBER OF USER HER--><?php echo $total_user; ?></span>
                </div>
              </div>
              <!-- Pricing Card -->
              <div class="flex flex-col p-6  mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">Total Payment Records</h3>
                <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold"><!-- INSERT ECHO TOTAL PAYMENT RECORD HERE--><?php echo $total_payment; ?></span>
                </div>
                 <!-- Pricing Card -->
                 <div class="flex">
                  <div class="flex  flex-col p-4 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-sm font-semibold">Pending payments</h3>
                    <div class="flex justify-center items-baseline my-8">
                      <span class="mr-2 text-2xl font-extrabold"style="color: #ff8c00;"><!-- INSERT ECHO APPROVAL PENDING HERE--><?php echo $total_pending ?></span>
                    </div>
                  </div>
                  <!-- Pricing Card -->
                  <div class="flex flex-col p-4 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-sm font-semibold">Approved payments.</h3>
                    <div class="flex justify-center items-baseline my-8">
                      <span class="mr-2 text-2xl font-extrabold"style="color: green;"><!-- INSERT ECHO TOTAL APPROVED HERE--><?php echo $total_approved ?></span>
                    </div>
                  </div>
                  <!-- Pricing Card -->
                  <div class="flex flex-col p-4  mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-sm font-semibold">Rejected Payments</h3>
                    <div class="flex justify-center items-baseline my-8">
                      <span class="mr-2 text-2xl font-extrabold" style="color: red;"><!-- INSERT ECHO REJECTED HERE--><?php echo $total_reject ?></span>
                    </div>
                  </div>
                </div>
              </div>
                  <!-- Pricing Card -->
                  <div class="flex flex-col mr-5 p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Issues</h3>
                    <div class="flex justify-center items-baseline my-8">
                      <span class="mr-2 text-4xl font-extrabold"><?php echo "0"; ?></span>
                    </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

    <?php
      include "./Log_out.php";
      include "./components/footer.php";
      include "foot_links.php";
    ?>
  </body>
</html>