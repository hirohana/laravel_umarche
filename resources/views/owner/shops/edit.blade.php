<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          店舗情報編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 mx-auto">
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <form method="POST" enctype="multipart/form-data" action="{{ route('owner.shops.update', ['shop' => $shop->id])}}">
                            @csrf
                            <div class="-m-2">
                              {{-- <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">店名</label>
                                  <input type="text" id="name" name="name" required value="{{ old('name', $shop->name)  }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="information" class="leading-7 text-sm text-gray-600">店舗情報</label>
                                  <input type="text" required id="information" name="information" value="{{ old('information', $shop->information)  }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div> --}}
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="image" class="leading-7 text-sm text-gray-600">店舗写真</label>
                                  <input type="file" accept="image/png, image/jpeg, image/jpg" id="image" name="image"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="flex justify-around p-2 w-full mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.shops.index', ['shop' => $shop->id]) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                  </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
