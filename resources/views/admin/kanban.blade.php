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
                  <div class="flex w-full relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Kanban
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Lorem ipsum dolor sit.
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="#" alt="">
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
              </div>
          </div>
      </div>
      <!-- end content -->
  </x-admin-layout>