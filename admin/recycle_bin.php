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
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-red-600 dark:text-white">
                            Recycle Bin 
                            <span>
                                <svg width="35" height="35" fill="#FF0000" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </h2>
                    </div>
                   

                    <?php
                        $stmt = $conn->prepare("SELECT * from recycle_bin");
                        $stmt->execute();
                        $res = $stmt->get_result();

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
                                                Type
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Option 1
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Option 1
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Option 2
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Option 3
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Option 4
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Answer
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Question Type
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Image
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>

                            ';
                            while($row = $res->fetch_assoc())
                            {
                                $type = $row['type'];
                                $question = $row['question'];
                                $opt1 = $row['opt1'];
                                $opt2 = $row['opt2'];
                                $opt3 = $row['opt3'];
                                $opt4 = $row['opt4'];
                                $answer = $row['answer'];
                                $ques_type = $row['ques_type'];
                                $image = $row['image'];

                                if(empty($image))
                                {
                                    $image = 'no image';
                                }
                                else{
                                    $image = ' <img src="'.$image.'" width="100"> ';
                                }

                                echo'
                                    <tbody>
                                        <tr>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                                '.$count++.'
                                            </th>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white font-bold">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$type.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$question.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$opt1.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$opt2.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$opt3.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$opt4.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-green-100 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$answer.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$ques_type.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$image.'
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                    <form method="post">
                                                    <button type="submit" name="recover_id" value="'.$row['id'].'" class="text-blue-700">  
                                                        <svg width="35" height="35" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4 9.5a.5.5 0 00-.5.5 6.5 6.5 0 0012.13 3.25.5.5 0 00-.866-.5A5.5 5.5 0 014.5 10a.5.5 0 00-.5-.5z" clip-rule="evenodd"/>
                                                            <path fill-rule="evenodd" d="M4.354 9.146a.5.5 0 00-.708 0l-2 2a.5.5 0 00.708.708L4 10.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zM15.947 10.5a.5.5 0 00.5-.5 6.5 6.5 0 00-12.13-3.25.5.5 0 10.866.5A5.5 5.5 0 0115.448 10a.5.5 0 00.5.5z" clip-rule="evenodd"/>
                                                            <path fill-rule="evenodd" d="M18.354 8.146a.5.5 0 00-.708 0L16 9.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Recover 
                                                     </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
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
                                There is no data to recycle yet.
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