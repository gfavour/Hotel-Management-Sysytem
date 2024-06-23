$(function(){
    
    $('#booking_form').hotelsng_validator({before:confirm_room_selected});
    
    var booked_rooms = new Array();
    var num_nights = 0;
    
    
    calculate_booking_value();
    $('.booking').change(function(){    
        calculate_booking_value();
    });
    
    
    $('.add-a-room').change(function(){
        
        var id = $(this).attr('data-room-id');
        var name = $(this).attr('data-room-name');
        var price = parseInt($(this).attr('data-room-price'));
        var count = parseInt($(this).val());
        
        if(count === 0){
            
            remove_room(id);
            
        }else{
            add_room({id: id, name: name, price: price, num: count});
        }
        
        calculate_booking_value();
            
    });
    
    
    function room_exist(id){
        for(var i =0; i < booked_rooms.length; i++){
            var room = booked_rooms[i];
            if(room.id === id){
               return i;
            }
        }
        
        return -1;
    }
    
    function remove_room(id){
        var i = room_exist(id);
        
         if(i != -1){
            booked_rooms.splice(i, 1);
         }
            
    }
    
    
    
    function add_room(room){
        var exist = room_exist(room.id);
        if(exist != -1){
            booked_rooms[exist]['num'] = room.num;    
        }else{
            booked_rooms.push(room);
        }    
    }
    
    function calculate_booking_value(){
        
        
        var booking = {};
        var rooms = [];
        
        var checkin = $('#checkin').val();
        var checkout = $('#checkout').val();
        
        if(!checkin || !checkout){
            clearRender("booking-holder");
            return;
        }
        
        var checkin_date = new Date(checkin);
        var checkout_date = new Date(checkout);
        
        
        
        var elapsed = checkout_date - checkin_date;
        num_nights = elapsed/(1000*60*60*24);
        
        if(num_nights === NaN || num_nights === null || num_nights === undefined || num_nights === 0 || num_nights < 0){
            clearRender("booking-holder");
            return;
        }
        
        booking.nights = (num_nights > 1)? num_nights+" Nights": num_nights+" Night";
        display_num_nights(booking.nights);
        
        if(booked_rooms.length === 0){
            
            clearRender("booking-holder");
            return;
        }
        
        var total_price = 0;
        for(var i in booked_rooms){
            var room = booked_rooms[i];
            
            var sub = parseInt(room.num) * parseInt(room.price) * num_nights;
            rooms.push({name: room.name, id: room.id, price: room.price.format(2, 3, ',', '.'), num: room.num, sub_total: sub.format(2, 3, ',', '.')});
            
            total_price += sub;
        }
        
        booking.total_price = total_price.format(2, 3, ',', '.');
        booking.rooms = rooms;
        
        add_booked_rooms();
        
        
        render("booking-table-template", "booking-holder", booking);
    }
    
    function display_num_nights(nights){
        render("nights-template", "duration_nights", {duration: nights});
        
    }
            
    function render(template_id, destination_id, context){
        var source   = $("#"+template_id).html();
        var template = Hogan.compile(source, {delimiters: '[[ ]]'});
        var compiled_html = template.render(context);
            
        $("#"+destination_id).html(compiled_html);
    }
    
    function clearRender(destination_id){
        $("#"+destination_id).html("");
    }
    
    function add_booked_rooms(){
        $('input[name="booked_rooms"]').val(JSON.stringify(booked_rooms));
    }
    
    Number.prototype.format = function(n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
    
    function confirm_room_selected(event){
        if(!booked_rooms.length){
            alert("Please select rooms");
            event.preventDefault();
        }
    }
    
});