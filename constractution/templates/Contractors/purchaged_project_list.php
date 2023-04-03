<div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Assign Projects</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Sr. </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Project Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder  ps-2">Owner Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Created Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 0; 
                     foreach ($purchedUsers as $purchedUsers){
                      if($purchedUsers->project->assigned_status == 1 && $purchedUsers->project->delete_status == 1){
                      ?>
                    <tr>  
                    <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo ++$count; ?></h6>
                          </div>
                        </div>
                      </td>
                     
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $purchedUsers->project->project_name ; ?></h6>
                          </div>
                        </div>
                      </td>

                      <td>
                        <h6 class=" mb-0 text-sm"><?php echo $purchedUsers->project->user_profile->first_name." ".$purchedUsers->project->user_profile->last_name ; ?></h6>
                      </td>

                      <td class="align-middle text-center text-sm">
                      <h6 class=" mb-0 text-sm"><?php echo $purchedUsers->project->user->email  ; ?></h6>
                      </td>
                      <td class="align-middle text-center">
                      <h6 class=" mb-0 text-sm"><?php echo $purchedUsers->project->user_profile->phone ; ?></h6>
                      </td>

                      <td class="align-middle text-center">
                      <h6 class=" mb-0 text-sm"><?php echo $purchedUsers->project->created_date ; ?></h6>
                      </td>
                     
                      <td class="align-middle text-center">
                       
                        <?= $this->Html->link(__(''), ['controller' => 'Contractors' ,'action' => 'projectDetails' , $purchedUsers->id],['class' => 'fa-solid fa-eye' ]) ?> 
                      </td>
                    
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    