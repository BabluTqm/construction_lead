
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo $this->Form->create($user,['id'=>'form','enctype'=>'multipart/form-data'])?>
      <?php echo $this->Form->control('email',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
     
      <?php echo $this->Form->control('user_profile.first_name',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.last_name',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.contact',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('user_profile.address',['class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
      <?php echo $this->Form->control('image',['type'=>'file','class'=>'form-control mb-3','label'=>['class'=>'form-label'],'required'=>false])?>
     
     
      <?= $this->Form->end()?>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>