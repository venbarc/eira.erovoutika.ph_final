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
                        <h3 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                            Test Results for <span class="text-red-600"> Failed </span> 
                        </h3>
                    </div>

                    <?php
                        $stmt = $conn->prepare("SELECT r.*,u.* from result r join users u on r.email = u.email where r.verdict = 'failed' ");
                        $stmt->execute();
                        $res = $stmt->get_result();
                        
                        if ($res->num_rows > 0) 
                        {
                            $count = 1;
                            echo '
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Allow Retake
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Profile Image
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Full Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Score %
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Passing Score %
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Verdict
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date
                                            </th>
                                        </tr>
                                    </thead>
                                ';
                            while($row = $res->fetch_assoc()) 
                            {
                                $image = $row['image'];
                                $verdict = $row['verdict'];
                                $type = $row['type'];
                                $email = $row['email'];

                                // check image 
                                if(empty($image))
                                {
                                    $image = '<img src="../assets/img/profile/default2.png" class="admin_user_profile">';
                                }
                                else{
                                    $image = '<img src="../'. $image .'" class="admin_user_profile w-[55px] h-auto object-cover">';
                                }
                                // verdict color 
                                if($verdict == 'failed')
                                {
                                    $verdict = '<p class="text-red-700">Failed</p> ';
                                }
                                else{
                                    $verdict = '<p class="text-green-700">Passed</p> ';
                                }

                                echo '
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        '. $count++ .'
                                        </th>
                                        <td class="px-6 py-4">
                                            <a href="retake_allow.php?type='.$type.'&email='.$email.'" 
                                            onclick="return confirm(\'Are You sure you want to allow '. $email .' to retake ?\')"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Allow
                                            </a>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            '.$image.'
                                        </th>
                                        <td class="px-6 py-4">
                                        '. $row['email'] .'
                                        </td>
                                        <td class="px-6 py-4">
                                        '. $row['full_name'] .'
                                        </td>
                                        <td class="px-6 py-4">
                                        '. $row['overall_user_percent'] .' %
                                        </td>
                                        <td class="px-6 py-4">
                                            Passing 70%
                                        </td>
                                        <td class="px-6 py-4">
                                        '. $verdict .'
                                        </td>
                                        <td class="px-6 py-4">
                                        '. $row['date'] .'
                                        </td>
                                    </tr>
                                </tbody>
                            ';
                            }
                            echo '</table>
                                </div>

                            ';
                        } 
                        else{
                            ?>
                            <h1 class="text-white bg-gray-600 p-5 text-center text-lg">No Records yet</h1>
                            <?php
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