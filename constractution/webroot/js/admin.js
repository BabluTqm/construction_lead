$(document).ready(function () {
      jQuery.validator.addMethod("noSpace",
      function (value, element) {
        return value == "" || value.trim().length != 0;
      },
      "No space please fill the Character"
    );

  /******************Search Function***************/
  // $("#key").on("keyup", function() {  
  //   var value = $(this).val().toLowerCase();  
  //   $("td").filter(function() {
  //   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  //   });
  // });

  $("#key").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  /*****************************Password Method ********************************/
    jQuery.validator.addMethod("Uppercase",
    function (value) {
      return /[A-Z]/.test(value);
    },
    "Your Password must contain at least one UpperCase Character"
   );

    jQuery.validator.addMethod("lowercase",
    function (value) {
      return /[a-z]/.test(value);
    },
    "Your Password must contain at least one Lower Character"
    );

    jQuery.validator.addMethod("specialChar",
    function (value) {
      return /[!@#$%&*_-]/.test(value);
    },
    "Your Password must contain at least one Special Character"
    );

    jQuery.validator.addMethod("Numberic",
    function (value) {
      return /[0-9]/.test(value);
    },
    "Your Password must contain at least one Numeric Value"
    );


   /********************************************************************************/  
    jQuery.validator.addMethod("lettersonly", 
    function(value, element) {
      return this.optional(element) || /^[a-z]/i.test(value);
    }, "**Please Letters only Not fill Space"); 


    //register form validation
  
    $("#form").validate({
        rules: {
                
          project_name:"required",
          "user_profile[first_name]":"required",
          state:"required",
          city:"required",
          project_address1:{required:true},
          pincode:{
          required:true,
          digits:true,
          minlength:6,
          maxlength:6,
        },

        password: {
          required: true,
          noSpace: true,
          Uppercase: true,
          lowercase: true,
          specialChar: true,
          Numberic: true,
          },
  
        email: {
            required: true,
            noSpace: true,
        },



      },
      

        messages: {
          project_name:{
              required:"Please enter the project name",
          },
          "user_profile[first_name]":{
              required:"Please enter the owner name",
          },
          state:{
              required:"Please enter the state of project",
          },
          city:{
              required:"Please enter the city of project",
          },
          project_address1:{
              required:"Please enter the address of project",
          },
          pincode:{
              required:"Please enter the pincode of project area",
             
          },
          email: {
            required: "Please enter a email",
            email: "Please enter valid email",
          },
      
        password: {
          required: "Please enter a password",

        },
          

        },

    

        errorPlacement: function (error, element) {
          if (element.is(":radio")) {
            error.appendTo(".pr");
          } else {
            error.insertAfter(element);
          }
        },
    });
    
    $("#admin-form").validate({
        rules: {
                
          email:{
            required:true,
            email:true,
          },
          "user_services[][service_id]":{
            required:true,
          },
          "user_profile[first_name]":"required",
          "user_profile[last_name]":"required",
          "user_profile[phone]":"required",
          "user_profile[address1]":"required",
          "user_profile[state]":"required",
          "user_profile[city]":"required",
          "user_profile[pincode]":{
             required:true,
             digits:true,
             maxlength:6,
             minlength:6,
           },
          "user_profile[company_name]":"required",
      },
      

        messages: {
          email:{
              required:"Please enter the project name",
              email:"Please enter a valid email",
          },
          "user_profile[first_name]":"Please enter first name",
          "user_profile[last_name]":"Please enter  last name",
          "user_profile[phone]":"Please enter  contact number",
          "user_profile[address1]":"Please enter address",
          "user_profile[state]":"Please enter state",
          "user_profile[city]":"Please enter city",
          "user_profile[pincode]":{
            required:"Please enter pincode",
            minlength:"Pincode Must be 6 digit",
            maxlength:"Pincode Must be 6 digit"
          },
          "user_profile[company_name]":"Please enter contarctor's company name",
          "user_services[][service_id]":{
            required:"Please select atleast one service"
          },
  
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

/***********sweet alert show******** */
// active swal   
$(".active").attr("onclick", "").unbind("click");
$('.active').on('click',function (e) {
  e.preventDefault();
let inactive_form = $(this).parent().find('form');
swal({
    title: "Inactive",
    text: "Are sure You want to inactive this user",
    icon: "warning",
    buttons: true,
}).then((willDelete) => {
        if (willDelete) {
            inactive_form.submit();
        }
});
});

$(".inactive").attr("onclick", "").unbind("click");
$('.inactive').on('click',function (e) {
  e.preventDefault();
let active_form = $(this).parent().find('form');
swal({
    title: "Active",
    text: "Are sure You want to active this user",
    icon: "warning",
    buttons: true,
}).then((willDelete) => {
        if (willDelete) {
            active_form.submit();
        }
});
});

$(".delete").attr("onclick", "").unbind("click");
$('.delete').on('click',function (e) {
  e.preventDefault();
let delete_form = $(this).parent().find('form');
swal({
    title: "Delete",
    text: "Are sure You want to delete this user",
    icon: "warning",
    buttons: true,
}).then((willDelete) => {
        if (willDelete) {
            delete_form.submit();
        }
});
});
$(".restore").attr("onclick", "").unbind("click");
$('.restore').on('click',function (e) {
  e.preventDefault();
let restore_form = $(this).parent().find('form');
swal({
    title: "Restore",
    text: "Are sure You want to restore this user",
    icon: "warning",
    buttons: true,
}).then((willDelete) => {
        if (willDelete) {
            restore_form.submit();
        }
});
});