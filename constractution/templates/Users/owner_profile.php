<?php
$myTemplates = [
  'inputContainer' => '<div class="input-group input-group-outline">{{content}}</div>'
];
$this->Form->setTemplates($myTemplates);

if(empty($owner->user_profile->phone && $owner->user_profile->address1 && $owner->user_profile->state && $owner->user_profile->city && $owner->user_profile->pincode) || $owner->complete_status == 0){
?>
<style>
    .err{
        color: red;
    }
    .error {
    width: 100%;
    color: red;
}
</style>
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 user-view">
        <div class="row">
            <div class="row">
                <div class="col">
                    <div class="card card-plain h-100">
                        <div class="card-body p-3">
                            <?php echo $this->Form->create($owner,['id'=>'form']) ?>
                            <h3 class="text-center">Profile Information</h3>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4 mt-3">
                                    <label >First Name<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                    <label class="mt-3">Last Name<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                    <label class="mt-3">Email<span class="err">*</span></label>
                                    <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>

                                    <label class="mt-3">Phone<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.phone', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>

                                    <label class="mt-3" >Address 1<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.address1', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label >Address2</label>
                                    <?php echo $this->Form->control('user_profile.address2', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                    <label class="mt-3">State<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.state', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                    <label class="mt-3">City<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.city', ['required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                    <label class="mt-3">Pincode<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.pincode', ['type' => 'text' , 'required' => false, 'class' => 'form-control', 'label' =>false]) ?>
                                </div>
                                 
                                <div class="text-center">
                                   <?= $this->Form->button(__('Save'), ['action' => 'edit' , 'class' => 'btn bg-gradient-primary w-10 mt-4 mb-0']) ?>
                                </div>
                               <?php echo $this->Form->end() ?>
                               </div>
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }else{?>
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
                        <div class="card-body p-3">
                            <?php echo $this->Form->create($owner) ?>
                            <h3 class="text-center">Profile Information</h3>
                            <?php echo $this->Html->link(__(''), ['controller' => 'users' ,'action' => 'edit-profile' , $owner->id],['class' => 'float-end fa-solid fa-edit' ]) ?>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4 mt-3">
                                    <label>First Name<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >Last Name<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >Email<span class="err">*</span></label>
                                    <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >Phone<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.phone', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >Address 1<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.address1', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label >Address2</label>
                                    <?php echo $this->Form->control('user_profile.address2', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label>State<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.state', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >City<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.city', ['required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                    <label >Pincode<span class="err">*</span></label>
                                    <?php echo $this->Form->control('user_profile.pincode', ['type' => 'text' , 'required' => false, 'class' => 'form-control mb-3', 'label' =>false, 'disabled'=>true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>