<?php
    $myTemplates = [
        'inputContainer'=>'<div class="input-group input-group-outline">{{content}}</div>'
    ];
    $this->Form->setTemplates($myTemplates);
    ?>

    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
       
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Create Password</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook-f text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                 <?php echo $this->Form->create(null,['id'=>'form'])?>
                
                 <?php echo $this->Form->control('password',['required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                 <?php echo $this->Form->control('confirm_password',['type'=>'password','required'=>false,'class'=>'form-control mb-3','label'=>['class'=>'form-label']])?>
                 
                 <?= $this->Form->button(__('Create Password'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0']) ?>
               </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>