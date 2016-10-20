<script type="text/javascript">
    $("#refresh").click(function() {
        location.reload();
    });
</script>
<!--
###################################
		BASIC INFORMATION
###################################
-->

<button class="btn btn-info btn-lg" id="refresh"><i class="fa fa-undo"></i> Re-scan</button>
<div class="row" id="prof">
	<div class="col-lg-12">
		<div class="dpr-well" style="padding-left:40px;">
			<div class="img-responsive">
				<img class="pull-left" alt="user_profile" src="{{asset('upload')}}/{{$user->image}}" style="height:200px; width:200px;">
			</div>
			<div class="data">
				<h3 class="text-uppercase text-primary">{{ $user->f_name }} {{ $user->l_name }}</h3>
				<p class="lead" id="dpr-pf-name">
				    {{ $contacts->street }}, {{ $contacts->city }}, {{ $contacts->state }}
					<br><b>Phone Number:</b> {{ $user->phone_num }}
					<br><b>E-Mail:</b> {{ $user->email }}   
					<br><b>Application Status:</b> @if($user->approved=="1") <span class="label label-success">Approved</span> @else <span  class="label label-warning" >Pending </span> @endif
					<br>
					<strong class="text-danger"><b>Reference Number:</b> {{ $user->ref_num }}</strong>
					<br>
					@if(Auth::user()->type=="0" && Auth::user()->complete=="1")
    <a  onclick="window.print()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-print"></i> Print</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a  onclick="sendmail()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-share"></i> Send as Email</a>
					@endif
					
				</p>
				@if(Auth::user()->type=="0" && Auth::user()->complete=="1")
				<?php	$margin=''; ?>
				@else
					<?php  $margin=60;  ?>
				@endif
				<div id="demo" style="margin-left:-17px; margin-top:{{$margin}}px;"></div>
				<br><span class='text-danger'><b>Successful candidates should come along with their registration slip to the examination centre.</b></span>
	
			</div>
			
		</div>
	</div>
</div>

<!--
###################################
		BIO-DATA INFORMATION
###################################
-->

<br>

<div class="row" id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-male"></i>/<i class="fa fa-female"></i> BIO-DATA 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#biodataModal" >Edit</button> @endif
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>First name:</b> {{ $user->f_name }} 
						<br><b>Middle name:</b> {{ $user->m_name }} 
						<br><b>Phone Number:</b> {{ $user->phone_num }} 
						<br><b>Date of Birth:</b> {{ $user->dob }}
						<br><b>Reference Number:</b> {{ $user->ref_num }}<br>
				
					</p>
				</div>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>Last name:</b> {{ $user->l_name }}
						<br><b>Maiden name:</b> {{ $user->maiden_name }}
						<br><b>E-Mail:</b> {{ $user->email }}
						<br><b>Marital Status:</b> {{ $user->marital_status }}
						<br><b>Sex:</b> {{ $user->sex }}
					</p>
				</div>
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
###################################
		CONTACT INFORMATION
###################################
-->

<div class="row" id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-envelope-o"></i> <i class="fa fa-phone"></i> Contact Information 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else
				<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#contactModal" >Edit</button> @endif
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b> Street:</b> {{ $contacts->street }} 
						<br><b>City:</b> {{ $contacts->city }} 
						<br><b>Local Government Area:</b> {{ $contacts->lga }}
						<br><b>State:</b> {{ $contacts->state }} 
						<br><b>State of Origin:</b> {{ $contacts->state_origin }} 
					</p>
				</div>
				<br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
##################################################
		EDUCATIONAL BACKGROUND INFORMATION
##################################################
-->


<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<h3 class="text-uppercase text-primary">
					<i class="fa fa-institution"></i> Educational Information
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addInstitute" pull-right">Add</button> @endif
				</h3>
				<legend>Secondary School Attended</legend>
				<br><b>Secondary School:</b>&nbsp;&nbsp;&nbsp;&nbsp; {{ $institute2->sname }} <br><br>
			<b>Date Attended:</b>&nbsp;&nbsp;&nbsp;&nbsp; {{ date('F j, Y', strtotime($institute2->sstart_date)) }} to {{ date('F j, Y',strtotime($institute2->send_date)) }}
				<br>
				@if(count($institute)>0)
					
				<div class="col-md-12" style="margin-bottom:40px;"></div>
				<legend>Higher Institution Attended</legend>
				
       <div class="row" style="margin-top:30px; margin-left:-20px;">
           <div class="col-md-12">
               <div class="">
                   <div class="table-responsive">
                       <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name of Institution</th>
                                    <th>Course</th>
                                    <th>Date Started</th>
                                    <th>Date Ended</th>
                                    <th>Degree Obtained</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index=0; ?>
                                @foreach($institute as $inst)
                                    @if($inst->degree=="bsc")
                                    <?php $degree = "B.Sc."; ?>
                                    @elseif($inst->degree=="ben")
                                    <?php $degree = "B.Eng."; ?>
                                    @elseif($inst->degree=="btech")
                                    <?php $degree = "B.Tech."; ?>
                                    @elseif($inst->degree=="mbbs")
                                    <?php $degree = "M.B.B.S."; ?>
                                    @elseif($inst->degree=="llb")
                                    <?php $degree = "L.LB."; ?>
                                    @elseif($inst->degree=="hnd")
                                    <?php $degree = "HND"; ?>
                                    @elseif($inst->degree=="ba")
                                    <?php $degree = "B.A."; ?>
                                     @elseif($inst->degree=="bpharm")
                                    <?php $degree = "B.Pharm"; ?>
                                     @elseif($inst->degree=="others")
                                    <?php $degree = $inst->degree; ?>
                                    @else
                                        <?php $degree = $inst->degree; ?>
                                    @endif

                                    @if($inst->grade==1)
                                    <?php $grade = "First Class"; ?>
                                    @elseif($inst->grade==2)
                                    <?php $grade = "Second Class Upper"; ?>
                                    @elseif($inst->grade==3)
                                    <?php $grade = "Second Class Lower"; ?>
                                    @elseif($inst->grade==4)
                                    <?php $grade = "Third Class"; ?>
                                    @elseif($inst->grade==5)
                                    <?php $grade = "Merit"; ?>
                                    @elseif($inst->grade==6)
                                    <?php $grade = "Distinction"; ?>
                                    @elseif($inst->grade==7)
                                    <?php $grade = "Pass"; ?>
                                    @elseif($inst->grade==8)
                                    <?php $grade = $inst->grade; ?>
                                    @else
                                        <?php $grade = $inst->grade; ?>
                                    @endif
                                    <tr>
                                        <th>{{ $index+=1 }}</th>
                                        <th>{{ $inst->iname }}</th>
                                        <th>{{ $inst->course }}</th>
                                        <th>{{ $inst->istart_date }}</th>
                                        <th>{{ $inst->iend_date }}</th>
                                        <th>{{ $degree }}</th>
                                        <th>{{ $grade }}</th>
                                        <th>
                                        @if(Auth::user()->jobcat==1)
                                          @if(Auth::user()->type==1)
                                    @else
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#einstitute"><i class="fa fa-edit"></i> Edit</button>
                                        @endif
                                        @else
                                        <form class="inline-form" action="{{ url('/deleteHireEdu')}}/{{ $inst->iname }}" method="POST">
                                                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                                                    @if(Auth::user()->type=="1" && Auth::user()->complete=="1")   <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @else    @endif
                                                </form>
                                        @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div> 
  @else
	  
  <p class="text-danger lead" id="dpr-pf-name" style="margin-top:30px;" >
					<b>No Institution Found  @if(Auth::user()->complete=='0'), Click On the Add button to Add Institution @endif</b>
				</p>
  @endif
		</div>
	</div>
</div>

<!--
######################################################
		PROFESSIONAL QUALIFICATIONS INFORMATION
######################################################
-->
<div class="col-md-12" style="margin-top:20px;"></div>
@if(count($professional_quals) > 0)
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" pull-right">Add</button> @endif
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Professional Qualification</th>
								<th>Certification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($professional_quals as $qual)
							<tr>
								<th>{{ $index }}</th>
								<th>{{ $qual->name }}</th>
								<th>{{ $qual->position }}</th>
								<th>
				             	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else   <form class="inline-form" action="{{ url('/deletequals') }}/{{ $qual->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
				                    </form>
				                </th>
							</tr>
							<?php $index+=1; ?>
							@endforeach
							<?php $index=1;?>
						</tbody>
					</table>
				</div><!-- -->
			</div>
		</div>
	</div>
</div>
@else
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" >Add</button> @endif
					
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Professional Qualifications Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
<!--
###################################################
		RELEVANT EXPERIENCES INFORMATION
###################################################
-->

<br>
@if($user->jobcat==1)
	
@else
@if(count($relevant_exp)>0)

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> @endif
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name of Organization</th>
								<th>Position</th>
								<th>Date Employed</th>
								<th>Date Ended</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $index=1; ?>
							@foreach($relevant_exp as $exp)
							<tr>
								<th>{{ $index++}}</th>
								<th>{{ $exp->name }}</th>
								<th>{{ $exp->position }}</th>
								<th>{{ $exp->start_date }}</th>
                				<th>{{ $exp->end_date }}</th>
								<th>
				     	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else           <form class="inline-form" action="{{ url('/deleteexp')}}/{{ $exp->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
				                    </form>
				                </th>
							</tr>
							
							@endforeach
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@else

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> @endif
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Relevant Experiences Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
@endif
<!--
###################################
		REFEREES INFORMATION
###################################
-->

<br>
@if(count($refs) > 0)

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" pull-right">Add</button> @endif
				</h3>
				<table class="table table-hover table-stripped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name of Referee</th>
							<th>Organization</th>
							<th>Position</th>
							<th>E-Mail</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $index=1; ?>
						@foreach($refs as $ref)
						<tr>
							<th>{{ $index++ }}</th>
							<th>{{ $ref->name }}</th>
							<th>{{ $ref->organization }}</th>
							<th>{{ $ref->position }}</th>
							<th>{{ $ref->email }}</th>
							<th>{{ $ref->phone }}</th>
							<th>
			         	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else       <form class="inline-form" action="{{ url('/deleteref')}}/{{ $ref->id }}" method="POST">
			                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
			                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
			                        <input type="hidden" name="_method" value="DELETE">
			                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
			                    </form>
			                </th>
						</tr>
					
						@endforeach
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@else

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" >Add</button> @endif
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Referees Found!
				</p>
			</div>
		</div>
	</div>
</div>

<br>
@endif

<!--
###################################################
		EAXMINATION CENTER INFORMATION
###################################################
-->

<br>
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-map-marker"></i> Preferred Examination Center 
						</h3>
				<div class="col-lg-6">
					<h5>Preferred Center</h5>
					<p class="lead" id="dpr-pf-name">
						<b>Region:</b> {{ $user->region }} 
						<br><b>Center:</b> {{ $user->center }} 
					</p>
				</div>
				<div class="col-lg-6">
					<h5>Alternate Center</h5>
					<p class="lead" id="dpr-pf-name">
						<b>Region:</b> {{ $user->altregion }} 
						<br><b>Center:</b> {{ $user->altcenter }} 
					</p>
				</div>
				<br><br><br><br>
			</div>
		</div>
	</div>
</div>

<div class="">
    <?php $idgen = Crypt::encrypt(Auth::User()->id); ?>
	@if(Auth::user()->complete=="0")
		@if(Auth::user()->type=="1")
			@else
    <a  onclick="submit('{{Auth::user()->id}}')" class="btn btn-template-main"><i class="fa fa-paper-plane-o"></i> Submit & Print</a>
	@endif
	@endif
</div>