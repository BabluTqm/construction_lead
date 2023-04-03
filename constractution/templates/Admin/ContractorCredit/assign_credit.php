<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Assign Credit</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="tabbedPanels"> <!-- begins the tabbed panels / wrapper-->

                        <ul class="tabs">
                            <li><a href="#panel1">General Contractor Credit</a></li>
                            <li><a href="#panel2">Sub Contractor Credit</a></li>
                        </ul>

                        <div class="panelContainer">
                            <div id="panel1" class="panel">
                                <table class="table table-bordered table-striped mt-3" id="table1">
                                    <thead>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Company</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0; ?>
                                        <?php
                                        //$value = array_diff_key($users, $already_assigned_users);  

                                        foreach ($gc_credit as $gc_user) {

                                        ?>
                                            <tr id="<?php echo $gc_user->user_id ?>">
                                                <td><?php echo ++$count; ?></td>
                                                <td> <?php echo $gc_user->user->user_profile->first_name.' '.$gc_user->user->user_profile->last_name; ?></td>
                                                <td> <?php echo $gc_user->user->email; ?></td>
                                                <td> <?php echo $gc_user->user->user_profile->phone; ?></td>
                                                <td> <?php echo $gc_user->user->user_profile->address1; ?></td>
                                                <td> <?php echo $gc_user->user->user_profile->company_name; ?></td>
                                                <td> <?php echo $this->Html->link(__('Add Credit'), [], ['class' => 'btn btn-outline-primary btn-sm me-3 gc-credit','data-id'=>$gc_user->user_id]) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                            <!-- end panel 1 -->

                            <!-- start panel 2 -->
                            <div id="panel2" class="panel">
                                <table class="table table-bordered table-striped mt-3" id="table2">
                                    <thead>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Company</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0; ?>
                                        <?php
                                        //$value = array_diff_key($users, $already_assigned_users);  

                                        foreach ($sc_credit as $sc_user) {
                                        ?>
                                            <tr id="<?php echo $sc_user->user_id ?>">
                                                <td><?php echo ++$count; ?></td>
                                                <td> <?php echo $sc_user->user->user_profile->first_name.' '.$sc_user->user->user_profile->last_name; ?></td>
                                                <td> <?php echo $sc_user->user->email; ?></td>
                                                <td> <?php echo $sc_user->user->user_profile->phone; ?></td>
                                                <td> <?php echo $sc_user->user->user_profile->address1; ?></td>
                                                <td> <?php echo $sc_user->user->user_profile->company_name; ?></td>
                                                <td> <?php echo $this->Html->link(__('Add Credit'), [], ['class' => 'btn btn-outline-primary btn-sm me-3 gc-credit','data-id'=>$sc_user->user_id]) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                            <!-- end panel 2 -->
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
     <!-- modal open  -->
     <div class="modal fade" id="add-credit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Credit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="float-end d-flex me-3">
               <h5 class=''>Total:</h5>&nbsp;<b id = 'total-credit'></b>&nbsp;&dollar;
                </div>
                </div>
                <div class="modal-body">
                    <?php echo $this->Form->create(null, ['id' => 'modal-form']) ?>
                    <fieldset>
                        <?php
                        //echo $this->Form->input('id', ['type'=>'text','id' => 'credit-id', 'class' => '']);
                        echo $this->Form->input('user_id', ['type'=>'hidden','id' => 'user-id', 'class' => '']);
                        echo $this->Form->input('total_credit', ['id' => 'credit', 'class' => 'form-control p-2','style'=>'border:1px solid black']);
                        ?>
                        <span class="credit-error" id="credit-error"></span>
                    </fieldset>
                    <?php echo $this->Form->button(__('Submit'), ['class'=>'btn btn-primary mt-3 mb-0 add_credits']) ?>
                    <?php echo $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
                             <!-- end modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
        $('.gc-credit').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
           url:'/admin/ContractorCredit/getGcCredit',
            type:'JSON',
            method:'get',
            data : {'id':id},
            success : function(response){
              var data = JSON.parse(response);
               if(data['status'] == 1){

                   $('#add-credit').modal('show');
                //    $('#credit-id').val(data['data']['id']);
                   $('#user-id').val(data['data']['user_id']);
                   $('#total-credit').text(data['data']['total_credit']);
                   $('#table-hide').load('/admin/services/serviceManagment #table-hide');
               }else{
                $('#add-credit').modal('show');
                $('#user-id').val(data['data']);
                $('#total-credit').text(0);
               }
                
            }
        })
        return false;
    });
    $('.add_credits').on('click',function(e){
        e.preventDefault();
        var data = $('#modal-form').serialize();
        // alert(data);return false;
        var credit = $('#credit').val();
        if(credit != ''){
        if(!$.trim(credit)){
            $('#credit-error').text('space not allowed').css('color','red');
        }else{
                  // alert(data);return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrfToken
              },
            url:'/admin/ContractorCredit/addCredits',
            type:'JSON',
            method:'POST',
            data :data,
            success : function(response){
                if(response == 1){
                    $('#modal-form').modal('hide');
                    window.location.href="/admin/ContractorCredit/assignCredit";
                }

            }
        });
    }
    }else{
        $('#credit-error').text('Please Credit field requiret').css('color','red');
    }
        return false;
    });

    </script>