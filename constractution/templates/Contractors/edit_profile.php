<?php

  $myTemplates = [
    'inputContainer' => '<div class = "input-group input-group-outline mb-3">{{content}}</div>',
  ];
  $this->Form->setTemplates($myTemplates);
  ?>
  <style>
    
    button {
    margin: 0 auto;
    }
    .req{
        color: red;
    }
  </style>
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6 user-view">
        <div class="row">
            <div class="row">
                <div class="col">
                    <div class="card card-plain h-100">
                        <div class="card-body p-3">
                            <div class="row">
                               <input type="hidden" name="" id="gcsc" value="<?php echo $auth->user_type?>">
                                <h3 class="text-center">
                                 <?php 
                                 if($auth->user_type == 2){
                                    echo "General Contractor";
                                 }else{
                                    echo "Sub Contractor";
                                 }  
                                ?>
                                </h3> 
                               <h6 class="text-center">Profile Information</h6>
                                <div class="col-md-2"></div>
                                <div class="col-6 mt-3">
                                    <?php echo $this->Form->create($users,['id'=>'gcsc-form']) ?>
                                    <label>First Name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control ', 'label' => false]) ?>
                                    <label>Last Name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control', 'label' => false]) ?>
                                    <label>Email<span class="req">*</span></label>
                                    <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>
                                    <label>Phone<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.phone', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>
                                    <label>Address1<span class="req">*</span> </label>
                                    <?php echo $this->Form->control('user_profile.address1', ['required' => false, 'class' => 'form-control', 'label' => false]) ?>
                                    
                               
                                    <label>Address2</label>
                                    <?php echo $this->Form->control('user_profile.address2', ['required' => false, 'class' => 'form-control ', 'label' => false]) ?>
                                    <label>State<span class="req">*</span> </label>
                                    <?php echo $this->Form->control('user_profile.state', ['required' => false, 'class' => 'form-control ', 'label' => false]) ?>
                                    <label>City<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.city', ['required' => false, 'class' => 'form-control ', 'label' => false]) ?>
                                    <label>Pin Code<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.pincode', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>
                                    <label>Company name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.company_name', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>
                                    <div class="row">
                                        <h5 class="mt-2">Services</h5>
                                        <div class="col">
                                            <div class="d-flex">
                                            <?php if($auth->user_type == 2){?>
                                                <input class="allcheck" type="checkbox" value="" style="margin-left:10px;margin-bottom:10px;">
                                                <label for="" style="margin-left:5px;">All</label>
                                            <?php }?>
                                            </div>
                                            <div>
                                                 <?php
                                                  foreach($services as $service){?>
                   
                                                    <?php if(!empty($service->user_services)){?>
                                                    <input type="hidden" name="" id="user_id" value="<?php echo $result->id;?>">
                                                    <input class="contractor" type="checkbox" name="user_services[][service_id]" value="<?php echo $service->id?>" style="margin-bottom:10px;margin-left:7px" checked>
                                                    <label for="" style="margin-left:1px;"> <?php echo $service->service?></label>
                                                    <?php }else{?>
                                                    <input type="hidden" name="" id="user_id" value="<?php echo $result->id;?>">
                                                    <input class="contractor" type="checkbox" name="user_services[][service_id]" value="<?php echo $service->id?>" style="margin-bottom:10px;margin-left:7px">
                                                    <label for="" style="margin-left:1px;"> <?php echo $service->service?></label>
                                                <?php }}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <div class="text-center">
                        <?= $this->Form->button(__('Update'), ['class' => 'btn bg-gradient-primary w-10 mt-4 mb-0 ']) ?>
             
                        </div>
                
                        <div class="col-md-2"></div>
                        <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
       
      if ($('#gcsc').val() == 2){
        $(".allcheck").click(function(){
          $('input:checkbox').not(this).prop('checked', this.checked);
        });
      }
      if ($('#gcsc').val() == 3){
        $("input[type='checkbox']").change(function () {
           var maxAllowed = 5;
           var cnt = $("input[type='checkbox']:checked").length;
           if (cnt > maxAllowed) 
           {
             this.checked = false;
             alert('Select maximum ' + maxAllowed + ' Levels!');
           }
           
        });
       
      }
    });
</script> 


