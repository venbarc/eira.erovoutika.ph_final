<!DOCTYPE html>
<html>

<head>
    
    <?php
        include "head_links.php";
    ?>

    <title>
        Admin-User
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
    <!-- dashboard -->
    <div class="p-4 sm:ml-64">
        <div class=" rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

                    <?php
                        // count all users 
                        $query = "select count(*) from users";
                        $result = $conn->query($query);
                        if($result->num_rows > 0)
                        {
                            $row = $result->fetch_assoc();
                            $total_user = $row["count(*)"];
                        }
                        else{
                            echo '
                                <h4 class ="no-record"> There are no users to be recorded! </h4>
                            ';
                        }
                        //if Create user is posted
                        if (isset($_POST['submit']))
                        {
                            $email = $_POST['email'];
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $contact = $_POST['contact'];

                            $password = $_POST['password'];
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $cpassword = $_POST['cpassword'];
                            
                            $company_univ = $_POST['company_univ'];
                            $address = $_POST['address'];

                            $error = false;
                            $msg = array();
                            $msg[] = '';
                            
                            if(!ctype_alpha($fname) || !ctype_alpha($lname))
                            {
                                $msg[] = '<p class="text-red-600"> 
                                    First and last name should not have a number. pls try again! 
                                </p><br>';
                                $error = true; 
                            }
                            if(strlen($password) < 8 && strlen($cpassword) < 8)
                            {
                                $msg[] = '<p class="text-red-600"> 
                                        Password is too short. must be 8 characters at least! 
                                </p><br>';
                                $error = true;
                            }
                            if(!($password == $cpassword))
                            {
                                $msg[] = '<p class="text-red-600"> 
                                        Password Does not match!
                                </p><br>';
                                $error = true;

                            }
                            if(!is_numeric($contact) )
                            {
                                $msg[] = '<p class="text-red-600"> 
                                        Contact must be integer only. pls try again!
                                </p><br>';
                                $error = true;
                            }
                            $stmt = $conn->prepare("select * from users where email = ?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute(); 
                            $res = $stmt->get_result();
                            if($res->num_rows > 0)
                            {
                                $msg[] = '<p class="text-red-600"> 
                                    Email Is not available. Please provide another email!
                                </p><br>';
                                $error = true;
                            }
                            if(!$error)
                            {
                            $stmt = $conn->prepare("INSERT INTO users (email, fname, lname, contact, password, company_univ, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
                            $stmt->bind_param("sssisss", $email, $fname, $lname, $contact, $hashed_password, $company_univ, $address);
                            $stmt->execute();

                            $msg[] = '<p class="text-green-600"> 
                                    Successfully Created a User!
                            </p><br>'; 
                            }
                        }

                        // display message 
                        if(isset($_POST['submit']))
                        {
                            foreach($msg as $display_msg)
                            {
                                echo $display_msg;
                            }
                        }

                        // delete user 
                        if(isset($_GET['delete_id']))
                        {
                            $delete_id = $_GET['delete_id'];

                            $sql_delete_id = "delete from users where id='$delete_id' ";
                            $res_delete_id = mysqli_query($conn, $sql_delete_id);

                            if($res_delete_id)
                            {
                               echo '<p class="text-green-600"> 
                                    Successfully Deleted a User!
                            </p><br>';
                            }
                            
                        }
                    ?>

                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                            Total User
                        </h2>
                        <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                            <?php echo $total_user ?>
                        </h2>
                    </div>
                    <!-- Button Modal toggle -->
                    <button id="defaultModalButton" data-modal-toggle="defaultModal" class="block text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="button">
                        Create User
                    </button>
                    <!-- Main modal -->
                    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create New User
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="post">
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Erovoutika@gmail.com" required="">
                                        </div>
                                        <div>
                                            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                            <input type="text" name="fname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="First Name" required="">
                                        </div>
                                        <div>
                                            <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Last name" required="">
                                        </div>
                                        <div>
                                            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact 63+</label>
                                            <input type="text" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="(63+) xxxx-xxx-xxx" maxlength="10" minlength="10" required="">
                                        </div>
                                        <div>
                                            <label for="company_univ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company / University</label>
                                            <input type="company_univ" name="company_univ" id="company_univ" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Company / University" required="">
                                        </div>
                                        <div>
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Address" required="">
                                        </div>
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Password" required="">
                                        </div>
                                        <div>
                                            <label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                            <input type="password" name="cpassword" id="cpassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                            placeholder="Confirm Password" required="">
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Create user" class=" inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        <!-- Create User submit -->
                                    </input>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- delete modal -->
                    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                <div class="flex justify-center items-center space-x-4">
                                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        No, cancel
                                    </button>
                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        $query = "SELECT * FROM users";
                        $result = $conn->query($query);
                        $count = 1;
                            
                        if ($result->num_rows > 0) 
                        {
                            echo '
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Profile Image
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                First Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Last Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Contact
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Company / University
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Activation
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Registered
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                ';
                            while($row = $result->fetch_assoc()) 
                            {
                                $image = $row['image'];
                                $activation = $row['activation'];

                                // check image 
                                if(empty($image))
                                {
                                    $image = '<img src="../assets/img/profile/default2.png" class="admin_user_profile">';
                                }
                                else{
                                    $image = '<img src="../'. $image .'" class="admin_user_profile">';
                                }

                                // check activation 
                                if($activation == 1)
                                {
                                    $activation = '
                                        <p class="text-green-700"> <strong> Activated </strong> </p> 
                                    ';
                                }
                                else{
                                    $activation = '
                                        <p class="text-red-700"> <strong> deactivated </strong> </p> 
                                    ';
                                }
                                echo '
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            '. $count++ .'
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                '.$image.'
                                            </th>
                                            <td class="px-6 py-4">
                                            '. $row['email'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['fname'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['lname'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['contact'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['company_univ'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['address'] .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $activation .'
                                            </td>
                                            <td class="px-6 py-4">
                                            '. $row['date_reg'] .'
                                            </td>
                                            <td class="flex items-center px-6 py-4 space-x-3">
                                                <a href="edit_user.php?id='. $row['id'] .'" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> Edit </a>
                                                <a href="user.php?delete_id='. $row['id'] .'" class="block font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm(\'Are you sure you want to delete this record? \');">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                ';
                            }
                            echo '</table>
                                </div>

                            ';
                            
                        } 
                        else 
                        {
                            echo '<h1 style="background-color: gray; color: white; text-align:center; padding: 20px;"> No data found </h1>';
                        }
                    
                    ?>
                  

                </div>
            </section>
        </div>
    </div>

    <?php
        include "./components/footer.php";
        include "./Log_out.php";
        include "foot_links.php";
    ?>
</body>

</html>