var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $('#modal-form').on('submit',function(e){
        e.preventDefault();
        var data = $('#service').val();
        if(data != ''){
        if(!$.trim(data)){
            $('#service-error').text('space not allowed').css('color','red');
        }else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrfToken
              },
            url:'/admin/services/addServices',
            type:'JSON',
            method:'POST',
            data : {'service':$.trim(data)},
            success : function(response){
                if(response == 1){
                    $('#exampleModal').modal('hide');
                    window.location.href="/admin/services/serviceManagment"; 
                    }else{
                        $('#service-error').text('Aleardy exits').css('color','red');
                    }
                   


            }
        })
    }
}else{
    $('#service-error').text('Please Service field requiret').css('color','red');
}

        return false;
    });
    // service edit 
    $('.edit').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
           url:'/admin/services/editDataGet',
            type:'JSON',
            method:'get',
            data : {'id':id},
            success : function(response){
             var data = JSON.parse(response);
            
                $('#edit').modal('show');
                $('#service-id').val(data['id'])
                $('#get-service').val(data['service']);
                $('#table-hide').load('/admin/services/serviceManagment #table-hide');

             }
        })
        return false;
    });

    // service edit 
    $('.edit-form').on('click',function(e){
        e.preventDefault();
        var data = $('#edit-form').serialize();
        var service = $('#get-service').val();
        if(service != ''){
        if(!$.trim(service)){
            $('#service_error_edit').text('space not allowed').css('color','red');
        }else{
        // alert(data);return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrfToken
              },
            url:'/admin/services/editService',
            type:'JSON',
            method:'POST',
            data :data,
            success : function(response){
                if(response == 1){
                    $('#edit').modal('hide');
                    window.location.href="/admin/services/serviceManagment";
                }else{
                    $('#service_error_edit').text('Aleardy exits').css('color','red');
                }

            }
        });
    }
    }else{
        $('#service_error_edit').text('Please Service field requiret').css('color','red');
    }
        return false;
    });
   //view service
    $('.view').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
           url:'/admin/projects/serviceView',
            type:'JSON',
            method:'get',
            data : {'id':id},
            success : function(response){
             $('#edit').modal('show');
               $('#show').html(response); 
            }
        })
        return false;
    });
    
    // assign project to contractor

    $("#assigned-form").submit(function(e){
        e.preventDefault();
        var checked = $('input[type="checkbox"]:checked').length;
        var debit = $('.credit').val();
        if(checked < 1){
            swal("Canceled!", "Please check atleast one checkbox!", "error");
        }else if(debit == ''){
            swal("Canceled!", "Please enter the credit ammount!", "error");

        }else{
        $('#loader_assign').css({'position':'fixed',
        'left': '0px', 
        'top': '0px' , 
        'opacity':'0.7',
        'width': '100%',  
        'height': '100%',  
        'z-index': '9999',  
        'background':'url("https://media.tenor.com/d0LM2F1ze8kAAAAC/smartparcel-mail.gif") 50% 50% no-repeat rgb(249,249,249)'  
         });
        var owner_user_id = $('#owner_user_id').val();
        var project_id = $('#project_id').val();
        var owner_email = $('#owner_email').val();
        var uarr = [];
        var arr = [];
        $('input[type="checkbox"]:checked').each(function () {
      
            uarr.push($(this).val());
            var ctr = $(this).closest('td').siblings().find('input:text').val();
            arr.push(ctr);
        });
        // console.log(uarr);return false;
        $.ajax({
                   
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            url:'/admin/projects/assign',
            type:'JSON',
            method:'POST',
            data:{
                'owner_user_id':owner_user_id,'project_id':project_id,'owner_email':owner_email,
                'user_id':uarr,'credit':arr,
            },
            success:function(response){

                if(response ==1){
                    swal({
                        icon: 'success',
                        title: 'Success',
                        text: 'This Contractor have assigned.',
                        type: 'success'
                      }).then(function() {
                        window.location.href = "/admin/projects/projectView/"+project_id;
                      })
                   
                    $('#loader_assign').css("visibility", "hidden");
                    // swal("Success!", "This Contractor have assigned!", "success");
                    // window.location.href = "/admin/projects/projectView/"+project_id;
                }
                if(response == 0){
                    alert('This Contractor Already have assigne');
                }   
            },
            beforeSend: function(){
               
            },
            complete: function(){
                $('#loader_assign').css("visibility", "hidden");
              }
        });
    }
    });
   
//check it
    $('.checkit').on('change',function(){
       
        var uid = $('#user').val();
        var id = $(this).val();
        $.ajax({
           url:'/admin/contractor/deteleServices',
            type:'JSON',
            method:'get',
            data : {'id':id,'uid':uid},
            success : function(response){
               if(response == 1){
                $('.checkit').checked = false;
               }
               
            }
        })
        return false;
    });
    $('.project_check').on('change',function(){
       
        var pid = $('#project_id').val();
        var id = $(this).val();
        // alert(pid+id);return false;
        $.ajax({
           url:'/projects/deteleServices',
            type:'JSON',
            method:'get',
            data : {'id':id,'pid':pid},
            success : function(response){
               if(response == 1){
                $('.checkit').checked = false;
               }
               
            }
        })
        return false;
    });
    $('.contractor').on('change',function(){
       
        var uid = $('#user_id').val();
        var id = $(this).val();
        // alert(pid+id);return false;
        $.ajax({
           url:'/contractors/deteleServices',
            type:'JSON',
            method:'get',
            data : {'id':id,'uid':uid},
            success : function(response){
               if(response == 1){
                $('.checkit').checked = false;
               }
               
            }
        })
        return false;
    });

// Sweet alert area//


   

   