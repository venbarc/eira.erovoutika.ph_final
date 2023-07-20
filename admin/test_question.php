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
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                            Questions for RNA Exam
                        </h2>
                    </div>
                    <section class="bg-white dark:bg-gray-900">
                            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                                <!-- RNA 1 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=rna1" class="mr-2 text-5xl font-extrabold">RNA 1</a>
                                    </div>
                                </div>
                                <!-- RNA 2 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=rna2" class="mr-2 text-5xl font-extrabold">RNA 2</a>
                                    </div>
                                </div>
                                <!-- RNA 3 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=rna3" class="mr-2 text-5xl font-extrabold">RNA 3</a>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
                <?php
                    // if delete button is posted 
                    if(isset($_POST['delete_id']))
                    {
                        $delete_id = $_POST['delete_id'];

                        $stmt = $conn->prepare("delete from test where id = ? ");
                        $stmt->bind_param('i', $delete_id);
                        $stmt->execute();

                        if($stmt->affected_rows > 0)
                        {
                            echo'
                            <div class="scs"> Successfully deleted Question. </div>
                            ';
                        }
                        else{
                            echo'
                            <div class="err"> Something went wrong please try again! </div>
                            ';
                        }
                        $stmt->close();
                        
                    }

                    // selecting RNA type 
                    if(isset($_GET['type']))
                    {
                        $type = $_GET['type'];
                        
                        if($type == 'rna1')
                        {

                            $stmt = $conn->prepare("select * from test where type = ?");
                            $stmt->bind_param('s', $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            if($res->num_rows > 0)
                            {
                                $count = 1;
                                echo'
                                <div class="flex items-center">
                                    <h3 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white pr-10">
                                        Test Questions RNA 1 
                                    </h3>
                                    <a href="test_question.php" class="text-red-600 font-bold text-[40px] "> X </a>
                                </div>
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
                                                    Question
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
                                                                <a href="edit_question.php?id='.$row['id'].'&type='.$type.'" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                                                    Edit
                                                                </a>
                                                                <button name="delete_id" value="'.$row['id'].'" class="text-red-600 hover:text-red-900" onclick="return confirm(\' Are you sure you want to delete this record ? \')">
                                                                    Delete
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
                                <h2 class="text-gray-900 dark:text-white" style="background: rgb(0,0,0,0.3); padding: 20px; font-size: 30px;">
                                    RNA 1 Questions no records yet
                                </h2>
                                <?php
                            }
                        }
                        else
                        if($type == 'rna2')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                RNA 2 Not available yet
                            </div>
                            ';
                        }
                        else
                        if($type == 'rna3')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                RNA 3 Not available yet
                            </div>
                            ';
                        }
                    }
                ?>

                <!-- line  -->
                <div class="border-b border-black m-5 dark:border-white border-solid border-2"></div>

                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Questions for Web Dev Exam</h2>
                </div>
                    <section class="bg-white dark:bg-gray-900">
                            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                                <!-- WDV 1 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=wdv1" class="mr-2 text-5xl font-extrabold">WDV 1</a>
                                    </div>
                                </div>
                                <!-- WDV 2 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=wdv2" class="mr-2 text-5xl font-extrabold">WDV 2</a>
                                    </div>
                                </div>
                                <!-- WDV 3 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=wdv3" class="mr-2 text-5xl font-extrabold">WDV 3</a>
                                    </div>
                                </div>
                                <!-- WDV 4 -->
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=wdv4" class="mr-2 text-5xl font-extrabold">WDV 4</a>
                                    </div>
                                </div>
                                <!-- WDV 5 --> 
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center items-baseline my-8">
                                        <a href="test_question.php?type=wdv5" class="mr-2 text-5xl font-extrabold">WDV 5</a>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
                <?php
                    // selecting WDV                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        type 
                    if(isset($_GET['type']))
                    {
                        $type = $_GET['type'];
                        
                        if($type == 'wdv1')
                        {
                            $stmt = $conn->prepare("select * from test where type = ?");
                            $stmt->bind_param('s', $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            if($res->num_rows > 0)
                            {
                                $count = 1;
                                echo'
                                <div class="flex items-center">
                                    <h3 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white pr-10">
                                        Test Questions WDV 1
                                    </h3>
                                    <a href="test_question.php" class="text-red-600 font-bold text-[40px] "> X </a>
                                </div>

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
                                                    Question
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
                                                                <a href="edit_question.php?id='.$row['id'].'&type='.$type.'" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                                                    Edit
                                                                </a>
                                                                <button name="delete_id" value="'.$row['id'].'" class="text-red-600 hover:text-red-900" onclick="return confirm(\' Are you sure you want to delete this record ? \')">
                                                                    Delete
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
                                <h2 class="text-gray-900 dark:text-white" style="background: rgb(0,0,0,0.3); padding: 20px; font-size: 30px;">
                                    RNA 1 Questions no records yet
                                </h2>
                                <?php
                            }
                        }
                        else
                        if($type == 'wdv2')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                Web dev 2 not available yet
                            </div>
                            ';
                        }
                        else
                        if($type == 'wdv3')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                Web dev 3 not available yet
                            </div>
                            ';
                        }
                        else
                        if($type == 'wdv4')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                Web dev 4 not available yet
                            </div>
                            ';
                        }
                        else
                        if($type == 'wdv5')
                        {
                            echo '
                            <div class="text-2xl font-bold text-center p-4 bg-gray-600 text-white">
                                Web dev 5 not available yet
                            </div>
                            ';
                        }
                    }
                ?>
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