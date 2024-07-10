<x-admin-layout>
      <!-- strat content -->
      <div class="p-4 sm:ml-64">
          <div class="p-2 rounded-lg mt-10">
              <!-- Breadcrumb -->
              <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                  aria-label="Breadcrumb">
                  <ol class="inline-flex items-center space-x-1 md:space-x-3">
                      <li class="inline-flex items-center">
                          <a href="#"
                              class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                              <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                  fill="currentColor" viewBox="0 0 20 20">
                                  <path
                                      d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                              </svg>
                              Dashboard
                          </a>
                      </li>
                  </ol>
              </nav>
              <div class="w-full mt-2">
                  <div id="gallery" class="relative w-full" data-carousel="slide">
                      <!-- Carousel wrapper -->
                      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                          <!-- Item 1 -->
                          <div class="hidden duration-700 ease-in-out" data-carousel-item>
                              <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                  class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                  alt="">
                          </div>
                          <!-- Item 2 -->
                          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                              <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                  class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                  alt="">
                          </div>
                          <!-- Item 3 -->
                          <div class="hidden duration-700 ease-in-out" data-carousel-item>
                              <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                                  class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                  alt="">
                          </div>
                          <!-- Item 4 -->
                          <div class="hidden duration-700 ease-in-out" data-carousel-item>
                              <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                                  class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                  alt="">
                          </div>
                          <!-- Item 5 -->
                          <div class="hidden duration-700 ease-in-out" data-carousel-item>
                              <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                                  class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                  alt="">
                          </div>
                      </div>
                      <!-- Slider controls -->
                      <button type="button"
                          class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                          data-carousel-prev>
                          <span
                              class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                              <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M5 1 1 5l4 4" />
                              </svg>
                              <span class="sr-only">Previous</span>
                          </span>
                      </button>
                      <button type="button"
                          class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                          data-carousel-next>
                          <span
                              class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                              <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4" />
                              </svg>
                              <span class="sr-only">Next</span>
                          </span>
                      </button>
                  </div>
              </div>
              <div class="md:flex mt-2 w-full gap-2">
                  <div class="w-full md:w-[60%] relative overflow-x-auto">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-6 py-3">
                                      Destinasi
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Like
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      View
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      Apple MacBook Pro 17"
                                  </th>
                                  <td class="px-6 py-4">
                                      Silver
                                  </td>
                                  <td class="px-6 py-4">
                                      Laptop
                                  </td>
                              </tr>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      Microsoft Surface Pro
                                  </th>
                                  <td class="px-6 py-4">
                                      White
                                  </td>
                                  <td class="px-6 py-4">
                                      Laptop PC
                                  </td>
                              </tr>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      Microsoft Surface Pro
                                  </th>
                                  <td class="px-6 py-4">
                                      White
                                  </td>
                                  <td class="px-6 py-4">
                                      Laptop PC
                                  </td>
                              </tr>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      Microsoft Surface Pro
                                  </th>
                                  <td class="px-6 py-4">
                                      White
                                  </td>
                                  <td class="px-6 py-4">
                                      Laptop PC
                                  </td>
                              </tr>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      Microsoft Surface Pro
                                  </th>
                                  <td class="px-6 py-4">
                                      White
                                  </td>
                                  <td class="px-6 py-4">
                                      Laptop PC
                                  </td>
                              </tr>
  
                          </tbody>
                      </table>
                  </div>
                  <div class="mt-2 md:mt-0 w-full md:w-[40%] bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                      <div class="flex justify-between">
                          <div>
                              <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                  32.4k</h5>
                              <p class="text-base font-normal text-gray-500 dark:text-gray-400">Pengunjung
                                  minggu ini</p>
                          </div>
                          <div
                              class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                              12%
                              <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                  viewBox="0 0 10 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                              </svg>
                          </div>
                      </div>
                      <div id="area-chart"></div>
                      <div
                          class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                          <div class="flex justify-between items-center pt-5">
                              <!-- Button -->
                              <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                  data-dropdown-placement="bottom"
                                  class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                  type="button">
                                  Last 7 days
                                  <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                      fill="none" viewBox="0 0 10 6">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 4 4 4-4" />
                                  </svg>
                              </button>
                              <!-- Dropdown menu -->
                              <div id="lastDaysdropdown"
                                  class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                      aria-labelledby="dropdownDefaultButton">
                                      <li>
                                          <a href="#"
                                              class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                              7 days</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                              30 days</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                              90 days</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end content -->
  </x-admin-layout>