<?php
session_start();
error_reporting(0);
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_salary_records WHERE id = '$id'";
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
    <title>Add Record</title>
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
                    <p class="mb-4 text-md font-medium text-gray-900">Salary Record Form</p>
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

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="staffname" class="leading-7 text-sm font-medium text-gray-600">Staff Name</label>
                                <input type="text" maxlength="100" value="<?= $result['staff_name']; ?>" required placeholder="Staff Name" id="staffname" name="staffname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm font-medium text-gray-600">Salary Date</label>
                                <input type="text" value="<?= $result['salary_date']; ?>" required placeholder="Salary Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="salary" class="leading-7 text-sm font-medium text-gray-600">Salary Amount</label>
                                <input type="number" value="<?= $result['salary_amount']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" required placeholder="Salary Amount" id="salary" name="salary" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="staffpresent" class="leading-7 text-sm font-medium text-gray-600">Staff Present (Number of days in a month)</label>
                                <input type="number" value="<?= $result['staff_present_days']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" required placeholder="Present days in a month" id="staffpresent" name="staffpresent" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="phone" class="leading-7 text-sm font-medium text-gray-600">Staff Contact Number</label>
                                <input type="number" value="<?= $result['staff_contact']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required placeholder="Staff Contact Number" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="staffaddress" class="leading-7 text-sm font-medium text-gray-600">Staff Address</label>
                                <textarea type="text" maxlength="200" placeholder="Staff Address" id="staffaddress" name="staffaddress" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"><?= $result['staff_address']; ?></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full mt-10">
                            <button name="update" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Update Record</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    $staff_name              = $_POST['staffname'];
    $salary_date             = $_POST['date'];
    $salary_amount           = $_POST['salary'];
    $staff_present_days      = $_POST['staffpresent'];
    $staff_contact           = $_POST['phone'];
    $staff_address           = $_POST['staffaddress'];
    $created_by              = $_SESSION['branch_name'];


    $query = "UPDATE `amd_salary_records` SET `staff_name`='$staff_name',`salary_date`='$salary_date',`salary_amount`='$salary_amount',`staff_present_days`='$staff_present_days',`staff_contact`='$staff_contact',`staff_address`='$staff_address' WHERE id = $id";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Record updated successfully!!',
                text: 'Record has been updated successfuly',
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
    <meta http-equiv="refresh" content="0; url = http://localhost/amazeadminpanel/index.php" />
<?php
}
?>