$(document).ready(function () {
    jQuery.validator.addMethod("noSpace",
      function (value, element) {
        return value == "" || value.trim().length != 0;
      },
      "No space please fill the Character"
    );

/Search Function*/
    $("#key").on("keyup", function() {  
    var value = $(this).val().toLowerCase();  
    $("tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  /********************Password Method ******************/
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
    }, "Please Letters only Not fill Space"); 


    //register form validation
    $("#form").validate({
      rules: {

        email: {
            required: true,
            noSpace: true,
        },

      password: {
      required: true,
      noSpace: true,
      Uppercase: true,
      lowercase: true,
      specialChar: true,
      Numberic: true,
      },

      confirm_password: {
        required: true,
        noSpace: true,
        equalTo: "#password",
      },

        'user_profile[address1]': {
          required: true,
          noSpace: true,
        },
      
        'user_profile[phone]': {
          required: true,
          noSpace: true,
          digits: true,
          minlength: 10,
          maxlength: 10,
        },
    
        'user_profile[state]': {
          required: true,
        
        },


      'user_profile[first_name]': {
        required: true,
        noSpace: true,
        lettersonly:true,
        maxlength: 12,
      },
      'user_profile[last_name]': {
        required: true,
        noSpace: true,
        lettersonly:true,
        maxlength : 12,
      },

      'user_profile[address1]': {
        required: true,
      },
    
      'user_profile[phone]': {
        required: true,
        noSpace: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
  
      'user_profile[state]': {
        required: true,
        noSpace: true,
        lettersonly:true,
      },
      'user_profile[city]' : {
        required: true,
        noSpace: true,
        lettersonly:true,
        
      },

      'user_profile[pincode]' : {
          required: true,
          noSpace: true,
          digits: true,
          minlength: 6,
          maxlength: 6,
        
      },

    // validation for create project form
      project_name: {
        required: true,
        noSpace: true,
        lettersonly:true,
        //maxlength: 12,
      },
   
      project_address1: {
        required: true,
        noSpace: true,
        lettersonly:true,
      // minlength: 6,
      },

      state: {
        required: true,
        noSpace: true,
      },
    city : {
        required: true,
        noSpace: true,
        
      },
    property_type : {
        required: true,
        noSpace: true,
        
      },

     pincode : {
        required: true,
        noSpace: true,
        digits: true,
        minlength: 6,
        maxlength: 6,
        
      },
  
     },
  
      messages: {

        email: {
            required: "Please enter a email",
            email: "Please enter valid email",
          },
      
        password: {
          required: " Please enter a password",

        },
        confirm_password: {
          required: " Please confirm your password",
          minlength: " Your password must be consist of at least 6 characters",
          equalTo: " Please enter the same password as in password",
        },

        user_type : {
            required: "Please select the user type",
        },

        'user_profile[first_name]': {
          required: " Please enter a First Name",
          maxlength : "Please fill only 12 character in First name",
          
        },
        'user_profile[last_name]': {
          required: " Please enter a Last Name",
          maxlength : "Please fill only 12 character in First name",
          
        },

        'user_profile[address1]': {
          required: " Please enter Address",
          
        },
      
        'user_profile[phone]': {
          required: " Please enter a phone Number",
          digits: "Only numbers are allowed",
          minlength: " Your phone number must consist 10 Digits",
          maxlength: " Phone number only 10 Digits",
        },
        
      
        'user_profile[state]': {
            required: "Please enter your state",
        },
        'user_profile[city]': {
            required: "Please enter your city",
        },
        'user_profile[pincode]': {
          required: "please enter your pincode",
          digits: "Only numbers are allowed",
          minlength: " Your pincode must consist 6 Digits",
          maxlength: " Phone pincode must consist 6 Digits",
        },

      /////////////////////////////Project/////////////////////////////////

        first_name: {
          required: " Please enter a First Name",
          maxlength : "Please fill only 12 character in First name",
          
        },

     address1: {
          required: " Please enter Address",
          
        },

     state: {
            required: "Please enter your state",
        },
       city: {
            required: "Please enter your city",
        },
        property_type: {
            required: "Please select your property type",
        },
      pincode: {
            required: "please enter your pincode",
            digits: "Only numbers are allowed",
            minlength: " Your pincode must consist 6 Digits",
            maxlength: " Phone pincode must consist 6 Digits",
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

  // validation for gcsc profile
  $("#gcsc-form").validate({
      rules: {

        'user_services[][service_id]': {
              required: true,
              
          },
          email: {
              required: true,
              noSpace: true,
          },

          'user_profile[address1]': {
            required: true,
            noSpace: true,
          },
        
          'user_profile[phone]': {
            required: true,
            noSpace: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
          },
      
          'user_profile[state]': {
            required: true,
          
          },
          'user_profile[first_name]': {
            required: true,
            noSpace: true,
            lettersonly:true,
            maxlength: 12,
          },
          'user_profile[last_name]': {
            required: true,
            noSpace: true,
            lettersonly:true,
            maxlength : 12,
          },

          'user_profile[address1]': {
            required: true,
            noSpace: true,
          // minlength: 6,
          },
        
          'user_profile[phone]': {
            required: true,
            noSpace: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
          },
      
          'user_profile[state]': {
            required: true,
            noSpace: true,
            lettersonly:true,
          },
          'user_profile[city]' : {
            required: true,
            noSpace: true,
            lettersonly:true,
            
          },

          'user_profile[pincode]' : {
              required: true,
              noSpace: true,
              digits: true,
              minlength: 6,
              maxlength: 6,
            
          },
          'user_profile[company_name]' : {
              required: true,
              noSpace: true,
              lettersonly:true,
              
            
          },
        
     },

      messages: {

        'user_services[][service_id]': {
              required: " Please select your services",
            },
        
          email: {
              required: " Please enter a email",
              email: "Please enter valid email",
            },
        
          user_type : {
              required: "Please select the user type",
          },

          'user_profile[first_name]': {
            required: " Please enter a First Name",
            maxlength : "Please fill only 12 character in First name",
            
          },
          'user_profile[last_name]': {
            required: " Please enter a Last Name",
            maxlength : "Please fill only 12 character in First name",
            
          },

          'user_profile[address1]': {
            required: " Please enter Address",
            
          },
        
          'user_profile[phone]': {
            required: " Please enter a phone Number",
            digits: "Only numbers are allowed",
            minlength: " Your phone number must consist 10 Digits",
            maxlength: " Phone number only 10 Digits",
          },
          
        
          'user_profile[state]': {
              required: "Please enter your state",
          },
          'user_profile[city]': {
              required: "Please enter your city",
          },
          'user_profile[pincode]': {
              required: "please enter your pincode",
              digits: "Only numbers are allowed",
              minlength: " Your pincode must consist 6 Digits",
              maxlength: " Phone pincode must consist 6 Digits",
          },
          'user_profile[company_name]': {
              required: "please enter your pincode",
              digits: "Only numbers are allowed",
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