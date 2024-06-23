(function($){
    $.fn.hotelsng_validator = function(option){
        
	var errors = [];
	var func = option.callback || null;
    var prefunc = option.before || null;
		
	$(this).submit(function(event){

        if(prefunc){
            prefunc(event);
        }
		errors = [];
		
	
	   $(this).find("input").each(function(index, value){

            is_required(value);

            is_email_and_valid(value);

            is_phone_number_and_valid(value);            		

            must_be_same_as(value);

            date_must_be_greater_than(value);	

    	});


    	if(func){
        		func(event, errors);
    	}else{
            if(errors.length > 0){
                event.preventDefault();
                print_errors(errors);
		     }
            		
			
    	}


	
	});            
            
        
        /**
        *print error function
        */
        function print_errors(err){
            for(var i in err){
//		alert(JSON.stringify(err));
                $("#"+err[i]['id']).css("border", "1px solid red");
		var message = err[i]['message'];
		var error_selector = "small.data-error[for='"+err[i]['id']+"']";


		$(error_selector).text(message);
		$(error_selector).css("color", "red");
		$(error_selector).css("display", "block");
            }

                
		          
            
        }
    
        function clearError(id){
            var error_selector = "small.data-error[for='"+id+"']";
            $(error_selector).text("");
            $("#"+id).css("border", "1px solid #d1d1d1");
        }
        /**
        *List of validator functions below
        */
        
        function is_required(element){
            
            if($(element).attr("data-hotelsng-required")){
             
                if(!$(element).val()){
                                        
                   errors.push({id: $(element).attr('id'), message:'This field is required'});
                    
                }else{
                    clearError($(element).attr('id'));
                }
            }
            
          
           
        }
        
	function is_phone_number_and_valid(element){
		var regex = /^\+?[0-9]+$/i;
		if($(element).attr("data-hotelsng-phone-number")){
			if(!regex.test($(element).val())){
				errors.push({id: $(element).attr('id'), message:"Invalid phone number"});
			}else{
                clearError($(element).attr('id'));
            }
		}
		
	}
        
        function is_email_and_valid(element){
            var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            
            if($(element).attr("data-hotelsng-email")){
                if(!regex.test($(element).val())){
                    
                    errors.push({id:$(element).attr('id'), message:'Invalid email'});
                    
                }else{
                    clearError($(element).attr('id'));
                }
                
            }    
            
        }
        
        
        function must_be_same_as(element){
            
            if($(element).attr('data-hotelsng-must-be-same-as')){
                
                var element_two_id = "#"+$(element).attr('data-hotelsng-must-be-same-as');
                
                
                if($(element).val() !== $(element_two_id).val()){
                    
                    errors.push({id:$(element).attr('id'), message:$(element).attr('data-title')+" must be same as "+$(element_two_id).attr('data-title')});
                    
                    
                }else{
                    clearError($(element).attr('id'));
                }
                
            
            }
            
            
            
        }
        
        
        function date_must_be_less_than(element){
        
        
        }
        
        function date_must_be_greater_than(element){
            if($(element).attr('data-hotelsng-date-gt')){
                
                var element_two_id = "#"+$(element).attr('data-hotels-date-gt');
                
                var date_one = new Date($(element).val());
                var date_two = new Date($(element_two_id).val());
                
                if(date_one < date_two){
                    errors.push({id: $(element).attr('id'), message: $(element).attr('data-title')+" can not be less than "+$(element_two_id).attr('data-title')});
                    
                }else{
                    clearError($(element).attr('id'));
                }
                
                if(date_one === date_two){
                    errors.push({id: $(element).attr('id'), message: $(element).attr('data-title')+" can not be same as "+$(element_two_id).attr('data-title')});
                    
                }else{
                    clearError($(element).attr('id'));
                }
                
                
            }
            
            
        }
        
    };  
        
    
})(jQuery);