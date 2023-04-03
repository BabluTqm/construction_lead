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
            <table class="table align-items-center mb-0" id="table_id">
              <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr No:</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Owner Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Project Delete</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created Date</th>
                  <th class="text-secondary opacity-7">Action</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php 
                  $count = $this->Paginator->counter('{{start}}'); 
                  foreach($projects as $project){
                ?>
                <tr>
                  <td><div><?php echo $count; ?></div></td>
                  <td><?php echo $project->project_name; ?> </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?php echo $project->user_profile->first_name.' '.$project->user_profile->last_name;?></h6>
                    </div>
                    </div>
                  </td>
                  <td>
                    <?php if ($project->delete_status == 1) {?>
                      <span class="text">
                        <?php
                        echo 'Active';
                        ?>
                      </span>
                    <?php } else {?>
                      <span class="text">
                    <?php echo "Deleted";}?>
                      </span>
                  </td>
                  <td>
                    <p ><?php echo $project->created_date;?></p>
                  </td>
                  <td class="align-middle">
                    <?php
                      echo $this->Html->link(__(''), ['controller' => 'Projects','prefix'=>'Admin','action' => 'projectAssignView', $project->id],['class'=>'fa-solid fa-eye  mx-3']); 
                      if($project->delete_status == 0){
                        echo $this->Form->postLink(__(''), ['controller' => 'Projects','prefix'=>'Admin','action' => 'projectDeleteRecover', $project->id], ['class'=>'fa-solid fa-recycle restore','id'=>'recycle',]);
                      }else{
                        echo $this->Form->postLink(__(''), ['controller' => 'Projects','prefix'=>'Admin','action' => 'projectDeleteRecover', $project->id], ['class'=>'fa-sharp fa-solid fa-trash delete','id'=>'delete']);
                      }
                    ?>
                  </td>
                </tr>
                <?php $count++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>