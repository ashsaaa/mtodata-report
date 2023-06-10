<?php

$currentDate = date('Y-m-d');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>

    <!--Styling-->
    <link rel="stylesheet" href="../../assets/css/reports.css" type="text/css">

    <!--html2pdf library-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--es6-promise library-->
    <script src="../../assets/js/es6-promise-master/lib/es6-promise.auto.js"></script>
    <!--jspdf library-->
    <script src="../../assets/js/jsPDF-master/dist/jspdf.es.min.js"></script>
    <!--html2canvas library-->
    <script src="../../assets/js/html2canvas-master/package.json"></script>
    <!--html2pdf library-->
    <script src="../../assets/js/html2pdf.js-master/dist/html2pdf.min.js"></script>

</head>

<body>

    <!--Button for PDF Generation-->
    <button id="save">Generate as PDF</button>

    <div class="container" id="container">
        <div class="wrapper">
            <div class="header">COMPLAINTS</div>
            <div class="contents">

                <!--DB Connection-->
                <?php

                //connection
                include "db_con.php";

                //check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //data retrieval
                $sql = "SELECT * FROM complaint_details";
                $result = $conn->query($sql);

                if ($result === false) {
                    die("Error executing the query: " . $conn->error);
                }

                if ($result->num_rows === 0) {
                    echo "No rows found.";
                }

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    
                    <div class='det_wrap'>
                    <p class='det'>Complaint No. &nbsp</p>
                    <p class='detret'>" . $row["id"] . "</p>
                </div>
                <div class='det_wrap'>
                    <p class='det'>Date: &nbsp</p>
                    <p class='detret'>" . $currentDate . "</p>
                </div>
                <br>
                <div class='det_wrap'>
                    <p class='det'>Complainant: &nbsp</p>
                    <p class='detret'>" . $row["complaint_person"] . "</p>
                </div>
                <div class='det_wrap'>
                    <p class='det'>Complaint Date: &nbsp</p>
                    <p class='detret'>" . $row["date_created"] . "</p>
                </div>
                <div class='det_wrap'>
                <p class='det'>Subject of Complaint: &nbsp</p>
                <p class='detret'>" . $row["body_no"] . "</p>
            </div>
                    <br>
                    <p class='det'>Details: </p>
                    <div class='det_con'>
                    <p class='det_con_Desc'>" . $row["details"] . "</p>
                </div>
    ";
                }

                // close MySQL connection
                $conn->close();

                ?>

                <div class="footer">
                    Footer Statements here Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nunc posuere orci vitae nisl faucibus,
                    nec rutrum metus rutrum. Curabitur efficitur mi et ligula tempus,
                    eu placerat mauris porttitor. In consectetur ultrices enim,
                    ut vestibulum dui dignissim non.
                </div>

            </div>
        </div>
    </div>

    <script src="../../assets/js/print.js"></script>
</body>

</html>