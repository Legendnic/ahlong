@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your company') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user_company===null)
                    {{ __('You does not have any company yet. Please register one  through ') }} <a href="{{ route('company_add') }}">this link</a> 
                    <!-- view register company page-->
                    @else
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6"><label for="user_full">User : </label></div>
                            <div class="col-lg-6">{{ $user_company->user->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><label for="comp_name">Company Name : </label></div>
                            <div class="col-lg-6">{{ $user_company->company->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><label for="comp_address">Company Address : </label></div>
                            <div class="col-lg-6">{{ $user_company->company->address }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><label for="comp_field">Company Field : </label></div>
                            <div class="col-lg-6">{{ $user_company->company->field }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><label for="comp_desc">Company Description : </label></div>
                            <div class="col-lg-6">{{ $user_company->company->description }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <form action="{{ route('company_delete', $user_company->company_id) }}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <!-- <input type="submit" value="Remove Company" class="btn btn-danger"> -->
                                    <input type="submit" value="Remove Company" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
