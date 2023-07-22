@extends('tenant-auth')
@section('body')


<!-- BEGIN: Registration Form -->
<form class="space-y-4" action='{{ route('tenantRegister') }}' method="POST">
    @csrf
    <div class="fromGroup">
        <label class="block capitalize form-label">Username</label>
        <div class="relative ">
            <input type="text" name="username" class="  form-control py-2" placeholder="Enter your username">
        </div>
        @error('username')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="fromGroup">
        <label class="block capitalize form-label">email</label>
        <div class="relative ">
            <input type="email" name="email" class="  form-control py-2" placeholder="Enter your email">
        </div>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="fromGroup">
        <label class="block capitalize form-label  ">password</label>
        <div class="relative ">
            <input type="password" name="password" class="  form-control py-2   " placeholder="Enter your password">
        </div>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    {{-- <div>
        <label class="block capitalize form-label">confirm password</label>
        <div class="relative">
            <x-text-input id="password_confirmation" class="form-control py-2"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
        </div>
    </div> --}}
    <div class="fromGroup ">
        <label class="block capitalize form-label  ">choose a subdomain</label>
        <div class="flex flex-row-reverse flex-shrink-0">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600 flex-shrink-0">

               .{{ Str:: replace(['http://', 'https://'], '', config('tenancy.central_domains')[0]) }} 
            </span>
            <input type="text" name="domain" id="website-admin"
                class="pt-2 rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Subdomain" value="{{ old('domain') }}">
        </div>
        @error('domain')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-between">
        <label class="flex items-center cursor-pointer">
            <input type="checkbox" class="hiddens">
            <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">You accept our Terms and Conditions and
        Privacy Policy</span>
        </label>
    </div>
    <button class="btn btn-dark block w-full text-center">Create an account</button>
</form>
<!-- END: Registration Form -->

<div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
    <div class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                        px-4 min-w-max text-sm text-slate-500 font-normal">
    Or continue with
    </div>
</div>
<div class="max-w-[242px] mx-auto mt-8 w-full">

    <!-- BEGIN: Social Log in Area -->
    <ul class="flex">
    <li class="flex-1">
        <a href="#" class="inline-flex h-10 w-10 bg-[#1C9CEB] text-white text-2xl flex-col items-center justify-center rounded-full">
        <img src="{{ asset('tenant/dashboard-asset/assets/images/icon/tw.svg')}}" alt="">
        </a>
    </li>
    <li class="flex-1">
        <a href="#" class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
        <img src="{{ asset('tenant/dashboard-asset/assets/images/icon/fb.svg')}}" alt="">
        </a>
    </li>
    <li class="flex-1">
        <a href="#" class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
        <img src="{{ asset('tenant/dashboard-asset/assets/images/icon/in.svg')}}" alt="">
        </a>
    </li>
    <li class="flex-1">
        <a href="#" class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
        <img src="{{ asset('tenant/dashboard-asset/assets/images/icon/gp.svg')}}" alt="">
        </a>
    </li>
    </ul>
    <!-- END: Social Log In Area -->
</div>
            <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm">
              <span>ALREADY REGISTERED?
                            </span>
              <a href="signin-one.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                Sign In
              </a>
            </div>
          </div>
          <div class="auth-footer text-center">
            Copyright 2021, Dashcode All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </div>
           
@endsection