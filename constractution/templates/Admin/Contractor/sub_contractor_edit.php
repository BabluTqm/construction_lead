<style>
  form {
    margin-left: 445px;
  }

  label.form-label {
    width: 229px;
  }

  input.btn.btn-primary {
    margin-left: 152px;
    margin-top: 28px;
  }

  .service {
    margin: auto;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
            <h6 class="text-white text-capitalize ps-3">Sub Contaractor View</h6>
            <?php echo $this->Html->link(__('Back'), ['controller' => 'Contractor','prefix'=>'Admin','action' => 'subListing'], ['class'=>'btn btn-success','style'=>'margin-left: 1136px;']);?>
            <input type="hidden" id="sc" value="<?php echo $user->user_type ?>">
          </div>
          <div class="card-body px-0 pb-2">
            <div class="row">
              <?php echo $this->Form->create($user,['id'=>'admin-form']);?>
              <?php echo  $this->Form->control('user_profile.first_name',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.last_name',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('email',['class'=>'text-form','label'=>['class'=>'form-label'],'readonly'=>true]);?>
              <?php echo  $this->Form->control('user_profile.phone',['type'=>'phone','class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.address1',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.address2',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.state',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.city',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
              <?php echo  $this->Form->control('user_profile.pincode',['class'=>'text-form','label'=>['class'=>'form-label'],'type' => 'text']);?>
              <?php echo  $this->Form->control('user_profile.company_name',['class'=>'text-form','label'=>['class'=>'form-label']]);?>
            </div>
            <div class="row">
              <div class="service p-2 col-6">             
                <h4>Provided Services</h4>
                <?php $count = 1;foreach($services as $service){?>
                  <?php if(!empty($service->user_services)){?>
                    <input type="hidden" name="" id="user" value="<?php echo $user->id;?>">
                    <input class="checkit" type="checkbox" name="user_services[][service_id]"value="<?php echo $service->id?>" checked>
                    <label for="" style="margin-left:1px;"> <?php echo $service->service?></label>
                  <?php }else{?>
                    <input class="checkit" type="checkbox" name="user_services[][service_id]"value="<?php echo $service->id?>">
                    <label for="" style="margin-left:1px;"> <?php echo $service->service?></label>
                    <?php }}?>
                <?php echo $this->Form->submit(__('Update'),['class'=>'btn btn-primary']);?>
                <?php echo $this->Form->end();?>
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
  $(document).ready(function() {
    if ($('#sc').val() == 3) {
      $("input[type='checkbox']").change(function() {
        var maxAllowed = 5;
        var cnt = $("input[type='checkbox']:checked").length;
        if (cnt > maxAllowed) {
          this.checked = false;
          alert('Select maximum ' + maxAllowed + ' Levels!');
        }
      });
    }
  });
</script>