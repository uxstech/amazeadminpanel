<?php
session_start();
error_reporting(0);
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from amd_student_registered where id = " . $id;
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Students Info</title>
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
                    <p class="mt-4 text-md font-medium text-gray-900"><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?></p>
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
                        <table class="table-fixed min-w-[100%]">
                            <thead class="bg-white border-b">
                                <tr class="bg-gray-300">
                                    <th scope="col" class=" text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Details
                                    </th>
                                    <th scope="col" class=" text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Name</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Selected Car</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['selected_car']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Phone Number</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['phone_number']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['email_id']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition  bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Address</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['address']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Registration Date</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= date("d M Y", strtotime($row['registration_date'])); ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Fees Paid</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= "₹ " . $row['fees_paid']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Session Start Time</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= date("g:i a", strtotime($row['session_start_time'])); ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Session End Time</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= date("g:i a", strtotime($row['session_end_time'])); ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Any Customized Note</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= $row['any_customized_request']; ?>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Registered from</td>
                                    <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                        <?= ucwords(strtolower(str_replace("_", " ", $row['created_by']))); ?>
                                    </td>
                                </tr>

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