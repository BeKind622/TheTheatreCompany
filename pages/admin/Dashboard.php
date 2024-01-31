<?php include '../../partials/header.php'; ?>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add styles for small devices view */
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }
            .section-small {
                width: 50%;
            }
        }
    </style>
</head>

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
        <div class="flex-1 flex">
            <!-- Navigation sidebar (hidden on small devices) -->
            <div class="p-2 bg-white w-60 flex flex-col hidden md:flex" id="sideNav">
                <nav>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="<?=BASE_PATH ?>welcome">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white" href="<?=BASE_PATH">
                        <i class="fas fa-file-alt mr-2"></i>Authorizations
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
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>

                <!-- Location indicator -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

                <!-- Copyright at the end of the sidebar -->
                <p class="mb-1 px-5 py-3 text-left text-xs text-cyan-500">Copyright WCSLAT@2023</p>
            </div>

            <!-- Main content area -->
            <div class="flex-1 p-4">
                <!-- Search field -->
                <div class="relative max-w-md w-full">
                    <div class="absolute top-1 left-2 inline-flex items-center p-2">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline" type="search" placeholder="Search...">
                </div>

                <!-- Container for the 4 sections (shrunk for small devices) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
                    <!-- Section 1 - Users Chart (shrunk for small devices) -->
                    <div class="bg-white p-4 rounded-md">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Users</h2>
                        <div class="my1-"></div> <!-- Space separator -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px  mb-6"></div> <!-- Gradient line -->
                        <div class="chart-container" style="position: relative; height:150px; width:100%">
                            <!-- Canvas for the chart -->
                            <canvas id="usersChart"></canvas>
                        </div>
                    </div>

                    <!-- Section 2 - Shops Chart (shrunk for small devices) -->
                    <div class="bg-white p-4 rounded-md">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Shops</h2>
                        <div class="my-1"></div> <!-- Space separator -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Gradient line -->
                        <div class="chart-container" style="position: relative; height:150px; width:100%">
                            <!-- Canvas for the chart -->
                            <canvas id="commercesChart"></canvas>
                        </div>
                    </div>

                    <!-- Section 3 - Pending Authorizations Table (shrunk for small devices) -->
                    <div class="bg-white p-4 rounded-md">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Pending Authorizations</h2>
                        <div class="my-1"></div> <!-- Space separator -->
                        <div class="bg-gradient

-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Gradient line -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Photo</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add more rows here like the above for each pending authorization -->
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40" alt="Profile Photo" class="rounded-full h-10 w-10"></td>
                                    <td class="py-2 px-4 border-b border-grey-light">Juan Pérez</td>
                                    <td class="py-2 px-4 border-b border-grey-light">Shop</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40" alt="Profile Photo" class="rounded-full h-10 w-10"></td>
                                    <td class="py-2 px-4 border-b border-grey-light">María Gómez</td>
                                    <td class="py-2 px-4 border-b border-grey-light">User</td>
                                </tr>
                                <!-- ... -->
                            </tbody>
                        </table>
                        <!-- "See more" button for Pending Authorizations table -->
                        <div class="text-right mt-4">
                            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                See more
                            </button>
                        </div>
                    </div>

                    <!-- Section 4 - Transactions Table (shrunk for small devices) -->
                    <div class="bg-white p-4 rounded-md mt-4">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Transactions</h2>
                        <div class="my-1"></div> <!-- Space separator -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Gradient line -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Date</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add more rows here like the above for each transaction -->
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-4 border-b border-grey-light">Carlos Sánchez</td>
                                    <td class="py-2 px-4 border-b border-grey-light">27/07/2023</td>
                                    <td class="py-2 px-4 border-b border-grey-light text-right">$1500</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-4 border-b border-grey-light">Ana Torres</td>
                                    <td class="py-2 px-4 border-b border-grey-light">28/07/2023</td>
                                    <td class="py-2 px-4 border-b border-grey-light text-right">$2000</td>
                                </tr>
                                <!-- ... -->
                            </tbody>
                        </table>
                        <!-- "See more" button for Transactions table -->
                        <div class="text-right mt-4">
                            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                See more
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
