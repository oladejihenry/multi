@extends('tenant-auth')
@section('body')


<!-- BEGIN: Registration Form -->
<form class="space-y-4" action='#'>
    <div class="fromGroup">
        <label class="block capitalize form-label">Name</label>
        <div class="relative ">
            <input type="text" name="name" class="  form-control py-2" placeholder="Enter your name">
        </div>
    </div>
    <div class="fromGroup">
        <label class="block capitalize form-label">email</label>
        <div class="relative ">
            <input type="email" name="email" class="  form-control py-2" placeholder="Enter your email">
        </div>
    </div>
    <div class="fromGroup">
        <label class="block capitalize form-label  ">passwrod</label>
        <div class="relative ">
            <input type="password" name="password" class="  form-control py-2   " placeholder="Enter your password">
        </div>
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
           
@endsection