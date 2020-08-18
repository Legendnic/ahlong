@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!$edit_company)
                    {{ __('You does not have any company yet. Please register one  through ') }} <a href="{{ route('company_add') }}">this link</a> 
                    <!-- view register company page-->
                    @else
                    <form action="{{ route('company_update',$edit_company->id) }}" method="post"> 
                        
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">New Company Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your new company's name(Can input old one)" value="{{ $edit_company->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">New Company Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your new company's email(Can input old one)" value="{{ $edit_company->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">New Company Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter your new company's address(Can input old one)" required>{{ $edit_company->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="field">New Company Field</label>
                            <input type="text" class="form-control" name="field" placeholder="Enter your new company's field(Can input old one)" value="{{ $edit_company->field }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">New Company Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter a short description of your new company(Can input old one)" required>{{ $edit_company->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                        <input type="submit" class="form-control btn btn-primary" value="Edit">
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
