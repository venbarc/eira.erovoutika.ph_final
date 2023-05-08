<!DOCTYPE html>
<html>

<head>
    <?php
        include "head_links.php";
    ?>

    <title>
        Admin-EIR
    </title>
    <?php
        session_start();
        include "../connect.php";
    ?>
</head>

<body>
    <?php
    include "./components/navbar.php";

    if (isset($_GET['id'])) 
    {
      $id = $_GET['id'];


    //   if update is posted 
      if (isset($_POST['update'])) 
      {
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $company_univ = $_POST['company_univ'];
        $address = $_POST['address'];
        $activation = $_POST['activation'];

        $sql = "UPDATE users SET  email = '$email', fname = '$fname', lname = '$lname', contact = '$contact', company_univ = '$company_univ',
        address = '$address' , activation = '$activation' WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
          ?>
            <script>
                location.href = "user.php";
            </script>
          <?php
        } else {
          echo "Error updating record";
        }
      }
      
    }

  // query to get users information
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    $email = $user['email'];
    $fname = $user['fname'];
    $lname = $user['lname'];
    $contact = $user['contact'];
    $company_univ = $user['company_univ'];
    $address = $user['address'];
    $activation = $user['activation'];

    ?>
    <!-- dashboard -->
    <div class="p-4 sm:ml-64">
        <div class=" rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">EDIT USER</h2>
                    </div>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <form method="POST">
                                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                    <div class="w-full">
                                        <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         value="<?php echo  $email ?>" required="">
                                         <!-- INSERT ECHO  $EMAIL IN value -->
                                    </div>
                                    <div class="w-full">
                                        <label for="Firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" name="fname" id="Firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         value="<?php echo  $fname ?>" required="">
                                          <!-- INSERT ECHO  $Firstname IN value -->
                                    </div>
                                    <div class="w-full">
                                        <label for="Lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" name="lname" id="Lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         value="<?php echo  $lname ?>" required="">
                                          <!-- INSERT ECHO  $LASTNAME IN value -->
                                    </div>
                                    <div class="w-full">
                                        <label for="Number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                                        <input type="tel" name="contact" id="Numbers" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                         value="<?php echo  $contact ?>" required="">
                                          <!-- INSERT ECHO  $NUMBER   in value -->
                                    </div>
                                    <div>
                                        <label for="company_univ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Universoty</label>
                                        <input value="<?php echo  $company_univ ?>" type="text" name="company_univ" id="company_univ" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Ex. 18" required="">
                                         <!-- INSERT ECHO  $age IN value -->
                                    </div>
                                    <div>
                                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <input value="<?php echo  $address ?>" type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Ex. 18" required="">
                                         <!-- INSERT ECHO  $age IN value -->
                                    </div>
                                    <div>
                                        <label for="activation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activation</label>
                                        <input value="<?php echo  $activation ?>" type="number" name="activation" id="activation" min="0" max="1" maxlength="1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                        placeholder="1 or 0" required="">
                                         <!-- INSERT ECHO  $age IN value -->
                                    </div>
                                    <div>
                                        <label for="activation" class="block mb-2 text-sm font-medium  span text-gray-900 dark:text-white">Activation legend</label>
                                        <strong class="text-green-700">1</strong> <span class="text-gray-900 dark:text-white">is to activate user</span> <br>
                                        <strong class="text-red-700">0</strong> <span class="text-gray-900 dark:text-white"> is to deactivate user </span> <br>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <input type="submit" name="update" value="Update User" class="text-blue-600 inline-flex items-center hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                        <!-- Update User  -->
                                    </input>
                                    <a type="button" href="user.php"class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </section>
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