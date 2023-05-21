<?php
session_start();
error_reporting(0);
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from amd_student_registered where id = $id";
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
    <title>Student Info</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 mt-12 mb-12 mx-auto">

            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <p class="mb-4 text-md font-medium text-gray-900"><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?></p>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>

            <?php
            if ($row['status'] != 'Completed') {
            ?>
                <div class="flex items-center justify-end mb-4">
                    <a href="student_session_entry_form.php?id=<?php echo $row['id'] ?>"><button name="addsessionentry" class="modal-open flex text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Add Session Entry</button></a>
                </div>
            <?php
            }
            ?>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="table-fixed min-w-[100%]">
                                <thead class="bg-white border">
                                    <tr class="bg-gray-700">
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Trainee Details
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Name Of Trainee</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Selected Car By Trainee</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['selected_car']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Phone Number</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['phone_number']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Gender</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['gender']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Age In Years</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['age'] . " Years"; ?>
                                        </td>
                                    </tr>


                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Email</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['email_id']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition  bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Address</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['address']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Registration Date</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= date("d M Y", strtotime($row['registration_date'])); ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Fees Paid By Trainee</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= "₹ " . $row['fees_paid']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Session Start Time</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= date("g:i a", strtotime($row['session_start_time'])); ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition bg-gray-100 duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Session End Time</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= date("g:i a", strtotime($row['session_end_time'])); ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Any Customized Note</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['any_customized_request']; ?>
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b transition bg-gray-100  duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Status</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= $row['status']; ?>
                                        </td>
                                    </tr>


                                    <tr class="bg-white border-b transition duration-300 ease-in-out">
                                        <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Registered from</td>
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            <?= ucwords(strtolower(str_replace("_", " ", $row['created_by']))); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="table-fixed min-w-[100%]">
                                <thead class="bg-white border">
                                    <tr class="bg-gray-700">
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Completed
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Days
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Session Car
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Date
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            From
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            To
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Start Km.
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            End Km.
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Trainer
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Trainer Inputs
                                        </th>
                                        <th scope="col" class="border font-medium text-sm leading-relaxed text-gray-100 px-6 py-4 text-left">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_for_sessions = "select * from amd_student_sessions where student_id = $id";
                                    $data_for_sessions = mysqli_query($conn, $query_for_sessions);
                                    $row_for_sessions = mysqli_fetch_assoc($data_for_sessions);
                                    if (mysqli_num_rows($data_for_sessions) > 0) {
                                        foreach ($data_for_sessions as $row_for_sessions) {
                                    ?>
                                            <tr class="bg-white border-b transition duration-300 ease-in-out">
                                                <td class="border w-[4%] text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <img class="w-8" src="assets/check.png" alt="logo" />
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['session_day'] ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['session_car'] ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= date("d M Y", strtotime($row_for_sessions['session_date'])); ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= date("g:i a", strtotime($row_for_sessions['from_time'])); ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= date("g:i a", strtotime($row_for_sessions['to_time'])); ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['from_km'] . " Km"; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['to_km'] . " Km"; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['trainers_name']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row_for_sessions['trainers_input']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <a href="student_session_entry_form_update.php?id=<?php echo $row_for_sessions['id'] ?>" class="font-medium px-1 text-white bg-blue-300 rounded px-3 py-1 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">Sessions not yet started</td>
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
    <meta http-equiv="refresh" content="0; url = https://www.amazemotordriving.com/amazeadminpanel/index.php" />
<?php
}
?>