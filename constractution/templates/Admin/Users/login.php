<?php
    $myTemplates = [
        'inputContainer'=>'<div class="input-group input-group-outline">{{content}}</div>'
    ];
    $this->Form->setTemplates($myTemplates);
?>
<style>
  .message.error {
    color: red;
  }
</style>
  
<section class="vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Admin Login</h3>
            <?php echo $this->Flash->render() ?>
            <?php echo $this->Form->create(null , ['id' => 'form']) ?>
            <?php echo $this->Form->control('email',['required'=>false,'class'=>'form-control','label'=>['class'=>'form-label']])?>
            <?php echo $this->Form->control('password',['required'=>false,'class'=>'form-control mt-3','label'=>['class'=>'form-label mt-3']])?>    
            <?php echo $this->Form->submit(__('Login'),['class'=>'btn btn-primary btn-lg btn-block mt-3']); ?>
            <?php echo $this->Form->end() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>