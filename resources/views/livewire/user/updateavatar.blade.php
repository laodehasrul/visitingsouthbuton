<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity">
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <div class="bg-gray-50 dark:bg-gray-800 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full"
              role="dialog" aria-modal="true" aria-labelledby="modal-headline">
              <div class="flex justify-end mr-2.5 mt-2.5">
                  <button type="button" wire:click="closeModal">
                      <svg class="w-6 h-6 text-red-500 hover:text-red-600 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path
                              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                      </svg>
                  </button>
              </div>
              <form>
                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                      <div class="">
                          <div class="mb-5 mx-auto">
                              @if ($newavatar)
                              <div class="flex mx-auto">
                                  <img class="mx-auto shadow-md rounded-full w-[80px] h-[80px]"
                                      src="{{ $newavatar->temporaryUrl() }}" alt="">
                              </div>
                              @else
                              <div class="flex mx-auto">
                                  <img class="mx-auto shadow-md rounded-full w-[80px] h-[80px]"
                                      src="{{ auth()->user()->avatarUrl() }}" alt="">
                              </div>
                              @endif
                          </div>
                          <div class="w-1/2 mx-auto">
                              <x-filepond wire:model="newavatar" allowImagePreview imagePreviewMaxHeight="200"
                                  allowFileTypeValidation
                                  acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                                  allowFileSizeValidation maxFileSize="4mb" />
                          </div>
                      </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center space-x-3">
                      <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button type="button" wire:click="closeModal"
                              class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded-lg shadow-md group">
                              <span
                                  class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-red-500 group-hover:translate-y-0 ease">
                                  <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                      viewBox="0 0 14 14">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                  </svg>
                              </span>
                              <span
                                  class="absolute flex items-center justify-center w-full h-full text-red-500 transition-all duration-300 transform group-hover:translate-y-full ease">Batal</span>
                              <span class="relative invisible">Batal</span>
                          </button>
                      </span>
                      <span class="flex rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button wire:click.prevent="changeAvatar()" type="button"
                              class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                              <span
                                  class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                  </svg>
                              </span>
                              <span
                                  class="absolute flex items-center justify-center w-full h-full text-teal-500 transition-all duration-300 transform group-hover:translate-y-full ease">Simpan</span>
                              <span class="relative invisible">Simpan</span>
                          </button>
                      </span>
                  </div>
              </form>
          </div>
      </div>
  </div>