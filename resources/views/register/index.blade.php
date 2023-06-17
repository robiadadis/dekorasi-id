@extends('layouts.main')

@section('container')
<section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Register your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="post">
                    @csrf
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your name</label>
                        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Name" autofocus required value="{{ old ('email') }}">
                    </div>
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@example.com" autofocus required value="{{ old ('email') }}">
                    </div>
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>
                    
                    <div class="w-full bg-dark text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <button type="submit" class="w-full">Register</button>
                    </div>
                    
                    <p class="text-sm font-light text-gray-500 text-center">
                        Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline">Log in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection