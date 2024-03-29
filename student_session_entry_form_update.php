<?php
session_start();
error_reporting(0);
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from amd_student_sessions where id = '$id'";
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
    <title>Update Session Details</title>
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
                    <p class="mb-4 text-md font-medium text-gray-900">Update Session Details</p>
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
                                <label for="car" class="leading-7 text-sm font-medium text-gray-600">Session Car</label>
                                <select id="car" name="car" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Car</option>
                                    <option class="font-medium" value="Amaze" <?php
                                                                                if ($result['session_car'] == "Amaze") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Amaze</option>
                                    <option class="font-medium" value="Swift" <?php
                                                                                if ($result['session_car'] == "Swift") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Swift</option>
                                    <option class="font-medium" value="WagonR" <?php
                                                                                if ($result['session_car'] == "WagonR") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>WagonR</option>
                                    <option class="font-medium" value="eON" <?php
                                                                            if ($result['session_car'] == "eON") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>eON</option>
                                    <option class="font-medium" value="Celerio" <?php
                                                                                if ($result['session_car'] == "Celerio") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Celerio (Automatic)</option>
                                    <option class="font-medium" value="Tiago" <?php
                                                                                if ($result['session_car'] == "Tiago") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Tiago</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="day" class="leading-7 text-sm font-medium text-gray-600">Session Day</label>
                                <select id="day" name="day" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                                    <option class="font-medium" value="" disabled selected>Select Day</option>
                                    <option class="font-medium" value="Day 1" <?php
                                                                                if ($result['session_day'] == "Day 1") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 1</option>
                                    <option class="font-medium" value="Day 2" <?php
                                                                                if ($result['session_day'] == "Day 2") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 2</option>
                                    <option class="font-medium" value="Day 3" <?php
                                                                                if ($result['session_day'] == "Day 3") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 3</option>
                                    <option class="font-medium" value="Day 4" <?php
                                                                                if ($result['session_day'] == "Day 4") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 4</option>
                                    <option class="font-medium" value="Day 5" <?php
                                                                                if ($result['session_day'] == "Day 5") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 5</option>
                                    <option class="font-medium" value="Day 6" <?php
                                                                                if ($result['session_day'] == "Day 6") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 6</option>
                                    <option class="font-medium" value="Day 7" <?php
                                                                                if ($result['session_day'] == "Day 7") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 7</option>
                                    <option class="font-medium" value="Day 8" <?php
                                                                                if ($result['session_day'] == "Day 8") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 8</option>
                                    <option class="font-medium" value="Day 9" <?php
                                                                                if ($result['session_day'] == "Day 9") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 9</option>
                                    <option class="font-medium" value="Day 10" <?php
                                                                                if ($result['session_day'] == "Day 10") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 10</option>
                                    <option class="font-medium" value="Day 11" <?php
                                                                                if ($result['session_day'] == "Day 11") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 11</option>
                                    <option class="font-medium" value="Day 12" <?php
                                                                                if ($result['session_day'] == "Day 12") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 12</option>
                                    <option class="font-medium" value="Day 13" <?php
                                                                                if ($result['session_day'] == "Day 13") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 13</option>
                                    <option class="font-medium" value="Day 14" <?php
                                                                                if ($result['session_day'] == "Day 14") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 14</option>
                                    <option class="font-medium" value="Day 15" <?php
                                                                                if ($result['session_day'] == "Day 15") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 15</option>
                                    <option class="font-medium" value="Day 16" <?php
                                                                                if ($result['session_day'] == "Day 16") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 16</option>
                                    <option class="font-medium" value="Day 17" <?php
                                                                                if ($result['session_day'] == "Day 17") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 17</option>
                                    <option class="font-medium" value="Day 18" <?php
                                                                                if ($result['session_day'] == "Day 18") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 18</option>
                                    <option class="font-medium" value="Day 19" <?php
                                                                                if ($result['session_day'] == "Day 19") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 19</option>
                                    <option class="font-medium" value="Day 20" <?php
                                                                                if ($result['session_day'] == "Day 20") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 20</option>
                                    <option class="font-medium" value="Day 21" <?php
                                                                                if ($result['session_day'] == "Day 21") {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Day 21</option>
                                    <option class="font-medium" value="Extra day" <?php
                                                                                    if ($result['session_day'] == "Extra day") {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>>Extra day</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="fromtime" class="leading-7 text-sm font-medium text-gray-600">From (Time)</label>
                                <input type="text" value="<?= $result['from_time']; ?>" required placeholder="From (Time)" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="fromtime" name="fromtime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="totime" class="leading-7 text-sm font-medium text-gray-600">To (Time)</label>
                                <input type="text" value="<?= $result['to_time']; ?>" required placeholder="To (Time)" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" id="totime" name="totime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="fromkm" class="leading-7 text-sm font-medium text-gray-600">From (Kilometers)</label>
                                <input type="number" value="<?= $result['from_km']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" required placeholder="From (Kilometers)" id="fromkm" name="fromkm" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="tokm" class="leading-7 text-sm font-medium text-gray-600">To (Kilometers)</label>
                                <input type="number" value="<?= $result['to_km']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" required placeholder="To (Kilometers)" id="tokm" name="tokm" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date" class="leading-7 text-sm font-medium text-gray-600">Session Date</label>
                                <input type="text" value="<?= $result['session_date']; ?>" required placeholder="Session Date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors font-medium duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="trainersname" class="leading-7 text-sm font-medium text-gray-600">Trainers Name</label>
                                <input type="text" value="<?= $result['trainers_name'] ?>" maxlength="50" required placeholder="Trainers Name" id="trainersname" name="trainersname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 font-medium ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="trainersinput" class="leading-7 text-sm font-medium text-gray-600">Trainers Input</label>
                                <textarea type="text" maxlength="200" placeholder="Trainers Input" id="trainersinput" name="trainersinput" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors font-medium  duration-200 ease-in-out"><?= $result['trainers_input']; ?></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button name="update" type="submit" class=" flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Update</button>
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

if (isset($_POST['update'])) {
    $driving_session_car   = $_POST['car'];
    $driving_session_day   = $_POST['day'];
    $session_date          = $_POST['date'];
    $from_time             = $_POST['fromtime'];
    $to_time               = $_POST['totime'];
    $from_km               = $_POST['fromkm'];
    $to_km                 = $_POST['tokm'];
    $trainers_name         = $_POST['trainersname'];
    $trainers_input        = $_POST['trainersinput'];
    $student_id            = $_GET['id'];
    $created_by            = $_SESSION['branch_name'];


    $query = "UPDATE `amd_student_sessions` SET `session_car`='$driving_session_car',`session_day`='$driving_session_day',`session_date`='$session_date',`from_time`='$from_time',`to_time`='$to_time',`from_km`='$from_km',`to_km`='$to_km',`trainers_name`='$trainers_name',`trainers_input`='$trainers_input' WHERE id = $id";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'success',
                title: 'Session details updated successfully!!',
                text: 'Session details has been updated successfuly',
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