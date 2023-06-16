<header class="font-poppins">
    <nav class="bg-white border-dark shadow px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            {{-- Title --}}
            <a href="/" class="flex items-center">
                <span class="self-center text-xl font-bold whitespace-nowrap">dekorasi.id</span>
            </a>
            <div class="flex items-center lg:order-2">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="relative group">
                        <a href="#" class="nav-link dropdown-toggle flex justify-between items-center font-semibold" role="button" aria-haspopup="true">
                        Welcome back, <span class="ml-1 text-red-500">{{ auth()->user()->name }}</span>
                        {{-- Drop Arrow Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ml-1">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                        </a>
                        <ul class="absolute z-10 hidden mt-1 bg-white shadow-md rounded-sm py-2">
                            <li>
                                <a href="/account" class="dropdown-item flex items-center px-4 py-2 text-dark hover:bg-dark hover:text-white">
                                {{-- Account Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                                <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg> Account</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item flex items-center px-4 py-2 text-dark hover:bg-dark hover:text-white">
                                    {{-- Logout Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z" clip-rule="evenodd" />
                                    </svg>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item text-white font-bold rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none bg-dark">
                      <a href="/login" class="nav-link {{ ($active === "login") ? 'active': '' }}">Login</a>
                    </li>
                    @endauth
                </ul>
                {{-- Hamburger Menu --}}
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-dark rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            
            <div class="hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-5 lg:mt-0">
                    <li>
                        <a href="/" class="font-semibold block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-200 lg:hover:bg-transparent lg:border-0 lg:p-0 hover:bg-dark hover:text-white">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="font-semibold block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-200 lg:hover:bg-transparent lg:border-0 lg:p-0 hover:bg-dark hover:text-white">About</a>
                    </li>
                    <li>
                        <a href="/products" class="font-semibold block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-200 lg:hover:bg-transparent lg:border-0 lg:p-0 hover:bg-dark hover:text-white">Products</a>
                    </li>
                    <li>
                        <a href="/categories" class="font-semibold block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-200 lg:hover:bg-transparent lg:border-0 lg:p-0 hover:bg-dark hover:text-white ">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

{{-- Script Navbar --}}
<script>
    // Mengambil semua elemen dengan kelas "group"
    const dropdowns = document.querySelectorAll('.group');
  
    // Menambahkan event listener untuk setiap elemen dropdown
    dropdowns.forEach((dropdown) => {
      // Mengambil elemen anak pertama sebagai toggle
      const toggle = dropdown.children[0];
  
      // Menambahkan event listener saat toggle di klik
      toggle.addEventListener('click', () => {
        // Toggle class "hidden" pada elemen dropdown
        dropdown.children[1].classList.toggle('hidden');
      });
  
      // Menambahkan event listener saat mengklik di luar dropdown
      document.addEventListener('click', (event) => {
        // Mengecek apakah elemen yang diklik berada di dalam dropdown atau tidak
        if (!dropdown.contains(event.target)) {
          // Menyembunyikan dropdown jika diklik di luar dropdown
          dropdown.children[1].classList.add('hidden');
        }
      });
    });
</script>
