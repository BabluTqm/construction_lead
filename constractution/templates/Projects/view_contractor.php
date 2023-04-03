<?php
$myTemplates = [
    'inputContainer'=>'<div class="input-group input-group-outline ">{{content}}</div>'
];
$this->Form->setTemplates($myTemplates);
?>
<style>
  .err{
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
                  
                    <div class="card-header">
                    <h4 class="font-weight-bolder text-center">All Assigned Contrctors</h4>
                    <h6 class="font-weight-bolder text-center">Contrctors Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Contractor Name</th>
                                    <th>Contractor Email</th>
                                    <th>Contractor Address</th>
                                    <th>Contractor Phone</th>
                                    <th>Contractor Company</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($assignuser as $assign){
                                    foreach($users as $user){
                                        if($assign->user_id == $user->id){
                                            ?> 
                                                <tr>
                                                  <td><?php echo $user->user_profile->first_name;?></td>
                                                  <td><?php echo $user->email;?></td>
                                                  <td><?php echo $user->user_profile->address1;?></td>
                                                  <td><?php echo $user->user_profile->phone;?></td>
                                                  <td><?php echo $user->user_profile->company_name;?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>