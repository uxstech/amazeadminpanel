<?php
session_start();
error_reporting(0);
include("db_connection.php");
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_fuel_consumption_records WHERE id = '$id'";
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
                                <label for="selectedcar" class="leading-7 text-sm font-medium text-gray-600">Select Car</label>
                                <select id="selectedcar" name="selectedcar" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Car</option>
                                    <option class="font-medium" value="Amaze" <?php
                                                                                if ($result['car'] == "Amaze") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Amaze</option>
                                    <option class="font-medium" value="Swift" <?php
                                                                                if ($result['car'] == "Swift") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Swift</option>
                                    <option class="font-medium" value="WagonR" <?php
                                                                                if ($result['car'] == "WagonR") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>WagonR</option>
                                    <option class="font-medium" value="eON" <?php
                                                                            if ($result['car'] == "eON") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>eON</option>
                                    <option class="font-medium" value="Celerio" <?php
                                                                                if ($result['car'] == "Celerio") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Celerio (Automatic)</option>
                                    <option class="font-medium" value="Tiago" <?php
                                                                                if ($result['car'] == "Tiago") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Tiago</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="selectfueltype" class="leading-7 text-sm font-medium text-gray-600">Select Fuel Type</label>
                                <select id="selectfueltype" name="selectfueltype" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Fuel Type</option>
                                    <option class="font-medium" value="Petrol" <?php
                                                                                if ($result['fuel_type'] == "Petrol") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Petrol</option>
                                    <option class="font-medium" value="Diesel" <?php
                                                                                if ($result['fuel_type'] == "Diesel") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Diesel</option>
                                    <option class="font-medium" value="CNG" <?php
                                                                            if ($result['fuel_type'] == "CNG") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>CNG</option>
                                    <option class="font-medium" value="kWh" <?php
                                                                            if ($result['fuel_type'] == "kWh") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>kWh</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="fuelfilled" class="leading-7 text-sm font-medium text-gray-600">Fuel Filled (In Liters/Kg)</label>
                                <input type="number" value="<?= $result['filled_fuel_in_ltr_or_kg']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required placeholder="Fuel Filled (In Liters/Kg)" id="fuelfilled" name="fuelfilled" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="amount" class="leading-7 text-sm font-medium text-gray-600">Amount Paid At Fuel Station</label>
                                <input type="number" value="<?= $result['amount']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" required placeholder="Amount Paid At Fuel Station" id="amount" name="amount" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="ondate" class="leading-7 text-sm font-medium text-gray-600">On Date</label>
                                <input type="text" value="<?= $result['on_date']; ?>" required placeholder="On Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="ondate" name="ondate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="beforefueling" class="leading-7 text-sm font-medium text-gray-600">Meter Reading Before Filling Fuel</label>
                                <input type="number" value="<?= $result['meter_before']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required placeholder="Range in kilometers" id="beforefueling" name="beforefueling" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="afterfueling" class="leading-7 text-sm font-medium text-gray-600">Meter Reading After Filling Fuel</label>
                                <input type="number" value="<?= $result['meter_after']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required placeholder="Range in kilometers" id="afterfueling" name="afterfueling" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="fuelfilledby" class="leading-7 text-sm font-medium text-gray-600">Fuel Filled By</label>
                                <input type="text" value="<?= $result['fueled_by_coach']; ?>" maxlength="50" required placeholder="Coach Name" id="fuelfilledby" name="fuelfilledby" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
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
    $selected_car               = $_POST['selectedcar'];
    $fuel_type                  = $_POST['selectfueltype'];
    $fuel_filled_in_ltr_or_kg   = $_POST['fuelfilled'];
    $amount_paid                = $_POST['amount'];
    $on_date                    = $_POST['ondate'];
    $meter_reading_before       = $_POST['beforefueling'];
    $meter_reading_after        = $_POST['afterfueling'];
    $fuel_filled_by             = $_POST['fuelfilledby'];
    $created_by                 = $_SESSION['branch_name'];


    $query = "UPDATE `amd_fuel_consumption_records` SET `car`='$selected_car',`fuel_type`='$fuel_type',`filled_fuel_in_ltr_or_kg`='$fuel_filled_in_ltr_or_kg',`amount`='$amount_paid',`on_date`='$on_date',`meter_before`='$meter_reading_before',`meter_after`='$meter_reading_after',`fueled_by_coach`='$fuel_filled_by' WHERE id = $id";

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
    <meta http-equiv="refresh" content="0; url = http://localhost/amazeadminpanel/index.php" />
<?php
}
?>