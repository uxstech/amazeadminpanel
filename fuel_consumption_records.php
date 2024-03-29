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
    <title>Fuel Consumption Records</title>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
</head>

<!-- <script>
    history.pushState(null, document.title, location.href);
    history.back();
    history.forward();
    window.onpopstate = function() {
        history.go(1);
    };
</script> -->

<body>
    <section class="text-gray-600 body-font">
        <div class="container px-12 mt-12 mb-12 mx-auto">

            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <p class="mb-4 text-md font-medium text-gray-900">Fuel Consumption Records</p>
                    <div class="h-1 w-48 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full font-medium text-sm leading-relaxed text-gray-900"> An admin panel enables administrators of an application, website, or IT system
                    to manage its configurations, settings,
                    content, and features and carry out oversight functions critical to the
                    business.</p>
            </div>

            <form action="" method="GET">
                <div class="flex items-center justify-start ">
                    <div class="flex border-4 border-gray-200 rounded">
                        <input type="text" required name="search" value="<?php if (isset($_GET['search'])) {
                                                                                echo $_GET['search'];
                                                                            } ?>" class="px-4 py-2 w-80 font-medium" placeholder="Search Entry">
                        <button class="px-4 text-white hover:bg-gray-500 bg-gray-700">
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <div class="flex items-center justify-end -mt-14 mb-4">
                <form action="fuel_consumption_excel.php" method="POST">
                    <div class="py-2 flex items-center justify-start ">
                        <div class="flex">
                            <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="fromdate" value="<?php if (isset($_POST['fromdate'])) {
                                                                                                                                                            echo $_POST['fromdate'];
                                                                                                                                                        } ?>" class="px-4 py-2 w-40 mr-2 font-medium border-2 border-gray-200 rounded" placeholder="From Date">
                            <input type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" name="todate" value="<?php if (isset($_POST['todate'])) {
                                                                                                                                                        echo $_POST['todate'];
                                                                                                                                                    } ?>" class="px-4 py-2 w-40 font-medium border-2 border-gray-200 rounded" placeholder="To Date">
                            <button type="submit" class="px-8 font-medium mr-2 text-sm text-white rounded ml-4 hover:bg-green-900 bg-green-800">
                                Export XLS
                            </button>
                        </div>
                    </div>
                </form>
                <a href="fuel_consumption_form.php"><button name="addentryfuelconsumption" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm">Add Entry</button></a>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="table-fixed min-w-full">
                                <thead class="bg-white border-b">
                                    <tr class="bg-gray-700">
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Sr.No
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Car
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Fuel Type
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Litre / Kg / kWh
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Amount
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Date
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Meter Reading Before
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Meter Reading After
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Fuel Filled By
                                        </th>
                                        <th scope="col" class="border text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    error_reporting(0);
                                    include("db_connection.php");
                                    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                        $page_no = $_GET['page_no'];
                                    } else {
                                        $page_no = 1;
                                    }

                                    $total_records_per_page = 20;
                                    $offset = ($page_no - 1) * $total_records_per_page;
                                    $previous_page = $page_no - 1;
                                    $next_page = $page_no + 1;
                                    $adjacents = "2";

                                    $result_count = mysqli_query($conn, "SELECT COUNT(*) AS total_records FROM amd_fuel_consumption_records");
                                    $total_records = mysqli_fetch_array($result_count);
                                    $total_records = $total_records['total_records'];
                                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                    $second_last = $total_no_of_pages - 1;

                                    $branchName = $_SESSION['branch_name'];

                                    if (isset($_GET['search'])) {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM amd_fuel_consumption_records  WHERE car like '%" . $filtervalues . "%' AND created_by ='" . $branchName . "' ORDER BY id DESC";
                                    } else {
                                        $query = "SELECT * FROM amd_fuel_consumption_records  WHERE created_by ='" . $branchName . "' ORDER BY id DESC LIMIT " . $offset . "," . $total_records_per_page . "";
                                    }

                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        $index = 0;
                                        foreach ($query_run as $row) {
                                            $index++;
                                    ?>
                                            <tr class="border-b transition 
                                        <?php if ($index % 2 == 0) { ?>
                                        bg-gray-50
                                        <?php
                                            } ?> duration-300 ease-in-out hover:bg-gray-200">
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500"><?= $offset + $index ?></td>

                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row['car']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row['fuel_type']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row['filled_fuel_in_ltr_or_kg']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= "₹ " . number_format($row['amount']); ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= date("d M Y", strtotime($row['on_date'])); ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= number_format($row['meter_before']) . " Km"; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= number_format($row['meter_after']) . " Km"; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <?= $row['fueled_by_coach']; ?>
                                                </td>
                                                <td class="border text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                                    <a href="fuel_consumption_form_update.php?id=<?php echo $row['id'] ?>" class="font-medium px-1 text-white bg-blue-300 rounded px-3 py-1 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">No records found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if (!isset($_GET['search'])) {
                        ?>
                            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium"><?php echo $page_no ?></span>
                                            of
                                            <span class="font-medium"><?php echo $total_no_of_pages ?> </span>
                                            results
                                        </p>
                                    </div>

                                    <div>
                                        <ul class="inline-flex -space-x-px">
                                            <li <?php if ($page_no < 1) {
                                                    echo "class-disabled";
                                                } ?>>
                                                <?php if ($page_no != 1) {
                                                    echo "<li><a class='relative inline-flex px-4 items-center rounded-l-md border border-gray-300 bg-white py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20' href='?page_no=1'>First</a></li>";
                                                } ?>
                                                <a <?php if ($page_no > 1) {
                                                        echo "class='relative inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20' href = '?page_no=" . $previous_page . "'";
                                                    } ?>><?php if ($page_no > 1) {
                                                                echo "Previous";
                                                            } ?></a>
                                            </li>
                                            <?php
                                            if ($total_no_of_pages <= 10) {
                                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                                    if ($counter == $page_no) {
                                                        echo "<li class='active'><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>" . $counter . "</a></li>";
                                                    }
                                                }
                                            } elseif ($total_no_of_pages > 10) {
                                                if ($page_no <= 4) {
                                                    for ($counter = 1; $counter < 8; $counter++) {
                                                        if ($counter == $page_no) {
                                                            echo "<li class = 'active'><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>" . $counter . "</a></li>";
                                                        } else {
                                                            echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href='?page_no=" . $counter . "'>" . $counter . "</a></li>";
                                                        }
                                                    }
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>...</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=" . $second_last . "'>" . $second_last . "</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=" . $total_no_of_pages . "'>" . $total_no_of_pages . "</a></li>";
                                                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=1'>1</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=2'>2</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>...</a></li>";
                                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                                        if ($counter == $page_no) {
                                                            echo "<li class = 'active'><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>" . $counter . "</a></li>";
                                                        } else {
                                                            echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href='?page_no=" . $counter . "'>" . $counter . "</a></li>";
                                                        }
                                                    }
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>...</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=" . $second_last . "'>" . $second_last . "</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=" . $total_no_of_pages . "'>" . $total_no_of_pages . "</a></li>";
                                                } else {
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=1'>1</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=2'>2</a></li>";
                                                    echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>...</a></li>";
                                                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                        if ($counter == $page_no) {
                                                            echo "<li class = 'active'><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex'>" . $counter . "</a></li>";
                                                        } else {
                                                            echo "<li><a class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href='?page_no=" . $counter . "'>" . $counter . "</a></li>";
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <li <?php if ($page_no >= $total_no_of_pages) {
                                                    echo "class-'disabled'";
                                                } ?>>
                                                <a <?php if ($page_no < $total_no_of_pages) {
                                                        echo "class='relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex' href = '?page_no=" . $next_page . "'";
                                                    } ?>><?php if ($page_no < $total_no_of_pages) {
                                                                echo "Next";
                                                            } ?></a>
                                            </li>
                                            <?php if ($page_no < $total_no_of_pages) {
                                                echo "<li><a class='relative inline-flex px-4 items-center rounded-r-md border border-gray-300 bg-white py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20' href='?page_no=" . $total_no_of_pages . "'>Last</a></li>";
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <button name="ok" class="mt-12 flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 font-medium rounded text-sm" onclick="history.back()">Ok</button>
                        <?php
                        }
                        ?>
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