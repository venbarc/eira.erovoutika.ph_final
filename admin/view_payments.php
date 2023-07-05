<!DOCTYPE html>
<html>

<head>
    <?php 
        include "head_links.php";
    ?>
    <title>
        Admin-VIEW PROOF
    </title>
    <?php
        session_start();
        include "../connect.php";
    ?>
</head>

<body>
    <?php
    include "./components/navbar.php";

     // check if admin is logged in
     if(isset($_SESSION['admin_id'])) 
     {
         
     }else{
         header("Location: ../login.php");
     }
    ?>
    <!-- dashboard -->
    <div class="p-4 sm:ml-64">
        <div class=" rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Proof of Payments</h2>
                    </div>

                    <!-- INSERT HERE A PHP IF CONDITION IF THE USER  CLICK THE BACK BUTTON -->
                    <div class="flex justify-end">
                        <a href="payment.php" type="button" class="text-white  bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Back to payment</a>
                    </div>
                    <!-- INSERT HERE A PHP IF CONDITION IF THE USER  CLICK THE BACK BUTTON -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                      
                        <?php
                        
                            if(isset($_GET['id']))
                            {
                                $id = $_GET['id'];

                                //Select All data from payments
                                $stmt = $conn->prepare("select * from payments where id = ? ");
                                $stmt->bind_param('i', $id);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                
                                if ($res->num_rows > 0)
                                {
                                    echo'
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Robotics and automation level
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Payment Method
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Reference number
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Approval Status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Contact
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Address
                                                </th>
                                            </tr>
                                        </thead>
                                    ';
                                    // <!-- INSERT WHILE -->
                                    while($row = $res->fetch_assoc())
                                    {
                                        $email = $row['email'];
                                        $type = $row['type'];
                                        $pay_type = $row['pay_type'];
                                        $ref_num = $row['ref_num'];
                                        $approval = $row['approval'];
                                        $contact = $row['contact'];
                                        $address = $row['address'];
                                        $proof_pay = $row['proof_pay'];

                                        // approval 
                                        if($approval == 0)
                                        {
                                            $approval = ' <strong class="text-orange-600">Pending</strong> ';
                                        }
                                        else
                                        if($approval == 1)
                                        {
                                            $approval = ' <strong class="text-green-600">Approved</strong> ';
                                        }
                                        else
                                        if($approval == 2)
                                        {
                                            $approval = ' <strong class="text-red-600">Rejected</strong> ';
                                        }

                                        echo'
                                        <tbody>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-4 py-4">
                                                    <div class="dark:text-white">'.$email.'</div> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <div class="dark:text-white">'.$ref_num.'</div> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <div class="dark:text-white">'.$pay_type.'</div> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <h3 class="dark:text-white">'.$ref_num.'</h3> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <h3 class="dark:text-white">'.$approval.'</h3> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <h3 class="dark:text-white">'.$contact .'</h3> 
                                                </td>
                                                <td class="px-4 py-4">
                                                    <h3 class="dark:text-white">'.$address.'</h3> 
                                                </td>
                                            </tr>
                                        </tbody>
                                        ';
                                    }
                                    echo'
                                    </table>
                                    ';
                                }
                                $stmt->close();
                            }
                        ?>
                    </div>
                            
                        <?php

                            // if approval is pressed functions 
                            if(isset($_POST['approve']))
                            {
                                // if approved 
                                $stmt = $conn->prepare("update payments set approval = 1 where id = ? ");
                                $stmt->bind_param('i', $id);
                                $stmt->execute();
                                $stmt->close();
                                ?>
                                    <script>
                                        location.href = "payment.php";
                                    </script>
                                <?php
                            }
                            else
                            if(isset($_POST['reject']))
                            {
                                // if rejected 
                                $stmt = $conn->prepare("update payments set approval = 2 where id = ? ");
                                $stmt->bind_param('i', $id);
                                $stmt->execute();
                                $stmt->close();
                                ?>
                                    <script>
                                        location.href = "payment.php";
                                    </script>
                                <?php
                            }
                            else
                            if(isset($_POST['revoke']))
                            {
                                // if revoke 
                                $stmt = $conn->prepare("update payments set approval = 0 where id = ? ");
                                $stmt->bind_param('i', $id);
                                $stmt->execute();
                                $stmt->close();
                                ?>
                                    <script>
                                        location.href = "payment.php";
                                    </script>
                                <?php
                            }

                            //Select All data from payments
                            $stmt = $conn->prepare("select * from payments where id = ? ");
                            $stmt->bind_param('i', $id);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            if($res->num_rows > 0)
                            {
                                while($row = $res->fetch_assoc())
                                {
                                    $approval = $row['approval'];

                                    if($approval == 0)// if approval is pending -->
                                    {
                                        ?>
                                            <form method="post">
                                                <div class="grid grid-cols-2 gap-4 pt-10 text-center">
                                                    <button name="approve" class="bg-green-400 font-bold p-4" onclick="return confirm('Are you sure you want to approve ?')">
                                                        <h2>Approve</h2>
                                                    </button>
                                                    <button name="reject" class="bg-red-400 font-bold p-4" onclick="return confirm('Are you sure you want to reject ?')">
                                                        <h2>Reject</h2>
                                                    </button>
                                                </div>
                                            </form>
                                            <section class="bg-white dark:bg-gray-900">
                                                <div class="py-4 px-3 mx-auto max-w-screen-xl lg:py-14 lg:px-5">
                                                    <div class="flex justify-center">
                                                        <img class="payment max-w-lg rounded-lg" src="../<?php echo $proof_pay?>" alt="image description">
                                                    </div>
                                                </div>
                                            </section>
                                        <?php
                                    }
                                    else
                                    if($approval == 1)// if approval is Approved -->
                                    {
                                        ?>
                                            <!-- // if approval is already approved -->
                                            <div class="grid grid-cols-1  pt-10 text-center">
                                                <h1 class="text-green-500 font-bold p-4">
                                                   Payment Already Approved
                                                </h1>
                                                <form method="post">
                                                    <div class="grid grid-cols-1 gap-4 pt-3 text-center">
                                                        <button name="revoke" class="bg-orange-400 font-bold p-4" onclick="return confirm('Are you sure you want to revoke ?')">
                                                            <h2>Revoke</h2>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <section class="bg-white dark:bg-gray-900">
                                                <div class="py-4 px-3 mx-auto max-w-screen-xl lg:py-14 lg:px-5">
                                                    <div class="flex justify-center">
                                                        <img class="payment max-w-lg rounded-lg" src="../<?php echo $proof_pay?>" alt="image description">
                                                    </div>
                                                </div>
                                            </section>
                                        <?php
                                    }
                                    else
                                    if($approval == 2) // if approval is rejected -->
                                    {
                                        ?>
                                            <!-- // if approval is already rejected -->
                                            <div class="grid grid-cols-1  pt-10 text-center">
                                                <h1 class="text-red-500 font-bold p-4">
                                                   Payment Already Rejected
                                                </h1>
                                                <form method="post">
                                                    <div class="grid grid-cols-1 gap-4 pt-3 text-center">
                                                        <button name="revoke" class="bg-orange-400 font-bold p-4" onclick="return confirm('Are you sure you want to revoke ?')">
                                                            <h2>Revoke</h2>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <section class="bg-white dark:bg-gray-900">
                                                <div class="py-4 px-3 mx-auto max-w-screen-xl lg:py-14 lg:px-5">
                                                    <div class="flex justify-center">
                                                        <img class="payment max-w-lg rounded-lg" src="../<?php echo $proof_pay?>" alt="image description">
                                                    </div>
                                                </div>
                                            </section>
                                        <?php
                                    }
                                }
                            }
                            $stmt->close();
                        ?>
                        
                        

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