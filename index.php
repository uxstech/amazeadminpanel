<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="">

    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="EXPIRES" CONTENT=0>
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
    <section class="h-full gradient-form  md:h-screen flex justify-center">
        <div class="container py-12 px-6 h-full">
            <div id="main" class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".4" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                    <defs>
                        <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFFF00"></stop>
                            <stop offset="1" stop-color="#FFFF00"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">
                                    <div class="text-center">
                                        <img class="mx-auto w-40 mb-12" src="assets/amazenewlogo.svg" alt="logo" />
                                    </div>
                                    <form action="#" method="POST">
                                        <p class="mb-4 font-medium">Admin please log into your account</p>
                                        <form>
                                            <div class="mb-4">
                                                <input type="text" name="username" class="form-control block w-full px-3 py-1.5 text-base font-medium text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Username" required />
                                            </div>
                                            <div class="mb-4">
                                                <input type="password" name="password" class="form-control block w-full px-3 py-1.5 text-base font-medium text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Password" required />
                                            </div>
                                            <div class="text-center pt-1 mb-12 pb-1">
                                                <button name="login" class="inline-block px-6 py-2.5 text-white font-medium text-md leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3" type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" style="
                        background: linear-gradient(
                          to right,
                          #ffbf00,
                          #ffbf00,
                          #ffbf00,
                          #ffbf00
                        );">Login
                                                </button>
                                            </div>
                                        </form>
                                    </form>
                                </div>
                            </div>
                            <div class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none" style="
                background: linear-gradient(to right, #ffbf00, #f8cc47, #f8cc47, #f8cc47);
              ">
                                <div class="text-black px-4 py-6 md:p-12 md:mx-6">
                                    <h4 class="text-2xl font-bold mb-6">Admin Panel</h4>
                                    <p class="text-sm text-gray-800 font-medium">
                                        An admin panel enables administrators of an application, website, or IT system
                                        to manage its configurations, settings,
                                        content, and features and carry out oversight functions critical to the
                                        business. It allows them to view the state of
                                        the platform and take any action in the performance of their duties
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center text-sm lg:text-left">
                <div class="text-gray-500 font-medium text-center p-2">
                    © 2023 Copyright: Amaze motor driving school, panel designed & developed by uxstechnologies
                </div>
            </footer>
        </div>
    </section>
    <script src="" async defer></script>
</body>

</html>

<?php
include("db_connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM amd_admin_users WHERE username = '$username' AND password = '$password'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    $row = mysqli_fetch_assoc($data);
    if ($total == 1) {
        $_SESSION['user_name'] = $username;
        $_SESSION['branch_name'] = $row["branch_name"];
        $_SESSION['role'] = $row["role"];
?>
        <meta http-equiv="refresh" content="0; url = http://localhost/amazeadminpanel/dashboard.php" />
<?php
    } else {
        echo "<script type='text/javascript'>Swal.fire({
                icon: 'error',
                title: 'Invalid Credentials',
                text: 'Please try logging in again using correct credentials or contact admin',
                });</script>";
    }
}
?>