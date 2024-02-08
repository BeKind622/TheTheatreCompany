<?php
session_start();
// college
define('BASE_PATH', 'http://localhost/TheTheatreCompany/');
// home
// define('BASE_PATH', 'http://localhost:8040/my_clyde_dev/');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Theatre Company</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <!-- component -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <div>
    <div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
      <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
          <div class="flex flex-row items-center justify-between p-4">
            <a href="<?= BASE_PATH ?>/index.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">The Theatre Company</a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>



          <nav class="z-0 relative" x-data="{open:false,menu:false, lokasi:false}">
            <div class="relative z-10 bg-black shadow">
              <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                  <div class="flex items-center px-2 lg:px-0">
                    <a class="flex-shrink-0" href="<?= BASE_PATH?>">
                      <img class="block lg:hidden h-12 w-16" src="<?= BASE_PATH?>assets/images/theatre.png" alt="Logo">
                      <img class="hidden lg:block h-12 w-auto" src="<?= BASE_PATH?>assets/images/theatre.png" alt="Logo">
                    </a>
                    <div class="hidden lg:block lg:ml-2">
                      <div class="flex">
                        <?php if (!isset($_SESSION['loggedin'])) : ?>
                          <a href="<?= BASE_PATH?>" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium transition duration-150 ease-in-out cursor-pointer focus:outline-none text-white focus:text-white  hover:bg-purple-900">Clyde Theatre </a>
                          <a href="<?= BASE_PATH?>blogs" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Blogs </a>
                          <a href="<?= BASE_PATH?>login" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Login </a>
                          <a href="<?= BASE_PATH?>register" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Register </a>
                        <?php else : ?>
                          <a href="<?= BASE_PATH?>" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Home </a>
                          <a href="<?= BASE_PATH?>blogs" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Blog </a>
                          <?php if ($_SESSION['is_admin'] == 1) : ?>
                            <a href="<?= BASE_PATH?>a/pendingComments" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Pending Reviews </a>
                            <a href="<?= BASE_PATH?>a/allUsers" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Users </a>
                          <?php elseif ($_SESSION['is_admin'] == 0) : ?>
                            <a href="<?= BASE_PATH?>u/comments" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> My reviews </a>

                            <a href="<?= BASE_PATH?>u/dashboard" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Dashboard </a>
                            <a href="<?= BASE_PATH?>u/account" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Account </a>
                          <?php endif ?>
                          <a href="<?= BASE_PATH?>account/auth/logout.php" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-white hover:bg-purple-900 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Logout </a>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                  <div class="flex-1 flex justify-center px-2 lg:ml-6 lg:justify-end">
                    <div class="max-w-lg w-full lg:max-w-xs">
                      <label for="search" class="sr-only">Search </label>
                      <form methode="get" action="#" class="relative z-50">
                        <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                          </svg>
                        </button>
                        <input type="text" name="s" id="s" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-purple-900 text-white placeholder-white focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="Search">
                      </form>
                    </div>
                  </div>
                  <div class="flex lg:hidden">
                    <button @click="menu=!menu" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
                      <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                      </svg>
                      <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div x-show="menu" class="block md:hidden">
                <div class="px-2 pt-2 pb-3">
                  <?php if (!isset($_SESSION['loggedin'])) : ?>
                    <a href="<?= BASE_PATH?>blog/" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Blogs </a>
                    <a href="<?= BASE_PATH?>login/" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Login </a>
                    <a href="<?= BASE_PATH?>register/" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Register </a>
                  <?php else : ?>
                    <a href="<?= BASE_PATH?>" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Home </a>
                    <a href="<?= BASE_PATH?>blog/" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Blog </a>
                    <?php if ($_SESSION['is_admin'] == 1) : ?>
                      <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Pending Reviews </a>
                      <a href="<?= AUTH_DIR ?>pages/user.php" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Users </a>
                    <?php elseif ($_SESSION['is_admin'] == 0) : ?>
                      <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> My reviews </a>
                      <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> My account </a>
                    <?php endif ?>
                    <a href="<?= BASE_PATH?>account/auth/logout.php" class="ml-4 px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-800 hover:bg-yellow-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> Logout </a>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </nav>







        </div>
      </div>
    </div>
  </div>
  </nav>
  </div>
  </div>
  </div>
  </div>