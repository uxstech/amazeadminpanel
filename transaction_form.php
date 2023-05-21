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
                    <p class="mb-4 text-md font-medium text-gray-900">Transaction Form</p>
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
                                <label for="transactiontype" class="leading-7 text-sm font-medium text-gray-600">Select Transaction Type</label>
                                <select id="transactiontype" name="transactiontype" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Type</option>
                                    <option class="font-medium" value="CREDIT">Credit (+)</option>
                                    <option class="font-medium" value="DEBIT">Debit (-)</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="givenby" class="leading-7 text-sm font-medium text-gray-600">Payer Name</label>
                                <input type="text" required placeholder="Payer Name" id="givenby" name="givenby" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="givento">
                                <label for="givento" class="leading-7 text-sm font-medium text-gray-600">Receiver Name</label>
                                <input type="text" required placeholder="Receiver Name" id="givento" name="givento" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="transactionamount" class="leading-7 text-sm font-medium text-gray-600">Transaction Amount</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" required placeholder="Transaction Amount" id="transactionamount" name="transactionamount" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="transactiondate" class="leading-7 text-sm font-medium text-gray-600">Transaction Date</label>
                                <input type="text" required placeholder="Transaction Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="transactiondate" name="transactiondate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="transactiondesc" class="leading-7 text-sm font-medium text-gray-600">Transaction Description</label>
                                <textarea type="text" maxlength="200" placeholder="Transaction Description" id="transactiondesc" name="transactiondesc" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"></textarea>
                            </div>
                        </div>

                        <div class="p-2 w-full mt-10">
                            <button name="addrecord" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Add Record</button>
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
    $transaction_type           = $_POST['transactiontype'];
    $transaction_date           = $_POST['transactiondate'];
    $transaction_amount         = $_POST['transactionamount'];
    $given_by                   = $_POST['givenby'];
    $given_to                   = $_POST['givento'];
    $transaction_desc           = $_POST['transactiondesc'];
    $created_by                 = $_SESSION['branch_name'];


    $query = "INSERT INTO `amd_transaction_records`(`transaction_type`, `transaction_date`, `transaction_amount`, `given_by`, `given_to`, `transaction_desc`, `created_by`)
     VALUES ('$transaction_type','$transaction_date','$transaction_amount','$given_by','$given_to','$transaction_desc','$created_by')";

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
    <meta http-equiv="refresh" content="0; url = https://www.amazemotordriving.com/amazeadminpanel/index.php" />
<?php
}
?>