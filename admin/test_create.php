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
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Test
                            Create for RNA Exam</h2>
                    </div>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                            <!-- RNA1 -->
                            <div
                                class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                <div class="flex justify-center items-baseline my-8">
                                    <a href="test_create.php?rna_type=rna1" class="mr-2 text-5xl font-extrabold">
                                        RNA 1
                                    </a>
                                </div>
                            </div>
                            <!-- RNA2 -->
                            <div
                                class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                <div class="flex justify-center items-baseline my-8">
                                    <a href="test_create.php?rna_type=rna2" class="mr-2 text-5xl font-extrabold">
                                        RNA 2
                                    </a>
                                </div>
                            </div>
                            <!-- RNA3 -->
                            <div
                                class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                <div class="flex justify-center items-baseline my-8">
                                    <a href="test_create.php?rna_type=rna3" class="mr-2 text-5xl font-extrabold">
                                        RNA 3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <?php
                    if(isset($_GET['rna_type']))
                    {
                        $rna_type = $_GET['rna_type'];
                        
                        if($rna_type == 'rna1')
                        {
                            ?>
                                <!-- // rna form is submitted  -->
                                <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                    <?php
                                        if(isset($_POST['submit_rna1']))
                                        {
                                            // variable initialization 
                                            $question = $_POST['question'];
                                            $opt1 = $_POST['opt1'];
                                            $opt2 = $_POST['opt2'];
                                            $opt3 = $_POST['opt3'];
                                            $opt4 = $_POST['opt4'];
                                            $answer = $_POST['answer'];
                                            $ques_type = $_POST['ques_type'];
                                            $image = $_FILES['image']['name'];

                                            $error = false;

                                            // image code
                                            if($_FILES['image']['name']) //if image is posted
                                            {
                                                $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // GET FILE EXTENSION
                                                $file_name = 'ques_img-' . rand(1000000, 9000000) .'.'. $file_ext; //GENERATE FILE NAME
                                                $file_path = 'ques_img/'. $file_name ;
                                                
                                                if(!in_array($file_ext, array('jpg', 'jpeg', 'png')))// IF FILE EXTENSION IS VALID
                                                {
                                                    echo'
                                                    <div class="err">
                                                        Only JPG, JPEG, and PNG files are allowed.
                                                    </div>
                                                    ';
                                                    $error = true;
                                                }
                                                else
                                                if($_FILES['image']['size'] > 3000000) // IF FILE IS NO LARGER THAN 3MB
                                                {
                                                    echo'
                                                    <div class="err">
                                                        Maximum file size is 3MB.
                                                    </div>
                                                    ';
                                                    $error = true;

                                                }
                                                else
                                                if(move_uploaded_file($_FILES['image']['tmp_name'], $file_path))
                                                {
                                                    $image = $file_path;
                                                    $error = false;
                                                }
                                            }
                                            else //IF IMAGE IS NOT POSTED
                                            { 
                                                $image = '';
                                                $error = false;
                                            } 

                                            if($error == false) // if there are no errors proceed to insert
                                            {
                                                // insert data in test db 
                                                $stmt = $conn->prepare("insert into test 
                                                                    (rna_type, question, opt1, opt2, opt3, opt4, answer, ques_type, image) 
                                                                    values (?, ?, ?, ?, ?, ?, ?, ?, ? )");
                                                $stmt->bind_param('sssssssss', $rna_type, $question, $opt1, $opt2, $opt3, $opt4, $answer, $ques_type, $image );
                                                $stmt->execute();
                                                
                                                if($stmt->affected_rows > 0)
                                                {
                                                    ?>
                                                        <div class="scs">
                                                            Successfully Added Question to robotics And automation 1.
                                                        </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <div class="err">
                                                            Something Went Wrong please try again!
                                                        </div>
                                                    <?php
                                                }
                                                $stmt->close();
                                            }
                                            

                                        }
                                    ?>
                                </div>

                                <!-- form for creating questions rna 1  -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        
                                        <h3 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">RNA 1  Question</h3>
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <!-- questions  -->
                                                <label for="ques" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                                                <input type="text" name="question" id="ques" placeholder="Question here..." class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                                <!-- radio buttons for question type-->
                                                <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                                    <div class="flex flex-col space-y-2">
                                                        <label class="inline-flex items-center text-gray-900 dark:text-white mb-4">
                                                            Question Type
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio text-blue-600" name="ques_type" value="rnat" checked>
                                                            <span class="ml-2 text-gray-900 dark:text-white">Robotics & Automation Terminologies</span>
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio text-blue-600" name="ques_type" value="rap">
                                                            <span class="ml-2 text-gray-900 dark:text-white">RA Programming</span>
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio text-blue-600" name="ques_type" value="rat">
                                                            <span class="ml-2 text-gray-900 dark:text-white">RA Troubleshooting</span>
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio text-blue-600" name="ques_type" value="dai">
                                                            <span class="ml-2 text-gray-900 dark:text-white">Design & Implementation</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- options -->
                                            <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                                <div>
                                                    <label for="opt1"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option 1</label>
                                                    <input type="text" name="opt1" id="opt1" placeholder="Option 1..."
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                </div>
                                                <div>
                                                    <label for="opt2"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option 2</label>
                                                    <input type="text" name="opt2" id="opt2" placeholder="Option 2..."
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                </div>
                                                <div>
                                                    <label for="opt3"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option 3</label>
                                                    <input type="text" name="opt3" id="opt3" placeholder="Option 3..."
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                </div>
                                                <div>
                                                    <label for="opt4"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option 4</label>
                                                    <input type="text" name="opt4" id="opt4" placeholder="Option 4..."
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                </div>
                                                <div>
                                                    <label for="answer"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correct Answer</label>
                                                    <input type="text" name="answer" id="answer" placeholder="Correct Answer..."
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- image -->
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                            <div class="flex w-full">
                                                <div id="multi-upload-button"
                                                    class="px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
                                                    Upload Image
                                                </div>
                                                <div class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between">
                                                    <span id="multi-upload-text" class="p-2"></span>
                                                    <button id="multi-upload-delete" class="hidden" onclick="removeMultiUpload()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                            <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- image input  -->
                                            <input type="file" id="multi-upload-input" name="image" class="hidden" />
                                            <!-- img preview  -->
                                            <div id="images-container"></div>
                                            <!-- script for image preview  and functionality-->
                                            <script>
                                                //all ids and some classes are importent for this script

                                                multiUploadButton = document.getElementById("multi-upload-button");
                                                multiUploadInput = document.getElementById("multi-upload-input");
                                                imagesContainer = document.getElementById("images-container");
                                                multiUploadDisplayText = document.getElementById("multi-upload-text");
                                                multiUploadDeleteButton = document.getElementById("multi-upload-delete");

                                                multiUploadButton.onclick = function () {
                                                    multiUploadInput.click(); // this will trigger the click event
                                                };

                                                multiUploadInput.addEventListener('change', function (event) {

                                                    if (multiUploadInput.files) {
                                                        let files = multiUploadInput.files;

                                                        // show the text for the upload button text filed
                                                        multiUploadDisplayText.innerHTML = files.length + '<span class="text-gray-900 dark:text-white"> files selected </span>';

                                                        // removes styles from the images wrapper container in case the user readd new images
                                                        imagesContainer.innerHTML = '';
                                                        imagesContainer.classList.remove("w-full", "grid", "grid-cols-1",
                                                            "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");

                                                        // add styles to the images wrapper container
                                                        imagesContainer.classList.add("w-full", "grid", "grid-cols-1",
                                                            "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");

                                                        // the delete button to delete all files
                                                        multiUploadDeleteButton.classList.add("z-100", "p-2", "my-auto");
                                                        multiUploadDeleteButton.classList.remove("hidden");

                                                        Object.keys(files).forEach(function (key) {

                                                            let file = files[key];

                                                            // the FileReader object is needed to display the image
                                                            let reader = new FileReader();
                                                            reader.readAsDataURL(file);
                                                            reader.onload = function () {

                                                                // for each file we create a div to contain the image
                                                                let imageDiv = document.createElement('div');
                                                                imageDiv.classList.add("h-64", "mb-3", "w-full",
                                                                    "p-3", "rounded-lg", "bg-cover", "bg-center"
                                                                    );
                                                                imageDiv.style.backgroundImage = 'url(' + reader
                                                                    .result + ')';
                                                                imagesContainer.appendChild(imageDiv);
                                                            }
                                                        })
                                                    }
                                                })

                                                function removeMultiUpload() {
                                                    imagesContainer.innerHTML = '';
                                                    imagesContainer.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2",
                                                        "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
                                                    multiUploadInput.value = '';
                                                    multiUploadDisplayText.innerHTML = '';
                                                    multiUploadDeleteButton.classList.add("hidden");
                                                    multiUploadDeleteButton.classList.remove("z-100", "p-2", "my-auto");
                                                }
                                            </script>
                                        </div>
                                        <!-- button to submit  -->
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                            <div>
                                                <input type="submit" name="submit_rna1" value="Add question RNA 1" class="inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            <?php
                        }   
                        else
                        if($rna_type == 'rna2')
                        {
                            echo '
                            <div class="text-white">Coming soon</div>
                            ';
                        }
                        else
                        if($rna_type == 'rna3')
                        {
                            echo '
                            <div class="text-white">Coming soon</div>
                            ';
                        }
                        
                    }
                ?>

            </section>
        </div>
    </div>

    <script>
        // pop up message error
window.onload = function() {
    var popup = document.querySelector('.err');
    setTimeout(function() {
        popup.classList.add('hidden');
    }, 5000);
}
// pop up message success
window.onload = function() {
    var popup = document.querySelector('.scs');
    setTimeout(function() {
        popup.classList.add('hidden');
    }, 5000);
}
    </script>

    <?php
        include "./Log_out.php";
        include "./components/footer.php";
        include "foot_links.php"
    ?>
   
</body>

</html>