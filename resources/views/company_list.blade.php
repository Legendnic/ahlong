@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Companies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($all_company as $company)
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse{{ $company->id }}" class="collapsed card-link" data-toggle="collapse">
                                        {{ $company->name }}
                                    </a>
                                </div>
                                <div id="collapse{{ $company->id }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6">Field :</div>
                                                <div class="col-lg-6">{{ $company->field }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">Description :</div>
                                                <div class="col-lg-6">{{ $company->description }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">Current Loan Value :</div> <!--loan value here--><!--through the blockchain if managed -->
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-3"><input type="submit" class="form-control btn btn-primary" value="Ask For Loan" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
