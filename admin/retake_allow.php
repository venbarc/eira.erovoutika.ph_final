<?php
    session_start();
    include '../connect.php';

    if(isset($_GET['type']) && isset($_GET['email']))
    {
        $type = $_GET['type'];
        $email = $_GET['email'];

        // retake for rna 
        if($type == 'rna1')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'rna2')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'rna3')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        // retake for wdv
        else
        if($type == 'wdv1')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'wdv2')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'wdv3')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'wdv4')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
        else
        if($type == 'wdv5')
        {
            // delete result  
            $stmt_result = $conn->prepare("delete from result where email = ? and type = ?");
            $stmt_result->execute([$email, $type]);

            // delete payment  
            $stmt_payment = $conn->prepare("delete from payments where email = ? and type = ?");
            $stmt_payment->execute([$email, $type]);

            if($stmt_result->affected_rows > 0 && $stmt_payment->affected_rows > 0)
            {
                ?>
                <script>
                    location.href = "test_result_retake.php";
                </script>
                <?php
            }
        }
    }

?>