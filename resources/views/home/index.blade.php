<x-app-layout>
  <x-alerts />

  <div class="mt-4 xl:mt-12 max-w-7xl mx-auto px-4 py-4 sm:p-6 xl:p-8 bg-white text-gray-700 flex ">

    <div class="w-1/5 flex flex-col justify-center">
      <picture class="w-32 h-auto inline-block">
        <img src="{{ asset('images/me.jpg') }}" alt="Simon">
      </picture>
      <p class="mt-4 text-indigo-500">
        Simon Bashir
      </p>
    </div>

    <div class="w-4/5">

      Developed using Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

      <div class="mt-4 xl:mt-8 text:text-xl lg:text-3xl text-indigo-500">
        This is a "demo" project but contains "real" data gathered from various resources. The main focus is on learning Laravel, Vuejs, and Tailwind.
      </div>

      <button class="mt-6 text-center align-middle whitespace-no-wrap select-none cursor-pointer inline-block mb-0 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-lg rounded-r-sm leading-tight px-4 py-2 shadow">
        <a href="https://github.com/halayuba/laravel-vuejs-tailwind-surf">Github</a>
      </button>

    </div>
  </div>
</x-app-layout>
