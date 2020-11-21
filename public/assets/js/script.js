$(document).ready(function(){
    
    //add item
    $("#validate_add_item").submit(function(event) {
        event.preventDefault();
        var item_type = $("#validate_item_type");
        var item_name = $("#validate_item_name");
        var item_code = $("#validate_item_code");
        var item_amount = $("#validate_item_amount");
        var error_array = [];
        validate_select(item_type , event , error_array);
        validate_input_text(item_name , event , error_array);
        validate_input_code(item_code , event , error_array);
        validate_input_amount(item_amount , event , error_array);

        if(!isValidArray(error_array))
        {
            $.ajax({
                url: '../ajax/add_item.php',
                type: 'POST',
                data: $('#validate_add_item').serialize(),
                dataType:'json',
                beforeSend: function(){
                    $("#alert_box").hide();
                },
                beforeSend: function(){
                    $('.get_spinner_add_item').addClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.add_item_button').text('');
                    $('.add_item_disable').attr('disabled' , true);

                 },
                success: function(data)
                {
                    $('.get_spinner_add_item').removeClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.add_item_button').text('Add Item');
                    $('.add_item_disable').attr('disabled' , false); 
                    if(data.type == 'error')
                    {
                        alert(data.msg);
                        $("#alert_box").show();
                        $("#alert_box").removeClass('alert-warning');
                        $("#alert_box").addClass('alert-warning');
                        $("#alert_box_text").html(data.msg);
                    }
                    else
                    {
                        $("#alert_box").show();
                        $("#alert_box").removeClass('alert-warning');
                        $("#alert_box").addClass('alert-success');
                        $("#alert_box_text").html(data.msg);
                    }
                    
                }
            });    
        }
        
    });
    $(".validate_add_post").submit(function(event) {
        event.preventDefault();
        var post_name = $("#validationPostTitle");
        var post_content = $("#post_editor");
        var error_array = [];
        validate_post_text(post_name , event , error_array);
        validate_post_content(post_content , event , error_array);
        if(!isValidArray(error_array))
        {
            var title = post_name.val();
            var type = $("#validationPostType").val();
            var content = post_content.val();
            alert(title);
            $.ajax({
                url: '../ajax/add_post.php',
                type: 'POST',
                data: {
                    'title' : title,
                    'type' : type,
                    'content' : content
                },
                dataType:'json',
                beforeSend: function(){
                    $('.get_spinner_add_post').addClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.add_post_button').text('');
                    $('.submit_post_create').attr('disabled' , true);

                 },
                success: function(data)
                {
                    $('.get_spinner_add_post').removeClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.add_post_button').text('Add Post');
                    $('.submit_post_create').attr('disabled' , true);
                    if(data.type == 'success')
                    {
                        $("#alert_add_post").show();
                        $("#alert_add_post").removeClass('alert-warning');
                        $("#alert_add_post").addClass('alert-success');
                        $("#alert_post").html(data.msg);
                    }
                    else
                    {
                        
                    }
                    
                }
            });    
        }
    });

    ////Update Item
    $(".validate_update_item").submit(function(event) {
        event.preventDefault();
        var item_name = $("#validate_item_update");
        var item_amount = $("#validate_update_number");
        var error_array = [];
        validate_input_text(item_name , event , error_array);
        validate_input_amount(item_amount , event , error_array);

        if(!isValidArray(error_array))
        {
            alert("you have entered correct values!!!!!");
        }
        
    });

    ////Delete Item track_sell_item
    $(".validate_delete_item").submit(function(event) {
        event.preventDefault();
        var item_name = $("#validate_delete_item");
        var error_array = [];
        validate_input_text(item_name , event , error_array);
        
        if(!isValidArray(error_array))
        {
            alert("you have entered correct values!!!!!");
        }
        
    });

    
    
    //check two dates
    function check_two_dates(from_date , to_date, event, error_array)
    {
        if(from_date.val() != '' &&  to_date.val() != ''){
            if(from_date.val() > to_date.val())
            {
                error_array.push('erro16');
                $(".error_greater_dates").text("From Date Field should not be greater than To date Field!!!").css({'color':'red'});
                from_date.css("box-shadow", "0 0 4px #811"); 
                to_date.css("box-shadow", "0 0 4px #811"); 
            }
            else
            {
                $(".error_greater_dates").text("").css({'color':'red'});
                from_date.css("box-shadow", "0 0 4px #181"); 
                to_date.css("box-shadow", "0 0 4px #181"); 
            }
        }
    }

    
    //check form date
    function validate_from_date(from_date, event, e_array)
    {
        if(!isValidName(from_date))
        {
            e_array.push('erro15');
           $(".error_from_date").text("This field is required!!!").css({'color':'red'}); 
            hightlight(from_date , isValidName(from_date));
        }
        else
        {
            $(".error_from_date").text("");
            hightlight(from_date , isValidName(from_date));
        }
    }
    //check to date
    function validate_to_date(from_date, event, e_array)
    {
        if(!isValidName(from_date))
        {
            e_array.push('erro15');
           $(".error_to_date").text("This field is required!!!").css({'color':'red'}); 
            hightlight(from_date , isValidName(from_date));
        }
        else
        {
            $(".error_to_date").text("");
            hightlight(from_date , isValidName(from_date));
        }
    }
    ////sell item
    $(".validate_sell_item").submit(function(event) {
        event.preventDefault();
        var item_type = $("#validate_sell_item_type");
        var item_name = $("#validate_sell_item_name");
        var item_order = $("#validate_sell_item_order");
        var item_amount = $("#validate_sell_item_number");
        var item_remark = $("#validate_sell_item_remark");
        var error_array = [];
         validate_select(item_type , event , error_array);
         validate_input_text(item_name , event , error_array);
         validate_input_order(item_order , event , error_array);
         validate_input_amount(item_amount , event , error_array);
         validate_input_remark_sell(item_remark , event , error_array);

        if(!isValidArray(error_array))
        {
            $.ajax({
                url: '../ajax/sell_item.php',
                type: 'POST', 
                data: { 'name' :item_name.val(),
                        'order' :item_order.val(),
                        'type': item_type.val(),
                        'count': item_amount.val(),
                        'remak': item_remark.val()
                        },
                dataType:'json',
                beforeSend: function() {
                    $("#alert_add_sell").hide();
                    $('.get_spinner_sell_item').addClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.sell_item_button').text('');
                    $('.submit_update').attr('disabled' , true);
                },
                success: function(data)
                {
                    $('.get_spinner_sell_item').removeClass('dashboard-spinner spinner-warning spinner-xs');
                    $('.sell_item_button').text('');
                    $('.submit_update').attr('disabled' , true);
                    if(data.type == 'error')
                    {
                        $("#alert_add_sell").show();
                        $("#alert_add_sell").removeClass('alert-warning');
                        $("#alert_add_sell").addClass('alert-warning');
                        $("#alert_add_box").html(data.msg);
                    }
                    else
                    {
                        $("#alert_add_sell").show();
                        $("#alert_add_sell").removeClass('alert-warning');
                        $("#alert_add_sell").addClass('alert-success');
                        $("#alert_add_box").html(data.msg);
                    }
                    
                }
            }); 
        }
        
    });
    //remark
    function validate_input_remark_sell(item_remark , event , e_array)
    {
       // alert('hi');
        if(!isValidName(item_remark))
        {
            e_array.push('erro5');
            $(".error_remark").text("This field is required!!!").css({'color':'red'}); 
            hightlight(item_remark , isValidName(item_remark));
        }
        else
        {
            $(".error_remark").text("");
            hightlight(item_remark , isValidName(item_remark));
        }
    }
    //select box
    function validate_select(select , event , e_array)
    {
        if(!isValidSelectType(select))
        {
            e_array.push('erro1');
            $(".error_type").text("This field is required!!!").css({'color':'red'});
            hightlight(select , 'invalid');
           
        }
        else
        {
            $(".error_type").text("");
            hightlight(select , 'valid');
        }
    }

    //text box
    function validate_input_text(text , event , e_array)
    {
        if(!isValidName(text))
        {
            e_array.push('erro2');
            $(".error_name").text("This field is required!!!").css({'color':'red'}); 
            hightlight(text , isValidName(text));
        }
        else
        {
            $(".error_name").text("");
            hightlight(text , isValidName(text));
        }
    }
    //text box
    function validate_post_text(text , event , e_array)
    {
        if(!isValidName(text))
        {
            e_array.push('erro2');
            $(".error_name").text("This field is required!!!").css({'color':'red'}); 
            hightlight(text , isValidName(text));
        }
        else
        {
            $(".error_name").text("");
            hightlight(text , isValidName(text));
        }
    }
    //text box
    function validate_post_content(text , event , e_array)
    {
        if(!isValidName(text))
        {
            e_array.push('erro2');
            $(".error_content").text("This field is required!!!").css({'color':'red'}); 
            hightlight(text , isValidName(text));
        }
        else
        {
            $(".error_content").text("");
            hightlight(text , isValidName(text));
        }
    }

    //order
    function validate_input_order(text , event , e_array)
    {
        if(!isValidName(text))
        {
            e_array.push('erro5');
            $(".error_order").text("This field is required!!!").css({'color':'red'}); 
            hightlight(text , isValidName(text));
        }
        else
        {
            $(".error_order").text("");
            hightlight(text , isValidName(text));
        }
    }

    

    //check code
    function validate_input_code(code , event , e_array)
    {
        if(!isValidName(code))
        {
            e_array.push('erro3');
            $(".error_code").text("This field is required!!!").css({'color':'red'}); 
            hightlight(code , isValidName(code));
        }
        else
        {
            $(".error_code").text("");
            hightlight(code , isValidName(code));
        }
    }
    //validate amount
    function validate_input_amount(item_amount , event , e_array)
    {
        
        if(!checkEmpty(item_amount))
        {
            e_array.push('erro4');
            $(".error_amount").text("This field is required").css({'color':'red'}); 
            hightlight(item_amount , checkEmpty(item_amount));
        }
        else if(!isValidAmount(item_amount))
        {
            e_array.push('erro4');
            $(".error_amount").text("Please type Integers only!!").css({'color':'red'}); 
            hightlight(item_amount , isValidAmount(item_amount));
        }
        else
        {
            $(".error_amount").text("");
            hightlight(item_amount , true);
        }
    }
        //check select values 
    function isValidSelectType(select)
    {
        return select.val() != '';
    }
        //check text values
    function isValidName(text)
    {
        return text.val().trim().length > 0;
    }

    //check integers
    function isValidAmount(amount)
    {
        var val = $.isNumeric(amount.val().trim());
        return val;
    }

    //check empty string
    function checkEmpty(value)
    {
        return value.val().trim().length > 0;
    }

    //check empty array
    function isValidArray(value)
    {
        return value.length > 0;
    }



    function hightlight(element , value)
    {
        var color = "#811";  // red
        if(value)
        {
            color = "#181";  // green
        }
        element.css("box-shadow", "0 0 4px " + color);
    }
});

