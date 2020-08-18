@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Registration') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user_company)
                    You already registered a company. Please click <a href="{{ route('company') }}">this link</a> if you want to see your company's info. 
                    <!-- view register company page-->
                    @else
                    <form action="{{ route('company_store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your company's name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Company Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your company's email" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Company Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter your company's address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="field">Company Field</label>
                            <input type="text" class="form-control" name="field" placeholder="Enter your company's field" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Company Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter a short description of your company" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                        <input type="submit" class="form-control btn btn-primary" value="Register">
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
