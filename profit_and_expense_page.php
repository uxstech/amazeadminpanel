<?php
session_start();
include("db_connection.php");
include("all_calculations.php");

$dataPoints = array(
    array("label" => "Income from training", "y" => $sum_of_training),
    array("label" => "Income from customer requests", "y" => $sum_of_requests),
    array("label" => "Expense on car maintainence", "y" => $sum_of_maintainence),
    array("label" => "Expense on staff salary", "y" => $sum_of_salary),
    array("label" => "Other credited transactions", "y" => $sum_of_credited_transactions),
    array("label" => "Other debited transactions", "y" => $sum_of_debited_transactions)
)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Financial Overview</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 py-11 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <p class="mb-4 text-md font-medium text-gray-900">Revenue Overview</p>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
        </div>

        <div class="container px-12  mx-auto">
            <form action="" method="GET">
                <div class="py-2 flex items-center justify-start ">
                    <div class="flex">
                        <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="fromdate" value="<?php if (isset($_GET['fromdate'])) {
                                                                                                                                                        echo $_GET['fromdate'];
                                                                                                                                                    } ?>" class="px-4 py-2 w-80 mr-2 font-medium border-2 border-gray-200 rounded" placeholder="From Date">
                        <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="todate" value="<?php if (isset($_GET['todate'])) {
                                                                                                                                                    echo $_GET['todate'];
                                                                                                                                                } ?>" class="px-4 py-2 w-80 font-medium border-2 border-gray-200 rounded" placeholder="To Date">
                        <button class="px-4 text-white rounded ml-4 hover:bg-gray-500 bg-gray-700">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex container px-12 mt-12 mx-auto">
            <div id="chartContainer" class="w-1/2" style="height: 400px;"></div>
            <div class="flex flex-wrap w-1/2">
                <div class="md:w-full text-center -mt-10">
                    <?php
                    if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
                    ?>
                        <p class="text-xl font-medium">Report statistics from <span style="color: #F7C04A; font-weight: bold;"><?= date("d M Y", strtotime($_GET['fromdate'])); ?></span> to <span style="color: #F7C04A; font-weight: bold;"><?= date("d M Y", strtotime($_GET['todate'])); ?></span></p>
                    <?php
                    } else {
                    ?>
                        <p class="text-xl font-medium">Overall report since establishment</p>
                    <?php
                    }
                    ?>
                </div>
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
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md -mt-12">
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
                <div class="p-1 md:w-full sm:w-1/2 w-full -mt-10">
                    <div class="flex items-center justify-end">
                        <a href="transaction_records.php"><button name="transactions" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Overview all transactions</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Incomes and Expenses"
            },
            subtitles: [{
                text: "Amaze motor driving school"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "₹#,##\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
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
    <meta http-equiv="refresh" content="0; url = https://www.amazemotordriving.com/amazeadminpanel/index.php" />
<?php
}
?>