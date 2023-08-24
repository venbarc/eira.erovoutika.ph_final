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

    ?>  
    <!-- dashboard -->
    <div class="p-4 sm:ml-64">
        <div class=" rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-black dark:text-white">
                            Certifications 
                        </h2>
                        <!-- Start search bar-->
                        <form method="POST">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                                Search
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" name="search_name" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Search certificate details here" required>
                                <button type="submit" name="search_cert" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Search
                                </button>
                            </div>
                        </form>
                        <div class="text-white mt-[2%] ">
                            <a href="certifications.php" class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Back
                            </a>
                        </div>
                    </div>
                   
                    <?php
                        if(isset($_POST['search_cert']))
                        {
                            $search_name = $_POST['search_name'];
                            $date = date('F j, Y', strtotime($search_name));

                            $stmt = $conn->prepare("SELECT * from result 
                                                    WHERE 
                                                    cert_id LIKE '%$search_name%' or 
                                                    type LIKE '%$search_name%' or 
                                                    email LIKE '%$search_name%' or 
                                                    full_name LIKE '%$search_name%'or
                                                    date LIKE '%$search_name%'
                                                    ");
                            $stmt->execute();
                            $res = $stmt->get_result();
                        }
                        else{
                            $stmt = $conn->prepare("SELECT * from result");
                            $stmt->execute();
                            $res = $stmt->get_result();
                        }

                        if($res->num_rows > 0)
                        {
                            $count = 1;
                            echo'
                            <div class="overflow-x-auto ">
                                <div class="min-w-full">
                                    <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                #
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Certificate ID
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Full Name
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Action
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Date Accomplished
                                            </th>
                                        </tr>
                                        </thead>

                            ';
                            while($row = $res->fetch_assoc())
                            {
                                $cert_id = $row['cert_id'];
                                $type = $row['type'];
                                $email = $row['email'];
                                $full_name = $row['full_name'];
                                $date = $row['date'];

                                //convert date to formatted
                                $date = date('F j, Y', strtotime($date));

                                echo'
                                    <tbody>
                                        <tr>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                '.$count++.'
                                            </th>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white font-bold">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$cert_id.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$type.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$email.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$full_name.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <button type="button" data-modal-target="modal_'.$row['id'].'" data-modal-toggle="modal_'.$row['id'].'" class="block text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Change name
                                                </button>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$date.'
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                    <!-- Main modal -->
                                    <div id="modal_'.$row['id'].'" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal_'.$row['id'].'">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <form method="POST" class="space-y-6" action="#">
                                                        <div>
                                                            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Update Certificate
                                                            </label>
                                                            <input type="full_name" name="full_name" id="full_name" value="'.$full_name.'" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                        </div>
                                                        <button type="submit" name="change_name" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Update Certificate name
                                                        </button>

                                                        <input type="hidden" name="id" value="'.$row['id'].'">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                ';
                            }
                            echo'
                                    </table>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        else
                        {
                            ?>
                            <h2 class="text-gray-900 dark:text-white text-center" style="background: rgb(0,0,0,0.3); padding: 20px; font-size: 30px;">
                                There is no certificate yet.
                            </h2>
                            <?php
                        }

                        //recover function 
                        if(isset($_POST['recover_id']))
                        {
                            $recover_id = $_POST['recover_id'];

                            //select the data in to database first for insertion
                            $stmt_sel_in_bin = $conn->prepare("SELECT * from recycle_bin where id = ?");
                            $stmt_sel_in_bin->execute([$recover_id]);
                            $res_sel_in_bin = $stmt_sel_in_bin->get_result();
                            
                            // get value of specific data in test 
                            $row_sel_in_test = $res_sel_in_bin->fetch_assoc();
                            $type = $row_sel_in_test['type'];
                            $question = $row_sel_in_test['question'];
                            $opt1 = $row_sel_in_test['opt1'];
                            $opt2 = $row_sel_in_test['opt2'];
                            $opt3 = $row_sel_in_test['opt3'];
                            $opt4 = $row_sel_in_test['opt4'];
                            $answer = $row_sel_in_test['answer'];
                            $ques_type = $row_sel_in_test['ques_type'];
                            $image = $row_sel_in_test['image'];

                            //move to back to test 
                            $stmt_rec_bin = $conn->prepare("INSERT into test (type, question, opt1, opt2, opt3, opt4, answer, ques_type, image) 
                                                            values(?,?,?,?,?,?,?,?,?)");
                            $stmt_rec_bin->execute([$type, $question, $opt1, $opt2, $opt3, $opt4, $answer, $ques_type, $image]);

                            if($stmt_rec_bin->affected_rows > 0)
                            {
                                // delete the test question 
                                $stmt = $conn->prepare("delete from recycle_bin where id = ? ");
                                $stmt->bind_param('i', $recover_id);
                                $stmt->execute();

                                if($stmt->affected_rows > 0)
                                {
                                    ?>
                                    <script>
                                        location.href = "recycle_bin.php";
                                    </script>
                                    <?php
                                }
                                else{
                                    echo'
                                    <div class="err"> Something went wrong please try again! </div>
                                    ';
                                }
                                $stmt->close();
                            }
                            else{
                                ?>
                                <h2 class="text-gray-900 dark:text-white" style="background: rgb(0,0,0,0.3); padding: 20px; font-size: 30px;">
                                    No Data to recover yet.
                                </h2>
                                <?php
                            }
                        }
                        // delete function 
                        if(isset($_POST['delete_id']))
                        {
                            $delete_id = $_POST['delete_id'];

                            $stmt_del = $conn->prepare("DELETE from recycle_bin where id = ?");
                            $stmt_del->execute([$delete_id]);

                            if($stmt_del->affected_rows > 0)
                            {
                                ?>
                                <script>
                                    location.href ="recycle_bin.php";
                                </script>
                                <?php
                            }
                        }
                        //update name on certificate
                        if(isset($_POST['change_name']))
                        {
                            $id = $_POST['id'];
                            $full_name = $_POST['full_name'];

                            $stmt_cert_name = $conn->prepare("UPDATE result set full_name = ? where id = ? ");
                            $stmt_cert_name->execute([$full_name, $id]); 

                            if($stmt_cert_name->affected_rows > 0)
                            {
                                ?>
                                <script>
                                    location.href = "certifications.php";
                                </script>
                                <?php
                            }
                        }
                    ?>

                    
                  
                </div>
            </section>
        </div>
    </div>

    
    <?php
        include "./Log_out.php";
        include "./components/footer.php";
        include "foot_links.php";
    ?>
</body>

</html>