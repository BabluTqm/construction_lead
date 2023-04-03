<style>
    label.form-label {
        width: 229px;
    }
    input.btn.btn-primary {
        margin-left: 152px;
        margin-top: 28px;
    }

</style>

<!-- modal for contractor services -->
<div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Provided Services</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Service Name</th>
                            </tr>
                        </thead>
                        <tbody id = "show">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== assign project start from here==== -->

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <?php if ($project->accept_status == 1) { ?>
                            <h6 class="text-white text-capitalize ps-3">Project View
                                <?php echo $this->Html->link(__('Accepted'), ['controller' => 'Projects', 'prefix' => 'Admin', 'action' => 'accectOwnerProject', $project->id], ['class' => 'float-end accept btn btn-success me-5', 'style' => 'margin-top:-9px']) ?>
                            </h6>
                        <?php } else { ?>
                            <h6 class="text-white text-capitalize ps-3">Project View
                                <?php echo $this->Html->link(__('Accept Project'), ['controller' => 'Projects', 'prefix' => 'Admin', 'action' => 'accectOwnerProject', $project->id], ['class' => 'float-end btn btn-success me-5', 'style' => 'margin-top:-9px', 'id' => 'load']) ?>
                            </h6>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body px-0 pb-2" id = "table-hide" >
                   <div class="row">
                       <div class="col-md-2"></div>
                       <div class="col-md-8">
                       <?php echo $this->Form->create($project,['id'=>'form']); ?>
                        <?php echo  $this->Form->control('project_name', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('user_profile.first_name', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('state', ['type' => 'phone', 'class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('city', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('project_address1', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('project_address2', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <?php echo  $this->Form->control('pincode', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                        <label for="">Property Type</label>
                        <select name="property_type" id="" class="form-control p-1" style="width:40%;border:1px solid black;">
                            <option value="" selected disabled>Select one</option>
                          <?php if($project->property_type == 1){ ?>
                            <option value="1" selected>New Construction</option>
                            <option value="2">Addition</option>
                          <?php }else if($project->property_type == 2){?>
                            <option value="1">New Construction</option>
                            <option value="2"selected>Addition</option>
                          <?php }?>
                        </select>
                        <?php echo $this->Form->submit(__('Update'), ['class' => 'btn btn-primary']); ?>
                        <?php echo $this->Form->end(); ?>
                       </div>
                       <div class="col-md-2"></div>
                   </div>
                    <div class="row ms-5">
                        <h6>Services Required By Owner</h6>
                        <div class="col-4 ms-5">
                            <div class="card-body p-3">
                                <?php $count = 0; ?>
                                <?php foreach ($owner_services as $service) : ?>
                                    <td><?php echo '<b>' . ++$count . '</b>' . "." . $service->service->service ?></td>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <!--======== Asked General Contractor By Owner==========-->
                        <div class="card col-9 ms-5">
                            <h6>Asked
                                <?php if ($project->contractor == 2) {
                                    echo "General Contractor";
                                } else {
                                    echo "Sub-Contractor";
                                }  ?> 
                            By Owner</h6>

                           <!-- =============Assign project table start from here=============== -->
                            <?php echo $this->Form->create(null, ['id' => 'assigned-form']) ?>
                            <!--table-->
                            <table class="table table-bordered table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Company</th>
                                        <th>view</th>
                                        <th>Assign</th>
                                        <th>Debit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="owner_user_id" id = "owner_user_id" value="<?php echo $project->user_id ?>">
                                    <input type="hidden" name="project_id"  id = "project_id" value="<?php echo $project->id ?>">
                                    <input type="hidden" name="owner_email" id = "owner_email" value="<?php echo $project->user->email ?>">
                                    
                                    <?php
                                       $count = 0 ;
                                       foreach ($users as $user){
                                        if($user->user->own_status == 0){
                                            continue;
                                        }
                                        if (!in_array($user['user_id'], $already_assigned_users)){
                                        ?> 
                                        <tr id = "<?php echo $user->user_id?>" class="ctr">
                                            <td><?php echo ++$count; ?></td>
                                            <td><?php echo $user->user->user_profile->first_name." ".$user->user->user_profile->last_name ; ?></td>
                                            <td><?php echo $user->user->email; ?></td>
                                            <td><?php echo $user->user->user_profile->phone ; ?></td>
                                            <td><?php echo $user->user->user_profile->address1 ; ?></td>
                                            <td><?php echo $user->user->user_profile->company_name ; ?></td>
                                            <td><?php echo $this->Html->link(__(''), [], ['class' => 'fa-solid fa-eye  mx-3 view','data-id'=>$user->user->id]); ?></td>
                                            <td><input id="checkid" class="checkid" type="checkbox" name="user_id[]" value="<?php echo $user->user_id?>" style="margin-bottom:10px;margin-left:7px"></td>
                                            <td><input id="" class="credit" type="text" name="credit[]" value="<?php echo $credit->credit?>" style="margin-bottom:10px;margin-left:7px;width:50%"></td>
                                        </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
                                <?php  
                                    if ($project->accept_status == 1) { 
                                      echo $this->Form->submit(__('Assign'), ['class' => 'btn btn-primary']);
                                }?>
                                <?php echo $this->Form->end(); ?>
                        </div>
                       <!--========== Asked General Contractor By Owner============-->
                        <div class=" card col-9 ms-5 mt-3">
                            <h6>Already Assigned 
                                <?php 
                                    if($project->contractor==2) {
                                       echo"General Contractors";
                                    }else{
                                       echo "Sub-Contractors";
                                    }
                                ?>
                            </h6>
                            <?php echo $this->Form->create(null,['id'=>'assigned-form'])?>
                            <table class="table table-bordered table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Company</th>
                                        <th>view</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    <?php
                                    foreach($assignuser as $assign){
                                        
                                        foreach ($allusers as $alluser) { 
                                            
                                        if($assign->user_id == $alluser->id ){?>
                                        <tr>
                                            <td><?php echo ++$count; ?></td>
                                            <td><?php echo $alluser->user_profile->first_name ; ?></td>
                                            <td><?php echo $alluser->user_profile->last_name ; ?></td>
                                            <td><?php echo $alluser->email?></td>
                                            <td><?php echo $alluser->user_profile->phone ; ?></td>
                                            <td><?php echo $alluser->user_profile->address1 ; ?></td>
                                            <td><?php echo $alluser->user_profile->company_name ; ?></td>
                                            <td><?php echo $this->Html->link(__(''), [], ['class' => 'fa-solid fa-eye  mx-3 view','data-id'=>$alluser->id]); ?></td>
                                        </tr>
                                    <?php }}} ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loader_assign"></div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    
    $('.accept').on('click',function(e){
        e.preventDefault();
        $('#load').on('click',function(){
            $('#loader').css({'position':'fixed',
                'left': '0px', 
                'top': '0px' ,
                'opacity':'0.6',
                'width': '100%',  
                'height': '100%',  
                'z-index': '9999',  
                'background':'url("https://media.tenor.com/d0LM2F1ze8kAAAAC/smartparcel-mail.gif") 50% 50% no-repeat rgb(249,249,249)'  
            });
        });
        
        function load(){
            $('#loader').css({'position':'fixed',
                'left': '0px', 
                'top': '0px' ,
                'opacity':'0.6',
                'width': '100%',  
                'height': '100%',  
                'z-index': '9999',  
                'background':'url("https://media.tenor.com/d0LM2F1ze8kAAAAC/smartparcel-mail.gif") 50% 50% no-repeat rgb(249,249,249)'  
            });
        }
    })
  });
</script>

