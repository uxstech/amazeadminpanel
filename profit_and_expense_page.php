<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
$result = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum FROM amd_student_registered WHERE created_by ='$branchName'");
$row = mysqli_fetch_assoc($result);
$sum = $row['value_sum'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">
        <div class="container bg-yellow-100 px-12 py-12 mx-auto">
            <div class="flex flex-wrap w-full ">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <div class="text-center">
                        <img class="w-36 mb-4" src="/amazeadminpanel/assets/amazenewlogo.svg" alt="logo" />
                    </div>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                    <p class="mt-4 text-sm font-medium text-gray-900">Welcome, <?php
                                                                                $branchName = str_replace("_", " ", $_SESSION['branch_name']);
                                                                                echo ucwords(strtolower($branchName));
                                                                                ?></p>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
        </div>
        <div class="container px-12 mt-12 mb-12 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #03C988">
                                <b>
                                    <p class="counter">₹ <?= number_format($sum) ?></p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Revenue From Training</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #ECAF12">
                                <b>
                                    <p class="counter">400</p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Revenue From Customer Requests</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #ECAF12">
                                <b>
                                    <p class="counter">400</p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Expense on Fuel Consumption</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #ECAF12">
                                <b>
                                    <p class="counter">400</p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Expense on Car Maintainence</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #ECAF12">
                                <b>
                                    <p class="counter">400</p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Total Staff Salary Given</p>
                    </div>
                </div>
                <div class="p-1 md:w-1/3 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-md">
                        <h2 class="title-font font-medium text-xl text-gray-900">
                            <span style="color: #ECAF12">
                                <b>
                                    <p class="counter">400</p>
                                </b>
                            </span>
                        </h2>
                        <p class="leading-relaxed font-medium text-sm">Overall Profit Generated</p>
                    </div>
                </div>
            </div>

    </section>
</body>

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