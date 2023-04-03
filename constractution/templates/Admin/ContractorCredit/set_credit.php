<?php
$myTemplates = [
    'inputContainer'=>'<div class="input-group input-group-outline ">{{content}}</div>'
];
$this->Form->setTemplates($myTemplates);
?>
<style>
  .error{
    width: auto;
  }
  .input-group> .form-control{
    width: 100%;
  }
</style>
<div class="container px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6 user-view">
        <div class="row">
            <div class="row">
                <div class="col">
                    <div class="card card-plain h-100">
                  
                    <div class="card-header">
                    <h4 class="font-weight-bolder text-center">Set Credit</h4>
                    <p class="mb-0 text-center">Enter details to set credit</p>
                    </div>
                    <div class="card-body">
                            <?php echo $this->Form->create($credit , ['id' => 'credit-form']) ?>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-3">
                                  <!-- <input type="hidden" name="user_id" value="<?php echo $auth->id?>"> -->
                                    <label for="">Enter Credit Value*</label>
                                    <?php echo $this->Form->control('credit', ['required' => false, 'class' => 'form-control ', 'label' =>false]) ?>
                                    <?= $this->Form->button(__('Set Credit'),['class' => 'btn btn-lg bg-gradient-primary w-50 ms-4 mt-4 mb-0']) ?>
                                    <?php echo $this->Form->end() ?>
                                </div>
                              <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========Add Category====== -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function () {

    jQuery.validator.addMethod("noSpace",
    function (value, element) {
        return value == "" || value.trim().length != 0;
    },
    "**No space please fill the Character"
    );
    /********************************************************************************/  
    jQuery.validator.addMethod("lettersonly", 
    function(value, element) {
    return this.optional(element) || /^[a-z]/i.test(value);
    }, "**Please Letters only Not fill Space"); 


$("#credit-form").validate({

  rules: {
       credit:{
        required:true,
        minlenth:2,
        maxlength:5,
       }
  },

  messages: {
    credit:{
        required:"Pllease enter the credit value",
    }
  },

  errorPlacement: function (error, element) {
    if (element.is(":radio")) {
      error.appendTo(".pr");
    } else {
      error.insertAfter(element);
    }
  },

  

});
});
</script>
