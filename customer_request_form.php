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
    <title>Add Request</title>
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
                    <p class="mb-4 text-md font-medium text-gray-900">Customer Request Form</p>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>

            <div class="container px-12 mb-20  mx-auto">
                <form action="#" method="POST" autocomplete="off">
                    <div class="w-[100%] mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="customername" class="leading-7 text-sm font-medium text-gray-600">Customer
                                        Name</label>
                                    <input type="text" required placeholder="Customer Name" id="customername" name="customername" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="workdesc" class="leading-7 text-sm font-medium text-gray-600">Work Desciption</label>
                                    <textarea type="text" maxlength="200" placeholder="Work Description" id="workdesc" name="workdesc" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                                </div>
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="fees" class="leading-7 text-sm font-medium text-gray-600">Amount (Fees Paid)</label>
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" required placeholder="Amount Paid" id="fees" name="fees" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="totalfees" class="leading-7 text-sm font-medium text-gray-600">Total Service Amount</label>
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" required placeholder="Total Fee" id="totalfees" name="totalfees" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="requestdate" class="leading-7 text-sm font-medium text-gray-600">Request Date</label>
                                    <input type="text" required placeholder="Request Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="requestdate" name="requestdate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="phone" class="leading-7 text-sm font-medium text-gray-600">Customer Mobile Number</label>
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required placeholder="Customer Mobile Number" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="selectstatus" class="leading-7 text-sm font-medium text-gray-600">Select Status</label>
                                    <select id="selectstatus" name="selectstatus" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                        <option class="font-medium" value="" disabled selected>Select Status</option>
                                        <option class="font-medium" value="Pending">Pending</option>
                                        <option class="font-medium" value="In Progress">In Progress</option>
                                        <option class="font-medium" value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="p-2 w-full mt-10">
                                <button name="addrequest" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Add Request</button>
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

if (isset($_POST['addrequest'])) {
    $customer_name       = $_POST['customername'];
    $work_description    = $_POST['workdesc'];
    $fees_paid           = $_POST['fees'];
    $total_fees          = $_POST['totalfees'];
    $request_date        = $_POST['requestdate'];
    $mobile_number       = $_POST['phone'];
    $status              = $_POST['selectstatus'];
    $created_by          = $_SESSION['branch_name'];


    $query = "INSERT INTO `amd_customer_requests`(`customer_name`, `work_description`, `fees_paid`, `total_fees`, `request_date`, `mobile_number`,`status`, `created_by`)
     VALUES ('$customer_name','$work_description','$fees_paid', '$total_fees', '$request_date','$mobile_number','$status','$created_by')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Request added successfully!!',
                text: 'Request has been added successfuly',
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
    <meta http-equiv="refresh" content="0; url = https://www.amazemotordriving.com/amazeadminpanel/index.php" />
<?php
}
?>