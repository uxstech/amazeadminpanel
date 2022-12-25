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
    <title>Student Registration</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 mt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <div class="text-center">
                        <img class="w-72 mb-4" src="/amazeadminpanel/assets/amazelogo.svg" alt="logo" />
                    </div>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                    <p class="mt-4 title-font text-lg font-medium text-gray-900">Student Registration</p>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed title-font font-medium text-gray-900">An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>
    </section>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 mb-20  mx-auto">
            <form action="#" method="POST" autocomplete="off">
                <div class="w-[75%] mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="firstname" class="leading-7 text-sm font-medium text-gray-600">First Name</label>
                                <input type="text" maxlength="50" required placeholder="First Name" id="firstname" name="firstname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="middlename" class="leading-7 text-sm font-medium text-gray-600">Middle Name</label>
                                <input type="text" maxlength="50" required placeholder="Middle Name" id="middlename" name="middlename" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="lastname" class="leading-7 text-sm font-medium text-gray-600">Last Name</label>
                                <input type="text" maxlength="50" required placeholder="Last Name" id="lastname" name="lastname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="phone" class="leading-7 text-sm font-medium text-gray-600">Phone Number</label>
                                <input type="text" required title="Phone number should be only contain 10 digits" pattern="[1-9]{1}[0-9]{9}" maxlength="10" placeholder="Phone Number" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm font-medium text-gray-600">Email Id</label>
                                <input type="email" required placeholder="Email Id" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="address" class="leading-7 text-sm font-medium text-gray-600">Address</label>
                                <textarea id="address" required placeholder="Address" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm font-medium text-gray-600">Registration Date</label>
                                <input type="text" required placeholder="Registration Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="fees" class="leading-7 text-sm font-medium text-gray-600">Amount (Fees Paid)</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required placeholder="Amount Paid" id="fees" name="fees" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="car" class="leading-7 text-sm font-medium text-gray-600">Selected Car</label>
                                <select id="car" name="car" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Car</option>
                                    <option class="font-medium" value="Amaze">Amaze</option>
                                    <option class="font-medium" value="Swift">Swift</option>
                                    <option class="font-medium" value="WagonR">WagonR</option>
                                    <option class="font-medium" value="eON">eON</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="starttime" class="leading-7 text-sm font-medium text-gray-600">Session Start Time</label>
                                <input type="text" required placeholder="Start Time" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="starttime" name="starttime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="endtime" class="leading-7 text-sm font-medium text-gray-600">Session End Time</label>
                                <input type="text" required placeholder="End Time" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="endtime" name="endtime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="customizedrequest" class="leading-7 text-sm font-medium text-gray-600">Any Other Customized Request From Client</label>
                                <textarea type="text" maxlength="200" placeholder="Other specialized requests from client/student" id="customizedrequest" name="customizedrequest" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full mt-5 text-center">
                            <p class="flex mx-auto w-1/2 leading-relaxed title-font font-medium text-gray-900">Make sure that all the data entered is correct as per the client/student given details.</button>
                        </div>
                        <div class="p-2 w-full mt-10">
                            <button name="register" type="submit" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-lg">Register Student</button>
                        </div>
            </form>
        </div>
        </div>
        </div>
    </section>
</body>

</html>

<?php
error_reporting(0);
include("db_connection.php");

if (isset($_POST['register'])) {
    $first_name         = $_POST['firstname'];
    $middle_name        = $_POST['middlename'];
    $last_name          = $_POST['lastname'];
    $phone              = $_POST['phone'];
    $email              = $_POST['email'];
    $address            = $_POST['address'];
    $registration_date  = $_POST['date'];
    $fees_paid          = $_POST['fees'];
    $car                = $_POST['car'];
    $start_time         = $_POST['starttime'];
    $end_time           = $_POST['endtime'];
    $customized_request = $_POST['customizedrequest'];


    $query = "INSERT INTO `amd_student_registered`(`first_name`, `middle_name`, `last_name`, `phone_number`, `email_id`, `address`, `registration_date`, `fees_paid`, `selected_car`, `session_start_time`, `session_end_time`, `any_customized_request`) 
            VALUES ('$first_name','$middle_name','$last_name','$phone','$email','$address','$registration_date','$fees_paid','$car','$start_time','$end_time','$customized_request')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Student registered successfully!!',
                text: 'Student has been registered successfuly',
                });</script>";
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