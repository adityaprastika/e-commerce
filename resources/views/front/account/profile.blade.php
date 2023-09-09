@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                <li class="breadcrumb-item">Settings</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-11 ">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3">
                @include('front.account.common.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                    </div>
                    <div class="card-body p-4">
                        @if ($profiles->isNotEmpty())
                            @foreach ($profiles as $profile)
                                <div class="row">
                            <div class="mb-3">
                                <label for="name">First Name</label>
                                <input readonly type="text" name="name" id="name" class="form-control" value="{{ $profile->first_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="name">Last Name</label>
                                <input readonly type="text" name="name" id="name" class="form-control" value="{{ $profile->last_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="name">Country</label>
                                <input readonly type="text" name="name" id="name" class="form-control" value="{{ $profile->country_id }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input readonly type="text" name="email" id="email" class="form-control" value="{{ $profile->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input readonly type="text" name="phone" id="phone" class="form-control" value="{{ $profile->mobile }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone">Address</label>
                                <textarea readonly name="address" id="address" class="form-control" cols="30" rows="5">{{ $profile->address }}</textarea>
                            </div>

                            <div class="d-flex">
                                <a href="{{ route('account.edit', $profile->id) }}" class="btn btn-dark">Edit Profile</a>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection