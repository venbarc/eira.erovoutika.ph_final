<!DOCTYPE html>
<html>

<head>
    <?php
        include "head_links.php";
    ?>

    <title>
        Admin | Payment
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
        ?>
            <script>
                location.href = "../login.php";
            </script>
        <?php
     }

    $query = "select count(*) from payments";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $total_payment = $row["count(*)"];
    }
    else
    {
        echo '
            <h4 class ="no-record"> There are no payment to be recorded! </h4>
        ';
    }
    ?>

    
    <!-- dashboard -->
    <div class="p-4 sm:ml-64" id="payment" class="payment">
        <div class=" rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Total Payment Robotics and Automation</h2>
                        <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white"><!-- Insert Echo Total USer here --><?php echo $total_payment?></h2>
                    </div>
                    
                    <!-- TOTAL USER TABLE -->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-11">   
                                <?php
                                
                                    $stmt = $conn->prepare("select * from payments order by approval = 'pending' desc");
                                    $stmt->execute();
                                    $res = $stmt->get_result();

                                    if($res->num_rows > 0)
                                    {
                                        echo'
                                        <div class="">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3" >Robotics and Automation Type</th>
                                                        <th scope="col" class="px-6 py-3" >Payment Method </th>
                                                        <th scope="col" class="px-6 py-3" >Reference Number </th>
                                                        <th scope="col" class="px-6 py-3" >Approval </th>
                                                        <th scope="col" class="px-6 py-3" >Email </th>
                                                        <th scope="col" class="px-6 py-3" >Full Name </th>
                                                        <th scope="col" class="px-6 py-3" >Contact </th>
                                                        <th scope="col" class="px-6 py-3" >Address </th>
                                                        <th scope="col" class="px-6 py-3" >Date paid </th>
                                                        <th scope="col" class="px-6 py-3" >Proof of Payment </th>
                                                    </tr>
                                                </thead>
                                        ';
                                        while($row = $res->fetch_assoc())
                                        {
                                            $rna_type = $row['rna_type'];
                                            $pay_type = $row['pay_type'];
                                            $ref_num = $row['ref_num'];
                                            $approval = $row['approval'];
                                            $email = $row['email'];
                                            $fname = $row['fname'];
                                            $lname = $row['lname'];
                                            $contact = $row['contact'];
                                            $address = $row['address'];
                                            $date_pay = $row['date_pay'];
                                            $proof_pay = $row['proof_pay'];

                                            // check robotics and automation level
                                            if($rna_type == 'rna1')
                                            {
                                                $rna_type = 'Robotics And Automation 1';
                                            } 
                                            else
                                            if($rna_type == 'rna2')
                                            {
                                                $rna_type = 'Robotics And Automation 1';
                                            }
                                            else
                                            if($rna_type == 'rna3')
                                            {
                                                $rna_type = 'Robotics And Automation 3';
                                            }
                                            // check approval
                                            if($approval == 0)
                                            {
                                                $approval = ' <strong class="text-orange-400">Pending</strong> ';
                                            }
                                            else
                                            if($approval == 1)
                                            {
                                                $approval = ' <strong class="text-green-500">Approved</strong> ';
                                            }
                                            else
                                            if($approval == 2)
                                            {
                                                $approval = ' <strong class="text-red-500">Rejected</strong> ';
                                            }

                                            echo'
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                        <td class="px-6 py-4">'. $rna_type .'</td>
                                                        <td class="px-6 py-4">'. $pay_type .'</td>
                                                        <td class="px-6 py-4">'. $ref_num .'</td>
                                                        <td class="px-6 py-4">'. $approval .'</td>
                                                        <td class="px-6 py-4">'. $email .'</td>
                                                        <td class="px-6 py-4">'. $fname .' '.$lname.'</td>
                                                        <td class="px-6 py-4">'. $contact .'</td>
                                                        <td class="px-6 py-4">'. $address .'</td>
                                                        <td class="px-6 py-4">'. $date_pay .'</td>
                                                        <td class="px-6 py-4">
                                                            <a href="view_payments.php?id='.$row['id'].'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                                                                <i class="fas fa-eye"></i> 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        } 
                                        echo'
                                            </table>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>

    <script>
    //Script to download Excel 
            document.getElementById("download_excel").addEventListener("click", function() {
            const table = document.getElementById("users_table");
            const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
            XLSX.writeFile(wb, "ECE Board Exam.xlsx");
            });

    //Script to download PDF 
            document.getElementById("download_pdf").addEventListener("click", function() {
            const table = document.getElementById("users_table");
            const doc = new jsPDF();
            doc.autoTable({ html: table });
            doc.save("ECE Board Exam.pdf");
            });
    </script>

    <?php
        include "./Log_out.php";
        include "foot_links.php";
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>