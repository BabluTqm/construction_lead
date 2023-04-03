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
                            <h3 class="text-center">Profile Information</h3>
                            <?php echo $this->Html->link(__(''), ['controller' => 'contractors' ,'action' => 'editProfile' , $gcsc->id],['class' => 'float-end fa-solid fa-edit' ]) ?>
                            <div class="row">
                                <h6 class="text-center">
                                 <?php 
                                 if($auth->user_type == 2){
                                    echo "<div id = 'gc'>General Contractor<div>";
                                 }else{
                                    echo "<div id = 'sc'>Sub-Contractor<div>";
                                 }  
                                ?>
                                </h6> 
                                <div class="col-md-2"></div>
                                <div class="col-md-4 mt-3">
                                    <?php echo $this->Form->create($gcsc,['id'=>'gcsc-form']) ?>
                                    <label>First Name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control ', 'label' => false,'disabled' => 'true']) ?>
                                    <label>Last Name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control', 'label' => false,'disabled' => 'true']) ?>
                                    <label>Email<span class="req">*</span></label>
                                    <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control ', 'label' =>false,'disabled' => 'true']) ?>
                                    <label>Phone<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.phone', ['required' => false, 'class' => 'form-control ', 'label' =>false,'disabled' => 'true']) ?>
                                    <label>Address1<span class="req">*</span> </label>
                                    <?php echo $this->Form->control('user_profile.address1', ['required' => false, 'class' => 'form-control', 'label' => false,'disabled' => 'true']) ?>
                                  
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Address2</label>
                                    <?php echo $this->Form->control('user_profile.address2', ['required' => false, 'class' => 'form-control ', 'label' => false,'disabled' => 'true']) ?>
                                    <label>State<span class="req">*</span> </label>
                                    <?php echo $this->Form->control('user_profile.state', ['required' => false, 'class' => 'form-control ', 'label' => false,'disabled' => 'true']) ?>
                                    <label>City<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.city', ['required' => false, 'class' => 'form-control ', 'label' => false,'disabled' => 'true']) ?>
                                    <label>Pin Code<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.pincode', ['required' => false, 'class' => 'form-control ', 'label' =>false,'disabled' => 'true']) ?>
                                    <label>Company name<span class="req">*</span></label>
                                    <?php echo $this->Form->control('user_profile.company_name', ['required' => false, 'class' => 'form-control ', 'label' =>false,'disabled' => 'true']) ?>
                                

                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div class="row">
                                <label for="" style="margin-left: 150px;font-weight:bold">Services</label>
                                
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                          
                                        <?php $count = 0; foreach($userservices as $service):?>
                                        <label for="" style="margin-left:1px;"> <?php echo ++$count.".".$service->service->service?></label>
                                        <?php endforeach;?>
                                   
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    $(".allcheck").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
  });
  </script>
 