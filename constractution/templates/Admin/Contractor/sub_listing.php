<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Sub Contaractors</h6>
          </div>
        </div>
        <div id="loader"></div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="table_id">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr No:</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Sub-Contractor Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delete Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active/Inactive</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Approve</th>
                  <th class="text-secondary opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = 1;
                foreach ($users as $user) { ?>
                  <tr>
                    <td>
                      <div>
                        <?php echo $count++; ?>
                      </div>
                    </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo ucfirst($user->user_profile->first_name.' '.$user->user_profile->last_name);?></h6>
                         </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p><?php echo $user->email; ?></p>
                    </td>
                    <td>
                      <p ><?php if($user->delete_status == 0){
                          echo $this->Form->postLink(__(''), ['controller' => 'Contractor','prefix'=>'Admin','action' => 'subDeleteRecover', $user->id], ['class'=>'fas fa-trash-restore restore','data-toggle'=>'tooltip','title'=>'Restore','data-placement'=>'top','id'=>'recycle']);
                        }else{
                          echo $this->Form->postLink(__(''), ['controller' => 'Contractor','prefix'=>'Admin','action' => 'subDeleteRecover', $user->id], ['class'=>'fa-sharp fa-solid fa-trash delete','data-toggle'=>'tooltip','title'=>'delete','id'=>'delete'],);
                        }?>
                      </p>
                    </td>
                    <td class="align-middle text-sm">
                      <?php if ($user->status == 1) : ?>
                        <span class="badge badge-sm bg-gradient-success">
                          <?= $this->Form->postLink(__('Active'), ['controller' => 'Contractor', 'prefix' => 'Admin', 'action' => 'subActiveInactive', $user->id], ['class' => 'text text-light active']) ?>
                        </span>
                      <?php else : ?>
                        <span class="badge badge-sm bg-gradient-danger ">
                          <?= $this->Form->postLink(__("Deactive"), ['controller' => 'Contractor', 'prefix' => 'Admin', 'action' => 'subActiveInactive', $user->id], ['class' => 'text text-light inactive']) ?>
                        </span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php
                      if ($user->approve_status == 0) {
                      ?>
                        <a href="/admin/contractor/subApprov/<?php echo $user->id ?>" class="nav-link text-dark" id="load" data-confirm-message="Are you sure you want to Approve account?" onclick="if (confirm(this.dataset.confirmMessage)) { load();return true;} return false;">Approve</a>
                      <?php }else{?>
                        <i class="fas fa-check" style="color:#2f85ae;"></i>
                      <?php }?>
                    </td>
                    <td class="align-middle">
                      <?php
                        echo $this->Html->link(__(''), ['controller' => 'Contractor', 'prefix' => 'Admin', 'action' => 'subContractorEdit', $user->id], ['class' => 'fa-solid fa-eye  mx-3', 'data-toggle' => 'tooltip', 'title' => 'view', 'id' => $user->id]);
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  function load() {
    $('#loader').css({
      'position': 'fixed',
      'left': '0px',
      'top': '0px',
      'opacity': '0.6',
      'width': '100%',
      'height': '100%',
      'z-index': '9999',
      'background': 'url("/img/smartparcel-mail.gif") 50% 50% no-repeat rgb(249,249,249)'
    });
  }
</script>