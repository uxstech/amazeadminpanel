<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Students Registered</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 mt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <div class="text-center">
                        <img class="w-56 mb-4" src="/amazeadminpanel/assets/amazelogo.svg" alt="logo" />
                    </div>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                    <p class="mt-4 text-md font-medium text-gray-900">Registered Students</p>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
    </section>
    <div class="container px-12 mb-12 mx-auto">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="table-fixed min-w-full">
                            <thead class="bg-white border-b">
                                <tr class="bg-gray-100">
                                    <th scope="col" class=" text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Sr.No
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Car
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Phone No.
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Amount
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        From
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        To
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Registered On
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                error_reporting(0);
                                include("db_connection.php");
                                $branchName = $_SESSION['branch_name'];
                                $query = "SELECT * FROM amd_student_registered WHERE created_by ='" . $branchName . "'ORDER BY id DESC";
                                $query_run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    $index = 0;
                                    foreach ($query_run as $row) {
                                        $index++;
                                ?>
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500"><?= $index ?></td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];; ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= $row['selected_car']; ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= $row['phone_number']; ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= "₹ " . $row['fees_paid']; ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= date("g:i a", strtotime($row['session_start_time'])); ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= date("g:i a", strtotime($row['session_end_time'])); ?>
                                            </td>
                                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                <?= date("d M Y", strtotime($row['registration_date'])); ?>
                                            </td>
                                            <td class="flex items-center py-4 px-6 space-x-3">
                                                <a href="/amazeadminpanel/student_record_details.php?id=<?php echo $row['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">No records found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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