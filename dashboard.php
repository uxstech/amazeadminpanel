<?php
session_start();
include("db_connection.php");
include("all_calculations.php");

$branchName = $_SESSION['branch_name'];
$role = $_SESSION['role'];
$admin_role = "ADMIN";

$dataPointsIncome = array(
    array("label" => "Training", "y" => $sum_of_training),
    array("label" => "Requests", "y" =>  $sum_of_requests),
    array("label" => "Credits", "y" =>  $sum_of_credited_transactions)
);

$dataPointsExpense = array(
    array("label" => "Maintainence", "y" => $sum_of_maintainence),
    array("label" => "Fuel", "y" =>  $sum_of_fuel),
    array("label" => "Salary", "y" =>  $sum_of_salary),
    array("label" => "Debits", "y" =>  $sum_of_debited_transactions)
);

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
    <title>Dashboard</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<script>
    history.pushState(null, document.title, location.href);
    history.back();
    history.forward();
    window.onpopstate = function() {
        history.go(1);
    };
</script>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 py-12 mx-auto">
            <div class="flex flex-wrap w-full ">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <div class="text-center">
                        <img class="w-36 mb-4" src="assets/amazenewlogo.svg" alt="logo" />
                    </div>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                    <p class="mt-4 text-sm font-medium text-gray-900">Welcome, <?php
                                                                                $branchName = str_replace("_", " ", $branchName);
                                                                                echo ucwords(strtolower($branchName));
                                                                                ?></p>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
            <div class="flex items-center justify-end -mt-10">
                <a href="logout.php"><button name="logout" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Logout</button></a>
            </div>
        </div>
        <div class="flex container px-12 py-12 mx-auto">
            <?php if ($role == $admin_role) {
            ?>
                <div class="flex flex-wrap w-[70%]">
                <?php
            } else {
                ?>
                    <div class="flex flex-wrap w-[100%]">
                    <?php
                }
                    ?>

                    <?php if ($role == $admin_role) {
                    ?>
                        <div class="p-1 md:w-1/2">
                        <?php
                    } else {
                        ?>
                            <div class="p-1 md:w-1/3">
                            <?php
                        }
                            ?>

                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-36 md:h-24 w-full" src="assets/student_registration.svg" alt="blog">
                                <div class="p-6">
                                    <?php if ($role == $admin_role) {
                                    ?>
                                        <h2 class="text-sm title-font font-medium text-gray-400">
                                            <span style="color: #03C988">
                                                <b>
                                                    <p class="counter">₹ <?= number_format($sum_of_requests) ?></p>
                                                </b>
                                            </span>
                                        </h2>
                                    <?php
                                    }
                                    ?>
                                    <h1 class="title-font text-sm font-medium text-gray-900">Customer Requests</h1>
                                    <p class="leading-relaxed mb-3 text-xs text-sm font-medium">Here you can manage all the customer requests and keep the track of it to get it done as soon as possible.</p>
                                    <div class="flex items-center flex-wrap ">
                                        <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="customer_request_list.php">Continue
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php if ($role == $admin_role) {
                            ?>
                                <div class="p-1 md:w-1/2">
                                <?php
                            } else {
                                ?>
                                    <div class="p-1 md:w-1/3">
                                    <?php
                                }
                                    ?>
                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                        <img class="lg:h-36 md:h-24 w-full" src="assets/analysys.svg" alt="blog">
                                        <div class="p-6">
                                            <?php if ($role == $admin_role) {
                                            ?>
                                                <h2 class="text-sm title-font font-medium text-gray-400">
                                                    <span style="color: #03C988">
                                                        <b>
                                                            <p class="counter">₹ <?= number_format($sum_of_training) ?></p>
                                                        </b>
                                                    </span>
                                                </h2>
                                            <?php
                                            }
                                            ?>
                                            <h1 class="title-font text-sm font-medium text-gray-900">Training Students</h1>
                                            <p class="leading-relaxed mb-3 text-xs font-medium">Here you can manage and keep track of all the students who are registered for driving classes.</p>
                                            <div class="flex items-center flex-wrap ">
                                                <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="student_detail_list.php">Continue
                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <?php if ($role == $admin_role) {
                                    ?>
                                        <div class="p-1 md:w-1/2">
                                        <?php
                                    } else {
                                        ?>
                                            <div class="p-1 md:w-1/3">
                                            <?php
                                        }
                                            ?>
                                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                                <img class="lg:h-36 md:h-24 w-full" src="assets/car_maintainence.svg" alt="blog">
                                                <div class="p-6">
                                                    <?php if ($role == $admin_role) {
                                                    ?>
                                                        <h2 class="text-sm title-font font-medium text-gray-400">
                                                            <span style="color: #DD5353">
                                                                <b>
                                                                    <p class="counter">₹ <?= number_format($sum_of_maintainence) ?></p>
                                                                </b>
                                                            </span>
                                                        </h2>
                                                    <?php
                                                    }
                                                    ?>
                                                    <h1 class="title-font text-sm font-medium text-gray-900">Car Maintainence Records</h1>
                                                    <p class="leading-relaxed mb-3 text-xs font-medium">Here you can overview and add car maintainence records to keep track on expenses on car.</p>
                                                    <div class="flex items-center flex-wrap ">
                                                        <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="car_maintainence_records.php">Continue
                                                            <svg class=" w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M5 12h14"></path>
                                                                <path d="M12 5l7 7-7 7"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <?php if ($role == $admin_role) {
                                            ?>
                                                <div class="p-1 md:w-1/2">
                                                <?php
                                            } else {
                                                ?>
                                                    <div class="p-1 md:w-1/3">
                                                    <?php
                                                }
                                                    ?>
                                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                                        <img class="lg:h-36 md:h-24 w-full" src="assets/fuel_consumption_entry.svg" alt="blog">
                                                        <div class="p-6">
                                                            <?php if ($role == $admin_role) {
                                                            ?>
                                                                <h2 class="text-sm title-font font-medium text-gray-400">
                                                                    <span style="color: #DD5353">
                                                                        <b>
                                                                            <p class="counter">₹ <?= number_format($sum_of_fuel) ?></p>
                                                                        </b>
                                                                    </span>
                                                                </h2>
                                                            <?php
                                                            }
                                                            ?>
                                                            <h1 class="title-font text-sm font-medium text-gray-900">Fuel Consumption Records</h1>
                                                            <p class="leading-relaxed mb-3 text-xs font-medium">Here you can overview and add fuel consumption records to keep track on fuel consumption of each car.</p>
                                                            <div class="flex items-center flex-wrap ">
                                                                <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="fuel_consumption_records.php">Continue
                                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                        <path d="M12 5l7 7-7 7"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php if ($role == $admin_role) {
                                                    ?>
                                                        <div class="p-1 md:w-1/2">
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <div class="p-1 md:w-1/3">
                                                            <?php
                                                        }
                                                            ?>
                                                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                                                <img class="lg:h-36 md:h-24 w-full" src="assets/staff_registration.svg" alt="blog">
                                                                <div class="p-6">
                                                                    <?php if ($role == $admin_role) {
                                                                    ?>
                                                                        <h2 class="text-sm title-font font-medium text-gray-400">
                                                                            <span style="color: #DD5353">
                                                                                <b>
                                                                                    <p class="counter">₹ <?= number_format($sum_of_salary) ?></p>
                                                                                </b>
                                                                            </span>
                                                                        </h2>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <h1 class="title-font text-sm font-medium text-gray-900">Salary Records</h1>
                                                                    <p class="leading-relaxed mb-3 text-xs font-medium">It helps you to overview and add salary records, also you can track salaries disbursed to staff.</p>
                                                                    <div class="flex items-center flex-wrap ">
                                                                        <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="salary_records.php">Continue
                                                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                <path d="M5 12h14"></path>
                                                                                <path d="M12 5l7 7-7 7"></path>
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <?php if ($role == $admin_role) {
                                                            ?>
                                                                <div class="p-1 md:w-1/2">
                                                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                                                        <img class="lg:h-36 md:h-24 w-full" src="assets/pandl.svg" alt="blog">
                                                                        <div class="p-6">
                                                                            <h2 class="tracking-widest text-sm title-font font-medium text-gray-400">OVERVIEW</h2>
                                                                            <h1 class="title-font text-sm font-medium text-gray-900">Net Profit & Expense Statements</h1>
                                                                            <p class="leading-relaxed mb-3 text-xs font-medium">It helps you to overview the exact numbers of total profit and expenses along with graphical representation.</p>
                                                                            <div class="flex items-center flex-wrap ">
                                                                                <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="profit_and_expense_page.php">Continue
                                                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                        <path d="M5 12h14"></path>
                                                                                        <path d="M12 5l7 7-7 7"></path>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="p-1 md:w-1/3">
                                                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                                                        <img class="lg:h-36 md:h-24 w-full" src="assets/pandl.svg" alt="blog">
                                                                        <div class="p-6">
                                                                            <h1 class="title-font text-sm font-medium text-gray-900">Manage Transactions</h1>
                                                                            <p class="leading-relaxed mb-3 text-xs font-medium">Manage overall credit and debit statements and overview all the incomes and expenses occured at this branch.</p>
                                                                            <div class="flex items-center flex-wrap ">
                                                                                <a class="text-yellow-500 text-xs font-medium inline-flex items-center md:mb-2 lg:mb-0" href="transaction_records.php">Continue
                                                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                        <path d="M5 12h14"></path>
                                                                                        <path d="M12 5l7 7-7 7"></path>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php if ($role == $admin_role) {
                                                        ?>
                                                            <div class="flex flex-wrap w-[30%]">
                                                                <div id="chartContainerIncome" class="p-1 md:w-full px-12" style="height: 380px;"></div>
                                                                <div id="chartContainerExpense" class="p-1 md:w-full px-12" style="height: 380px;"></div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                </div>
                                                <div class="container px-12 py-4 mx-auto">
                                                    <footer class="text-center text-xs lg:text-left">
                                                        <div class="text-gray-500 font-medium text-left p-2">
                                                            © 2023 Copyright: Amaze motor driving school, panel designed & developed by uxstechnologies
                                                        </div>
                                                    </footer>
                                                </div>
    </section>
</body>

<script>
    window.onload = function() {
        var chartIncome = new CanvasJS.Chart("chartContainerIncome", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Income streams"
            },
            axisY: {
                scaleBreaks: {
                    autoCalculate: false
                }
            },
            data: [{
                type: "column",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPointsIncome, JSON_NUMERIC_CHECK); ?>
            }]
        });
        var chartExpense = new CanvasJS.Chart("chartContainerExpense", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Expense streams"
            },
            axisY: {
                scaleBreaks: {
                    autoCalculate: false
                }
            },
            data: [{
                type: "column",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPointsExpense, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chartIncome.render();
        chartExpense.render();

    }
</script>

</html>

<?php
error_reporting(0);
$userprofile = $_SESSION['user_name'];
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