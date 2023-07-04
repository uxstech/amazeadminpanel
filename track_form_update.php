<?php
session_start();
error_reporting(0);
include("db_connection.php");
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_track_records WHERE id = '$id'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
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
    <title>Update Entry</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 mt-12 mb-12 mx-auto">

            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <p class="mb-4 text-md font-medium text-gray-900">Update Entry</p>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>

            <form action="#" method="POST" autocomplete="off">
                <div class="w-[100%] mx-auto">
                    <div class="flex flex-wrap -m-2">

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="nameofuser" class="leading-7 text-sm font-medium text-gray-600">Name of track user</label>
                                <input type="text" value="<?= $result['name_of_user']; ?>" maxlength="200" required placeholder="Name of track user" id="nameofuser" name="nameofuser" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="carofuser" class="leading-7 text-sm font-medium text-gray-600">Car of user</label>
                                <input type="text" value="<?= $result['car_of_user']; ?>" maxlength="200" required placeholder="Car of user" id="carofuser" name="carofuser" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="starttime" class="leading-7 text-sm font-medium text-gray-600">Start Time</label>
                                <input type="text" value="<?= $result['start_time']; ?>" required placeholder="Start Time" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="starttime" name="starttime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="endtime" class="leading-7 text-sm font-medium text-gray-600">End Time</label>
                                <input type="text" value="<?= $result['end_time']; ?>" required placeholder="End Time" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="endtime" name="endtime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="amount" class="leading-7 text-sm font-medium text-gray-600">Amount Paid</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" value="<?= $result['amount_paid']; ?>" onKeyPress="if(this.value.length==6) return false;" required placeholder="Amount Paid" id="amount" name="amount" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm font-medium text-gray-600">Registration Date</label>
                                <input type="text" required placeholder="Registration Date" value="<?= $result['registration_date']; ?>" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="phone" class="leading-7 text-sm font-medium text-gray-600">Phone Number</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" value="<?= $result['phone_number']; ?>" onKeyPress="if(this.value.length==10) return false;" required placeholder="Phone Number" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="address" class="leading-7 text-sm font-medium text-gray-600">Address of user</label>
                                <textarea id="address" required placeholder="Address of user" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"><?= $result['address']; ?></textarea>
                            </div>
                        </div>

                        <div class="p-2 w-full mt-10">
                            <button name="updateentry" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Update Entry</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['updateentry'])) {
    $name_of_user            = $_POST['nameofuser'];
    $car_of_user             = $_POST['carofuser'];
    $start_time              = $_POST['starttime'];
    $end_time                = $_POST['endtime'];
    $amount_paid             = $_POST['amount'];
    $phone_number            = $_POST['phone'];
    $address                 = $_POST['address'];
    $registration_date       = $_POST['date'];
    $created_by              = $_SESSION['branch_name'];


    $query = "UPDATE `amd_track_records` SET `name_of_user`='$name_of_user',`car_of_user`='$car_of_user',`start_time`='$start_time',`end_time`='$end_time',`amount_paid`='$amount_paid',`phone_number`='$phone_number', `address`='$address', `registration_date`='$registration_date' WHERE id = $id";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Entry updated successfully!!',
                text: 'Entry has been updated successfuly',
                });
                setTimeout(() => {  history.go(-2); }, 1000);
                </script>";
    } else {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'error',
                title: 'Something went wrong!!',
                text: 'Make sure you have entered all the data correctly',
                });</script>";
    }
}

$userprofile = $_SESSION['user_name'];
if ($userprofile == true) {
} else {
    echo "<script type='text/javascript'>Swal.fire({
                icon: 'error',
                title: 'User login required!',
                text: 'User login is required to access this page so please login to continue',
                });</script>";
?>
    <meta http-equiv="refresh" content="0; url = https://localhost/amazeadminpanel/index.php" />
<?php
}
?>