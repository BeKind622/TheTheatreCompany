<?php
// session_start();
include '../../config/config.php';
include '../../partials/Header.php';


$users = $conn->prepare('SELECT 
        u.id,
        u.username,
        u.email,
        u.active,
        u.is_admin

       FROM users u

       where u.is_admin = 0

       
      ');
$users->execute();
$users->store_result();
$users->bind_result($userId, $userName, $userEmail, $userActive, $admin);
?>



<body>
    <div class="flex flex-col h-screen bg-gray-100">

        <!-- Top navigation bar -->
        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:flex items-center"> <!-- Hidden on small devices -->
                    <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
                    <h2 class="font-bold text-xl">Application Name</h2>
                </div>
                <div class="md:hidden flex items-center"> <!-- Shown only on small devices -->
                    <button id="menuBtn">
                        <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Menu icon -->
                    </button>
                </div>
            </div>

            <!-- Notification and Profile icons -->
            <div class="space-x-5">
                <button>
                    <i class="fas fa-bell text-gray-500 text-lg"></i>
                </button>
                <!-- Profile button -->
                <button>
                    <i class="fas fa-user text-gray-500 text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex">
            <!-- Navigation sidebar (hidden on small devices) -->
            <div class="p-2 bg-white w-60 flex flex-col hidden md:flex" id="sideNav">
                <nav>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="<?= BASE_PATH ?>welcome">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="<?= BASE_PATH ?>pending " <i class="fas fa-file-alt mr-2"></i>Pending
                    </a>
                    <!-- <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="#">
                        <i class="fas fa-users mr-2"></i>Users
                    </a> -->
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="#">
                        <i class="fas fa-store mr-2"></i>Shops
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="#">
                        <i class="fas fa-exchange-alt mr-2"></i>Transactions
                    </a>
                </nav>

                <!-- Logout item -->
                <a class="block text-gray-500 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white mt-auto" href="<?= BASE_PATH ?>logout">Logout</a>
                <!-- <i class="fas fa-sign-out-alt mr-2"></i>Logout -->
                </a>

                <!-- Location indicator -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

                <!-- Copyright at the end of the sidebar -->
                <p class="mb-1 px-5 py-3 text-left text-xs text-cyan-500">Copyright WCSLAT@2023</p>
            </div>

            <!-- Main content area -->
            <!--Card-->
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white grow">
                <button onclick="window.location.href='./pages/addUser.php';" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">ADD USER</button>


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">ID</th>
                            <th data-priority="2">Username</th>
                            <th data-priority="3">email</th>
                            <th data-priority="4">Status</th>
                            <th data-priority="6">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($users->fetch()) : ?>
                            <tr>
                                <td><?= $userId ?></td>
                                <td><?= $userName ?></td>
                                <td><?= $userEmail ?></td>
                                <td>
                                    <?php if ($userActive == 1) : ?>
                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                            Active
                                        </span>
                                    <?php else : ?>

                                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                            Inactive
                                        </span>
                                    <?php endif ?>
                                </td>

                                <td>
                                    <div class="flex justify-end gap-4">
                                        <a class="delete-id" href="#" onclick="window.location.href='./config/deleteUser/<?= $userId ?>'">
                                            <button x-data="{ tooltip: 'Delete' }" class="delete-btn">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </a>
                                        <button>
                                            <a x-data="{ tooltip: 'Edite' }" onclick="window.location.href='editUser/<?= $userId ?>';">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            </buttn>
                                            <?php if ($userActive == 1) : ?>
                                                <button onclick="window.location.href='deactivateUser/<?= $userId ?>';">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                    </svg>
                                                </button>
                                            <?php elseif ($userActive == 0) : ?>
                                                <button onclick="window.location.href='activateUser/<?= $userId ?>';">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />

                                                    </svg>
                                                </button>
                                            <?php endif ?>


                                    </div>
                                </td>

                            </tr>

                        <?php endwhile ?>
                    </tbody>

                </table>


            </div>
            <!--/Card-->


        </div>
        <!--/container-->





        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>

        <script>
            /*
could also send it to a differnet page that looks like a popup redirects back if cancel is clicked delete will run a script

*/





            // function showDeleteModal(user_id) {
            //   // Get the delete modal element
            //   var modal = document.getElementById("delete_modal");

            //   // Update the modal with the user ID
            //   modal.querySelector(".modal-user-id").innerHTML = user_id;

            //   // Show the modal
            //   modal.style.display = "block";
            // }


            // const deleteBtn = document.querySelectorAll('.delete-btn');
            // const deleteModal = document.getElementById('delete_modal');
            // const cancel = document.querySelector('.cancel');

            // const deleteBtn = document.querySelectorAll('.delete-btn').forEach(item => {
            //   item.addEventListener('click', event => {
            //     handle click 
            //     deleteModal.classList.add('delete-show');

            //   })

            // })
            // cancel.addEventListener('click', function() {
            //     deleteModal.classList.remove('delete-show');
            //   });
        </script>
        <?php include '../../partials/Footer.php'; ?>
    </div>
    </div>

    <!-- Script for the charts -->
    <script>
        // Users Chart
        var usersChart = new Chart(document.getElementById('usersChart'), {
            type: 'doughnut',
            data: {
                labels: ['New', 'Registered'],
                datasets: [{
                    data: [30, 65],
                    backgroundColor: ['#00F0FF', '#8B8B8D'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Place legend below the circle
                }
            }
        });

        // Shops Chart
        var commercesChart = new Chart(document.getElementById('commercesChart'), {
            type: 'doughnut',
            data: {
                labels: ['New', 'Registered'],
                datasets: [{
                    data: [60, 40],
                    backgroundColor: ['#FEC500', '#8B8B8D'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Place legend below the circle
                }
            }
        });

        // Add logic to show/hide the sidebar when clicking the menu icon
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle('hidden'); // Add or remove the 'hidden' class to show or hide the sidebar
        });
    </script>
</body>

</html>