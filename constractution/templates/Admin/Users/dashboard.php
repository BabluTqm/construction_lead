<div class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Owners</h6>
          </div>
        </div>
        <div id="loader"></div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="table_id">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Sr No:</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">Delete Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">Active/Inactive</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center  ">Approve</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center  ">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                 $counter= 0;
                  foreach($users as $user){?>
                <tr>
                  <td>
                    <p class="text-ms font-weight-bold mb-0"><?php echo  ++$counter ;?></p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class=" flex-column ">
                        <h6 class="mb-0 text-sm"><?php echo ucfirst($user->user_profile->first_name.' '.$user->user_profile->last_name);?></h6>
                        <p class="text-xs text-secondary mb-0"></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-ms font-weight-bold mb-0 text-center"><?php echo $user->email ;?></p>
                  </td>
                  <td>
                    <p class="text-ms font-weight-bold mb-0 text-center">
                      <?php
                        if($user->delete_status == 0){
                          echo $this->Form->postLink(__(''), ['controller' => 'users','prefix'=>'Admin','action' => 'deleteRecover', $user->id], ['class'=>'fa-solid fa-recycle restore','data-toggle'=>'tooltip','title'=>'Recycle','data-placement'=>'top','id'=>'recycle']);
                        }else{
                          echo $this->Form->postLink(__(''), ['controller' => 'users','prefix'=>'Admin','action' => 'deleteRecover', $user->id], ['class'=>'fa-sharp fa-solid fa-trash delete', 'data-toggle'=>'tooltip','title'=>'delete','id'=>'delete']);
                        }
                      ?>
                   </p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <?php if($user->status == 1){ ?>
                      <span class="badge badge-sm bg-gradient-success">
                        <?= $this->Form->postLink(__('Active'), [ 'controller' => 'users','prefix'=>'Admin','action' => 'activeInactive', $user->id], ['class'=>'text text-light active']) ?>                     
                      </span>
                    <?php }else{ ?> 
                      <span class="badge badge-sm bg-gradient-danger ">
                        <?= $this->Form->postLink(__("Deactive"), [ 'controller' => 'users','prefix'=>'Admin','action' => 'activeInactive', $user->id], ['class'=>'text text-light inactive']) ?>
                      </span>
                    <?php }?>
                  </td>
                  <td class="align-middle text-center">
                    <?php
                      if($user->approve_status == 0){ 
                        ?>
                        <a href="/admin/users/approv/<?php echo $user->id?>" class="nav-link text-dark" id="load" data-confirm-message="Are you sure you want to Approve account?" onclick="if (confirm(this.dataset.confirmMessage)) { load();return true;} return false;">Approve</a>
                        <?php
                      }else{
                        ?><i class="fas fa-check" style="color:#2f85ae;"></i><?php
                      }
                    ?>
                  </td>
                  <td class="align-middle text-center">
                    <?php
                    echo $this->Html->link(__(''), ['controller' => 'users','prefix'=>'Admin','action' => 'ownerEdit', $user->id],['class'=>'fa-solid fa-eye  mx-3', 'data-toggle'=>'tooltip','title'=>'view' ,'id'=>$user->id]);
                    ?>
                  </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">  
    function load(){
        $('#loader').css({'position':'fixed',
                         'left': '0px', 
                         'top': '0px' ,
                         'opacity':'0.6', 
                         'width': '100%',  
                         'height': '100%',  
                         'z-index': '9999',  
                         'background':'url("/img/smartparcel-mail.gif") 50% 50% no-repeat rgb(249,249,249)'  
         });
    }
  </script>  
