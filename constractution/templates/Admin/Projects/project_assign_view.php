<style>
    form {
        margin-left: 445px;
    }
    label.form-label {
        width: 229px;
    }
    input.btn.btn-primary {
        margin-left: 618px;
        margin-top: 17px;
        margin-bottom: 27px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h3 class="text-light font-weight-bold p-2">Assign Project</h3>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <?php echo $this->Form->create($project,['id'=>'form']); ?>
                    <?php echo  $this->Form->control('project_name', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <?php echo  $this->Form->control('state', ['type' => 'phone', 'class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <?php echo  $this->Form->control('city', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <?php echo  $this->Form->control('project_address1', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <?php echo  $this->Form->control('project_address2', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <?php echo  $this->Form->control('pincode', ['class' => 'text-form', 'label' => ['class' => 'form-label']]); ?>
                    <label for="">Property Type*</label>
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
                <div class="row">
                   <div class="text-form col-md-2" ></div>
                   <div class="text-form col-md-9 mt-3" >
                        <div>
                            <h5 class="mt-2">Assigned Contractor</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Contractor Name</th>
                                    <th>Contractor Email</th>
                                    <th>Contractor Address</th>
                                    <th>Contractor Phone</th>
                                    <th>Contractor Type</th>
                                    <th>Contractor Company</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($assignuser as $assign){?> 
                                    <tr>
                                        <td><?php echo $assign->user->user_profile->first_name;?></td>
                                        <td><?php echo $assign->user->email;?></td>
                                        <td><?php echo $assign->user->user_profile->address1;?></td>
                                        <td><?php echo $assign->user->user_profile->phone;?></td>
                                        <td>
                                            <?php 
                                                if($assign->user->user_type == 2){
                                                    echo "General Contractor";
                                                }else{
                                                    echo "Sub-Contractor";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $assign->user->user_profile->company_name;?></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 

