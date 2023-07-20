<?php
    session_start();
    include 'connect.php';

    if(isset($_GET['type']) && isset($_GET['email']))
    {
        $type = $_GET['type'];
        $email = $_GET['email'];

        if($type == 'rna1')// retake for rna 1
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
                    location.href = "enroll_rna.php?type=rna1";
                </script>
                <?php
            }
        }
    }

?>