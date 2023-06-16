"
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Income Statements</title>

    <!--Styling-->
    <link rel='stylesheet' href='../../assets/css/reports.css' type='text/css'>

    <!--html2pdf library-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'
        integrity='sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=='
        crossorigin='anonymous' referrerpolicy='no-referrer'></script>

    <!--es6-promise library-->
    <script src='../../assets/js/es6-promise-master/lib/es6-promise.auto.js'></script>
    <!--jspdf library-->
    <script src='../../assets/js/jsPDF-master/dist/jspdf.es.min.js'></script>
    <!--html2canvas library-->
    <script src='../../assets/js/html2canvas-master/package.json'></script>
    <!--html2pdf library-->
    <script src='../../assets/js/html2pdf.js-master/dist/html2pdf.min.js'></script>
</head>

<body>
    <!--Button for PDF Generation-->
    <button id='save'>Generate as PDF</button>

    <div class='container' id='container'>
        <div class='wrapper'>
            <div class='header_IS'>
                <div class='top'>
                    <img src='../../assets/img/placeholder.jpg' id='imgplaceholder'>
                    <p id='top_title'>Marulas Tricycle Operators and Drivers' Association (MTODA)</p>
                    <p id='top_IS'>Income Statement</p>
                    <p id='top_IS'>For the Month of July</p>
                </div>

                <br>

                <table>
                    <?php
                    //connection
                    include "db_con.php";

                    //check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    //data retrieval
                    $sql = $sql = "SELECT account_type	, SUM(amount) as Total
                    FROM transaction_finance
                    GROUP BY account_type;";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        die("Error executing the query: " . $conn->error);
                    }

                    if ($result->num_rows === 0) {
                        echo "No rows found.";
                    }

                    echo "
                    ?>
                        <tr>
                            <td class='tr_head'>Revenues</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Collected contributions</td>
                            <td class='IS_amount'>P&emsp;123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Renewal</td>
                            <td class='IS_amount'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;New Members</td>
                            <td class='IS_amount'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Donations</td>
                            <td class='IS_amount total_IS'>123</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>123</td>
                        </tr>
                        <tr>
                            <td>Total Revenues:</td>
                            <td></td>
                            <td class='IS_amount total_IS' >P&emsp;123</td>
                        </tr>
                <br>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>P 123</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>P 123</td>
                        </tr>
                        <tr>
                            <td class='tr_head'>Operating Expenses</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Electricity expenses</td>
                            <td class='IS_amount'>P&emsp;123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Water expenses</td>
                            <td class='IS_amount'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Rent expenses</td>
                            <td class='IS_amount'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Program expenses</td>
                            <td class='IS_amount'>123</td>
                        </tr>
                        <tr>
                            <td>&emsp;Others</td>
                            <td class='IS_amount total_IS'>123</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>P 123</td>
                        </tr>
                        <tr>
                            <td>Total Expenses:</td>
                            <td></td>
                            <td class='IS_amount total_IS'>P&emsp;123</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>P 123</td>
                        </tr>
                        <tr>
                            <td class='to_hide'>Net Income:</td>
                            <td class='to_hide'></td>
                            <td class='to_hide'>P 123</td>
                        </tr>
                        <tr>
                            <td class='tr_head'>Net Income:</td>
                            <td></td>
                            <td class='IS_amount total_IS'>P&emsp;123</td>
                        </tr>
                </table>
            </div>
        </div>; ";

                    // close MySQL connection
                    $conn->close();

                    ?>
                    <script src='../../assets/js/print.js'></script>
</body>

</html>"