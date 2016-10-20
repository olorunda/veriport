@extends('profile.index')
@section('content')
<div id="content" style="padding-bottom:30px">
    <div id="heading-breadcrumbs">
        <div class="container" >
            <div class="row">
                <div class="col-md-7" id="noprint">
                  @if(Auth::user()->complete=="0")   
                  @if(Auth::user()->type=="1")
                  <h1> Modify / View Applicants Details </h1>
                  @else
                  <h1>Confirm Your Application</h1>
                  @endif 
                  @else

                  <h1>Application Completed</h1>
                  @endif
              </div>
          </div>
      </div>
    </div>
    <div class="container"style="background-color:#ececec; margin-top:-20px;">
        <div class="row">
            <!-- *** LEFT COLUMN ***
            _________________________________________________________ -->

            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">

                        <strong>The system was unable to properly save your record.</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-1" style="margin-left:5%"></div>
                <div class="col-md-9 ">
                    <div class="heading text-center" >
                        <p><img style="width:100%;" alt="DPR LOGO" src="{{ asset('img/logo.jpg') }}"></p>
                         @if(Auth::user()->type=='1')

                         <h2>Applicant's Details</h2>
                         @else
                         <h2 id="noprint">Your Profile</h2>
                         @endif					  
                    </div>
                    <div style="height:900px;">
                        
                    </div>
                 @include('profile.applicantprofile')
                 <div class="space"></div>
                </div>
        </div>
    </div>
</div>
@endsection