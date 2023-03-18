<?php
session_start();
include("db_connection.php");

$branchName = $_SESSION['branch_name'];

if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_training = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_training FROM amd_student_registered WHERE registration_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
    $result_of_training = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_training FROM amd_student_registered WHERE created_by ='$branchName'");
}
$row_of_training = mysqli_fetch_assoc($result_of_training);
$sum_of_training = $row_of_training['value_sum_of_training'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_requests = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_requests FROM amd_customer_requests WHERE request_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
    $result_of_requests = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_requests FROM amd_customer_requests WHERE created_by ='$branchName'");
}
$row_of_requests = mysqli_fetch_assoc($result_of_requests);
$sum_of_requests = $row_of_requests['value_sum_of_requests'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_fuel = mysqli_query($conn, "SELECT SUM(amount) AS value_sum_of_fuel FROM amd_fuel_consumption_records WHERE on_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
    $result_of_fuel = mysqli_query($conn, "SELECT SUM(amount) AS value_sum_of_fuel FROM amd_fuel_consumption_records WHERE created_by ='$branchName'");
}
$row_of_fuel = mysqli_fetch_assoc($result_of_fuel);
$sum_of_fuel = $row_of_fuel['value_sum_of_fuel'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_maintainence = mysqli_query($conn, "SELECT SUM(bill_amount) AS value_sum_of_maintainence FROM amd_car_maintainence_record WHERE servicing_date between '$fromdate' AND '$todate' AND  created_by ='$branchName'");
} else {
    $result_of_maintainence = mysqli_query($conn, "SELECT SUM(bill_amount) AS value_sum_of_maintainence FROM amd_car_maintainence_record WHERE created_by ='$branchName'");
}
$row_of_maintainence = mysqli_fetch_assoc($result_of_maintainence);
$sum_of_maintainence = $row_of_maintainence['value_sum_of_maintainence'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_salary = mysqli_query($conn, "SELECT SUM(salary_amount) AS value_sum_of_salary FROM amd_salary_records WHERE salary_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
    $result_of_salary = mysqli_query($conn, "SELECT SUM(salary_amount) AS value_sum_of_salary FROM amd_salary_records WHERE created_by ='$branchName'");
}
$row_of_salary = mysqli_fetch_assoc($result_of_salary);
$sum_of_salary = $row_of_salary['value_sum_of_salary'];



if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_credited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_credited_transactions FROM amd_transaction_records WHERE transaction_date between '$fromdate' AND '$todate' AND transaction_type = 'CREDIT' AND created_by ='$branchName'");
} else {
    $result_of_credited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_credited_transactions FROM amd_transaction_records WHERE transaction_type = 'CREDIT' AND created_by ='$branchName'");
}
$row_of_credited_transactions = mysqli_fetch_assoc($result_of_credited_transactions);
$sum_of_credited_transactions = $row_of_credited_transactions['value_sum_of_credited_transactions'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $result_of_debited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_debited_transactions FROM amd_transaction_records WHERE transaction_date between '$fromdate' AND '$todate' AND transaction_type = 'DEBIT' AND created_by ='$branchName'");
} else {
    $result_of_debited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_debited_transactions FROM amd_transaction_records WHERE transaction_type = 'DEBIT' AND created_by ='$branchName'");
}
$row_of_debited_transactions = mysqli_fetch_assoc($result_of_debited_transactions);
$sum_of_debited_transactions = $row_of_debited_transactions['value_sum_of_debited_transactions'];

$overall_profit = ($sum_of_training + $sum_of_requests + $sum_of_credited_transactions) - ($sum_of_fuel + $sum_of_maintainence + $sum_of_salary + $sum_of_debited_transactions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Financial Overview</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">

        <div class="container bg-yellow-100 px-12 py-11 mx-auto">
            <div class="flex flex-wrap w-full ">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <div class="text-center">
                        <img class="w-36 mb-4" src="assets/amazenewlogo.svg" alt="logo" />
                    </div>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                    <p class="mt-4 text-sm font-medium text-gray-900">Net Profit & Expense Overview</p>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
        </div>

        <div class="container px-12  mx-auto">
            <form action="" method="GET">
                <div class="px-8 py-2 flex items-center justify-start ">
                    <div class="flex">
                        <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="fromdate" value="<?php if (isset($_GET['fromdate'])) {
                                                                                                                                                        echo $_GET['fromdate'];
                                                                                                                                                    } ?>" class="px-4 py-2 w-80 mr-2 font-medium border-2 border-gray-200 rounded" placeholder="From Date">
                        <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="todate" value="<?php if (isset($_GET['todate'])) {
                                                                                                                                                    echo $_GET['todate'];
                                                                                                                                                } ?>" class="px-4 py-2 w-80 font-medium border-2 border-gray-200 rounded" placeholder="To Date">
                        <button class="px-4 text-white rounded ml-4 hover:bg-gray-500 bg-gray-400">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex container px-12 mt-12 mx-auto">
            <?php
            if (
                $sum_of_training != 0 &&
                $sum_of_requests != 0 &&
                $sum_of_fuel != 0
                && $sum_of_maintainence != 0 &&
                $sum_of_salary != 0 &&
                $sum_of_credited_transactions != 0 &&
                $sum_of_debited_transactions != 0
            ) {
            ?>
                <div id="myfirstchart" class="w-1/2" style="height: 400px;"></div>
            <?php
            } else {
            ?>
                <div id="myfirstchart" class="px-8 w-1/2 grid grid-cols-3 gap-4 place-items-center" style="height: 400px;">
                    <p>Can't load chart untill all values are non-zero</p>
                </div>
            <?php
            }
            ?>

            <div class="flex flex-wrap w-1/2">
                <div class="md:w-full text-center -mt-10">
                    <?php
                    if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
                    ?>
                        <p class="text-xl font-medium">Report Statistics from <span style="color: #F7C04A; font-weight: bold;"><?= date("d M Y", strtotime($_GET['fromdate'])); ?></span> to <span style="color: #F7C04A; font-weight: bold;"><?= date("d M Y", strtotime($_GET['todate'])); ?></span></p>
                    <?php
                    } else {
                    ?>
                        <p class="text-xl font-medium">Overall Report</p>
                    <?php
                    }
                    ?>
                </div>
                <!-- <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #03C988">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_training) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Income From Training</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #03C988">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_requests) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Income From Customer Requests</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #DD5353">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_fuel) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Expense on Fuel Consumption</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #DD5353">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_maintainence) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Expense on Car Maintainence</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #DD5353">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_salary) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Staff Salary Given</p>
                    </div>
                </div> -->
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #03C988">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_credited_transactions) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total amount of credited transactions</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/2 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #DD5353">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum_of_debited_transactions) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total amount of debited transactions</p>
                    </div>
                </div>
                <div class="p-1 md:w-full sm:w-1/2 w-full">
                    <div class="flex items-center justify-end">
                        <a href="transaction_records.php"><button name="transactions" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Overview all transactions</button></a>
                    </div>
                </div>
                <div class="p-1 md:w-full sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <?php
                            if (number_format($overall_profit) > 0) {
                            ?>
                                <span style="color: #03C988">
                                    <b>
                                        <p class="counter">₹ <?= number_format($overall_profit) ?></p>
                                    </b>
                                </span>
                            <?php
                            } else {
                            ?>
                                <span style="color: #DD5353">
                                    <b>
                                        <p class="counter">₹ <?= number_format($overall_profit) ?></p>
                                    </b>
                                </span>
                            <?php
                            }
                            ?>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total profit after calculating all incomes and expenses from all categories</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    #myfirstchart * {
        font-family: open sans;
        font-size: 20px;
    }
</style>
<script>
    new Morris.Donut({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        backgroundColor: '#EEEEE',
        data: [{
                label: "Training (+)",
                value: <?= $sum_of_training ?>
            },
            {
                label: "Customers (+)",
                value: <?= $sum_of_requests ?>
            },
            {
                label: "Fuel (-)",
                value: <?= $sum_of_fuel ?>
            },
            {
                label: "Car (-)",
                value: <?= $sum_of_maintainence ?>
            },
            {
                label: "Salary (-)",
                value: <?= $sum_of_salary ?>
            },
            {
                label: "Credited (+)",
                value: <?= $sum_of_credited_transactions ?>
            },
            {
                label: "Debited (-)",
                value: <?= $sum_of_debited_transactions ?>
            }
        ],
        colors: [
            '#95BDFF',
            '#F0A04B',
            '#000000',
            '#F9F54B',
            '#BEF0CB',
            '#1F8A70',
            '#D61355'
        ],
        labels: ['Value']
    });
</script>

</html>

<?php
error_reporting(0);
$userprofile = $_SESSION['user_name'];

if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
    if ((strtotime($_GET['fromdate'])) > (strtotime($_GET['todate']))) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'error',
                title: 'From date cannot be greater than to date',
                text: 'Please select valid dates',
                });
                setTimeout(() => {  history.go(-1); }, 2000);
                </script>";
    } else {
        return;
    }
}

if ($userprofile == true) {
} else {
    echo "<script type='text/javascript'>Swal.fire({
                icon: 'error',
                title: 'User login required!',
                text: 'User login is required to access this page so please login to continue',
                });</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost/amazeadminpanel/index.php" />
<?php
}
?>