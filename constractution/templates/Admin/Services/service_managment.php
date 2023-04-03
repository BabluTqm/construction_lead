  <!-- // category table  -->
  <div class="row">
    <div class="col-12"id="table-hide">
      <div class="card my-4 py-2">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mb-4">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-4">
              <h6 class="text-white text-capitalize ps-3 ">Services</h6>
            </div>
            <?php echo $this->Html->link(__('Add Service'), [], ['class' => 'btn btn-outline-primary btn-sm me-3 float-end mt-4', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#exampleModal']) ?>
          </div>
        <table id="table_id" class="display">
          <thead>
              <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sr no:-</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Service Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $i=1 ;foreach ($services as $service) {?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $service->service ?></td>
                  <td>

                      <?php
                      if ($service->service_status == 1) {
                      ?>

                        <span class="text">
                          <?php
                          echo 'Active';
                          ?>
                        </span>
                      <?php
                      } else {
                      ?>
                        <span class="text">
                        <?php
                        echo "Deleted";
                      }
                    
                        ?>
                        </span>


                    </td>
                    <td class="align-middle text-center">
                      <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold"> <?php echo $this->Html->link(__(''), ['action' => '',], ['class' => 'fa-solid fa-pen-to-square mx-2 edit', 'data-id' => $service->id]); ?></span>
                        <span class="me-2 text-xs font-weight-bold">
                          <?php
                          if ($service->service_status == 1) {
                            echo $this->Form->postLink(__(''), ['controller' => 'Services', 'prefix' => 'Admin', 'action' => 'deleteRecoverService', $service->id], ['class' => 'fa-sharp fa-solid fa-trash delete', 'id' => 'recycle', 'data-id' => $service->id]);
                          } else {
                            echo $this->Form->postLink(__(''), ['controller' => 'Services', 'prefix' => 'Admin', 'action' => 'deleteRecoverService', $service->id], ['class' => 'fa-solid fa-recycle restore', 'id' => 'delete', 'data-id' => $service->id]);
                          }
                          ?>
                        </span>
                        <div>
                        </div>
                    </td>
                </tr>
              <?php  }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- //model -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo $this->Form->create(null, ['id' => 'modal-form']) ?>
          <fieldset>
            <?php
            echo $this->Form->input('service', ['id' => 'service','class'=>'form-control p-2','style'=>'border: 1px solid black;']);
            ?>
            <span class="service-error" id="service-error"></span>
          </fieldset>
          <?php echo $this->Form->button(__('Submit'),['class'=>'btn btn-primary mt-2']) ?>
          <?php echo $this->Form->end() ?>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo $this->Form->create(null, ['id' => 'edit-form']) ?>
          <fieldset>
            <legend><?= __('Edit Service') ?></legend>
            <?php
            echo $this->Form->input('id', ['type' => 'hidden', 'id' => 'service-id','class'=>'form-control']);
            echo $this->Form->input('service', ['id' => 'get-service','class'=>'form-control p-2', 'style'=>'border: 1px solid black;']);
            ?>
             <span class="service-error" id="service_error_edit"></span>
          </fieldset>
          <?php echo $this->Form->button(__('Submit'), ['class' => 'edit-form btn btn-primary mt-2']) ?>
          <?php echo $this->Form->end() ?>
        </div>

      </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document)
      .ready(function () {
        $('#table_id')
          .DataTable();
      });
    </script>
