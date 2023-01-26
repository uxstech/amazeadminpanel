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
                    <p class="mb-4 text-md font-medium text-gray-900">Car Maintainence Form</p>
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
                                <label for="selectedcar" class="leading-7 text-sm font-medium text-gray-600">Select Car</label>
                                <select id="selectedcar" name="selectedcar" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Car</option>
                                    <option class="font-medium" value="Amaze">Amaze</option>
                                    <option class="font-medium" value="Swift">Swift</option>
                                    <option class="font-medium" value="WagonR">WagonR</option>
                                    <option class="font-medium" value="eON">eON</option>
                                    <option class="font-medium" value="Celerio">Celerio (Automatic)</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="vendorname" class="leading-7 text-sm font-medium text-gray-600">Vendor Name (Service Provider)</label>
                                <input type="text" required placeholder="Vendor Name" id="vendorname" name="vendorname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="billno" class="leading-7 text-sm font-medium text-gray-600">Bill Number</label>
                                <input type="text" required placeholder="Bill Number" id="billno" name="billno" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="amount" class="leading-7 text-sm font-medium text-gray-600">Bill Amount</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" required placeholder="Amount Paid" id="amount" name="amount" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm font-medium text-gray-600">Servicing Date</label>
                                <input type="text" required placeholder="Servicing Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="nextdate" class="leading-7 text-sm font-medium text-gray-600">Next Service Date</label>
                                <input type="text" required placeholder="Next Service Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="nextdate" name="nextdate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="vehicleno" class="leading-7 text-sm font-medium text-gray-600">Vehicle Number</label>
                                <input type="text" required placeholder="Vehicle Number" id="vehicleno" name="vehicleno" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="mobileno" class="leading-7 text-sm font-medium text-gray-600">Mobile Number of Vendor</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required placeholder="Mobile Number of Vendor" id="mobileno" name="mobileno" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="workdesc" class="leading-7 text-sm font-medium text-gray-600">Job Description or Parts serviced</label>
                                <textarea type="text" maxlength="200" placeholder="Job Description or Parts serviced" id="workdesc" name="workdesc" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                            </div>
                        </div>

                        <div class="p-2 w-full mt-10">
                            <button name="addrecord" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-lg">Add Record</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<?php
error_reporting(0);
include("db_connection.php");

if (isset($_POST['addrecord'])) {
    $selected_car           = $_POST['selectedcar'];
    $vendor_name            = $_POST['vendorname'];
    $bill_number            = $_POST['billno'];
    $bill_amount            = $_POST['amount'];
    $servicing_date         = $_POST['date'];
    $next_servicing_date    = $_POST['nextdate'];
    $vehicle_number         = $_POST['vehicleno'];
    $mobile_number          = $_POST['mobileno'];
    $job_description        = $_POST['workdesc'];
    $created_by             = $_SESSION['branch_name'];


    $query = "INSERT INTO `amd_car_maintainence_record`(`service_of_car`, `vendor_name`, `bill_number`, `bill_amount`, `vehicle_number`, `servicing_date`, `next_servicing_date`, `mobile_number`, `job_description`, `created_by`)
     VALUES ('$selected_car','$vendor_name','$bill_number','$bill_amount','$vehicle_number','$servicing_date','$next_servicing_date','$mobile_number','$job_description','$created_by')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Record added successfully!!',
                text: 'Record has been added successfuly',
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