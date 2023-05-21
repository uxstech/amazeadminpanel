<?php
session_start();
error_reporting(0);
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_student_registered WHERE id = '$id'";
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
    <title>Generate Receipt</title>
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
                    <p class="mb-4 text-md font-medium text-gray-900">Generate Customer Training Registration Receipt</p>
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
                                <label for="otherdetails" class="leading-7 text-sm font-medium text-gray-600">Other Details</label>
                                <textarea type="text" required maxlength="70" placeholder="Other Details" id="otherdetails" name="otherdetails" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="selectmop" class="leading-7 text-sm font-medium text-gray-600">Select Payment Mode</label>
                                <select id="selectmop" name="selectmop" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Payment Mode</option>
                                    <option class="font-medium" value="Cash">Cash</option>
                                    <option class="font-medium" value="Cheque">Cheque</option>
                                    <option class="font-medium" value="Online">Online</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button name="generatepdf" class=" flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 font-medium rounded text-sm">Generate Receipt</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['generatepdf'])) {
?>
    <meta http-equiv="refresh" content="0; url = https://www.amazemotordriving.com/amazeadminpanel/pdf_training_student.php?id=<?php echo $_GET['id'] ?>&&selectmop=<?php echo $_POST['selectmop'] ?>&&otdesc=<?php echo $_POST['otherdetails'] ?>" />
<?php
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