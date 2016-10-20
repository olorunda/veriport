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
				<img class="pull-left" alt="user_profile" src="<?php echo e(asset('upload')); ?>/<?php echo e($user->image); ?>" style="height:200px; width:200px;">
			</div>
			<div class="data">
				<h3 class="text-uppercase text-primary"><?php echo e($user->f_name); ?> <?php echo e($user->l_name); ?></h3>
				<p class="lead" id="dpr-pf-name">
				    <?php echo e($contacts->street); ?>, <?php echo e($contacts->city); ?>, <?php echo e($contacts->state); ?>

					<br><b>Phone Number:</b> <?php echo e($user->phone_num); ?>

					<br><b>E-Mail:</b> <?php echo e($user->email); ?>   
					<br><b>Application Status:</b> <?php if($user->approved=="1"): ?> <span class="label label-success">Approved</span> <?php else: ?> <span  class="label label-warning" >Pending </span> <?php endif; ?>
					<br>
					<strong class="text-danger"><b>Reference Number:</b> <?php echo e($user->ref_num); ?></strong>
					<br>
					<?php if(Auth::user()->type=="0" && Auth::user()->complete=="1"): ?>
    <a  onclick="window.print()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-print"></i> Print</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a  onclick="sendmail()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-share"></i> Send as Email</a>
					<?php endif; ?>
					
				</p>
				<?php if(Auth::user()->type=="0" && Auth::user()->complete=="1"): ?>
				<?php	$margin=''; ?>
				<?php else: ?>
					<?php  $margin=60;  ?>
				<?php endif; ?>
				<div id="demo" style="margin-left:-17px; margin-top:<?php echo e($margin); ?>px;"></div>
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
				<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#biodataModal" >Edit</button> <?php endif; ?>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>First name:</b> <?php echo e($user->f_name); ?> 
						<br><b>Middle name:</b> <?php echo e($user->m_name); ?> 
						<br><b>Phone Number:</b> <?php echo e($user->phone_num); ?> 
						<br><b>Date of Birth:</b> <?php echo e($user->dob); ?>

						<br><b>Reference Number:</b> <?php echo e($user->ref_num); ?><br>
				
					</p>
				</div>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>Last name:</b> <?php echo e($user->l_name); ?>

						<br><b>Maiden name:</b> <?php echo e($user->maiden_name); ?>

						<br><b>E-Mail:</b> <?php echo e($user->email); ?>

						<br><b>Marital Status:</b> <?php echo e($user->marital_status); ?>

						<br><b>Sex:</b> <?php echo e($user->sex); ?>

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
				<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>
				<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#contactModal" >Edit</button> <?php endif; ?>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b> Street:</b> <?php echo e($contacts->street); ?> 
						<br><b>City:</b> <?php echo e($contacts->city); ?> 
						<br><b>Local Government Area:</b> <?php echo e($contacts->lga); ?>

						<br><b>State:</b> <?php echo e($contacts->state); ?> 
						<br><b>State of Origin:</b> <?php echo e($contacts->state_origin); ?> 
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
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addInstitute" pull-right">Add</button> <?php endif; ?>
				</h3>
				<legend>Secondary School Attended</legend>
				<br><b>Secondary School:</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($institute2->sname); ?> <br><br>
			<b>Date Attended:</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e(date('F j, Y', strtotime($institute2->sstart_date))); ?> to <?php echo e(date('F j, Y',strtotime($institute2->send_date))); ?>

				<br>
				<?php if(count($institute)>0): ?>
					
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
                                <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($inst->degree=="bsc"): ?>
                                    <?php $degree = "B.Sc."; ?>
                                    <?php elseif($inst->degree=="ben"): ?>
                                    <?php $degree = "B.Eng."; ?>
                                    <?php elseif($inst->degree=="btech"): ?>
                                    <?php $degree = "B.Tech."; ?>
                                    <?php elseif($inst->degree=="mbbs"): ?>
                                    <?php $degree = "M.B.B.S."; ?>
                                    <?php elseif($inst->degree=="llb"): ?>
                                    <?php $degree = "L.LB."; ?>
                                    <?php elseif($inst->degree=="hnd"): ?>
                                    <?php $degree = "HND"; ?>
                                    <?php elseif($inst->degree=="ba"): ?>
                                    <?php $degree = "B.A."; ?>
                                     <?php elseif($inst->degree=="bpharm"): ?>
                                    <?php $degree = "B.Pharm"; ?>
                                     <?php elseif($inst->degree=="others"): ?>
                                    <?php $degree = $inst->degree; ?>
                                    <?php else: ?>
                                        <?php $degree = $inst->degree; ?>
                                    <?php endif; ?>

                                    <?php if($inst->grade==1): ?>
                                    <?php $grade = "First Class"; ?>
                                    <?php elseif($inst->grade==2): ?>
                                    <?php $grade = "Second Class Upper"; ?>
                                    <?php elseif($inst->grade==3): ?>
                                    <?php $grade = "Second Class Lower"; ?>
                                    <?php elseif($inst->grade==4): ?>
                                    <?php $grade = "Third Class"; ?>
                                    <?php elseif($inst->grade==5): ?>
                                    <?php $grade = "Merit"; ?>
                                    <?php elseif($inst->grade==6): ?>
                                    <?php $grade = "Distinction"; ?>
                                    <?php elseif($inst->grade==7): ?>
                                    <?php $grade = "Pass"; ?>
                                    <?php elseif($inst->grade==8): ?>
                                    <?php $grade = $inst->grade; ?>
                                    <?php else: ?>
                                        <?php $grade = $inst->grade; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo e($index+=1); ?></th>
                                        <th><?php echo e($inst->iname); ?></th>
                                        <th><?php echo e($inst->course); ?></th>
                                        <th><?php echo e($inst->istart_date); ?></th>
                                        <th><?php echo e($inst->iend_date); ?></th>
                                        <th><?php echo e($degree); ?></th>
                                        <th><?php echo e($grade); ?></th>
                                        <th>
                                        <?php if(Auth::user()->jobcat==1): ?>
                                          <?php if(Auth::user()->type==1): ?>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#einstitute"><i class="fa fa-edit"></i> Edit</button>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <form class="inline-form" action="<?php echo e(url('/deleteHireEdu')); ?>/<?php echo e($inst->iname); ?>" method="POST">
                                                    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                                                    <?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?>   <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> <?php else: ?>    <?php endif; ?>
                                                </form>
                                        <?php endif; ?>
                                        </th>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div> 
  <?php else: ?>
	  
  <p class="text-danger lead" id="dpr-pf-name" style="margin-top:30px;" >
					<b>No Institution Found  <?php if(Auth::user()->complete=='0'): ?>, Click On the Add button to Add Institution <?php endif; ?></b>
				</p>
  <?php endif; ?>
		</div>
	</div>
</div>

<!--
######################################################
		PROFESSIONAL QUALIFICATIONS INFORMATION
######################################################
-->
<div class="col-md-12" style="margin-top:20px;"></div>
<?php if(count($professional_quals) > 0): ?>
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" pull-right">Add</button> <?php endif; ?>
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
							<?php $__currentLoopData = $professional_quals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qual): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<th><?php echo e($index); ?></th>
								<th><?php echo e($qual->name); ?></th>
								<th><?php echo e($qual->position); ?></th>
								<th>
				             	<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>   <form class="inline-form" action="<?php echo e(url('/deletequals')); ?>/<?php echo e($qual->id); ?>" method="POST">
				                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
				                        <input type="hidden" name="url" id="url" value="<?php echo e(Request::url()); ?>">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> <?php endif; ?>
				                    </form>
				                </th>
							</tr>
							<?php $index+=1; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							<?php $index=1;?>
						</tbody>
					</table>
				</div><!-- -->
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" >Add</button> <?php endif; ?>
					
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Professional Qualifications Found
				</p>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>
<!--
###################################################
		RELEVANT EXPERIENCES INFORMATION
###################################################
-->

<br>
<?php if($user->jobcat==1): ?>
	
<?php else: ?>
<?php if(count($relevant_exp)>0): ?>

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
				<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> <?php endif; ?>
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
							<?php $__currentLoopData = $relevant_exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<th><?php echo e($index++); ?></th>
								<th><?php echo e($exp->name); ?></th>
								<th><?php echo e($exp->position); ?></th>
								<th><?php echo e($exp->start_date); ?></th>
                				<th><?php echo e($exp->end_date); ?></th>
								<th>
				     	<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>           <form class="inline-form" action="<?php echo e(url('/deleteexp')); ?>/<?php echo e($exp->id); ?>" method="POST">
				                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
				                        <input type="hidden" name="url" id="url" value="<?php echo e(Request::url()); ?>">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> <?php endif; ?>
				                    </form>
				                </th>
							</tr>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php else: ?>

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> <?php endif; ?>
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Relevant Experiences Found
				</p>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>
<?php endif; ?>
<!--
###################################
		REFEREES INFORMATION
###################################
-->

<br>
<?php if(count($refs) > 0): ?>

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" pull-right">Add</button> <?php endif; ?>
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
						<?php $__currentLoopData = $refs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<th><?php echo e($index++); ?></th>
							<th><?php echo e($ref->name); ?></th>
							<th><?php echo e($ref->organization); ?></th>
							<th><?php echo e($ref->position); ?></th>
							<th><?php echo e($ref->email); ?></th>
							<th><?php echo e($ref->phone); ?></th>
							<th>
			         	<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>       <form class="inline-form" action="<?php echo e(url('/deleteref')); ?>/<?php echo e($ref->id); ?>" method="POST">
			                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
			                        <input type="hidden" name="url" id="url" value="<?php echo e(Request::url()); ?>">
			                        <input type="hidden" name="_method" value="DELETE">
			                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> <?php endif; ?>
			                    </form>
			                </th>
						</tr>
					
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php else: ?>

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					<?php if(Auth::user()->type=="1" && Auth::user()->complete=="1"): ?> <?php else: ?>	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" >Add</button> <?php endif; ?>
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Referees Found!
				</p>
			</div>
		</div>
	</div>
</div>

<br>
<?php endif; ?>

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
						<b>Region:</b> <?php echo e($user->region); ?> 
						<br><b>Center:</b> <?php echo e($user->center); ?> 
					</p>
				</div>
				<div class="col-lg-6">
					<h5>Alternate Center</h5>
					<p class="lead" id="dpr-pf-name">
						<b>Region:</b> <?php echo e($user->altregion); ?> 
						<br><b>Center:</b> <?php echo e($user->altcenter); ?> 
					</p>
				</div>
				<br><br><br><br>
			</div>
		</div>
	</div>
</div>

<div class="">
    <?php $idgen = Crypt::encrypt(Auth::User()->id); ?>
	<?php if(Auth::user()->complete=="0"): ?>
		<?php if(Auth::user()->type=="1"): ?>
			<?php else: ?>
    <a  onclick="submit('<?php echo e(Auth::user()->id); ?>')" class="btn btn-template-main"><i class="fa fa-paper-plane-o"></i> Submit & Print</a>
	<?php endif; ?>
	<?php endif; ?>
</div>