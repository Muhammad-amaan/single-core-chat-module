   onlineusers();
   
   

   
     
function onlineusers(){

            var uid = $("#uid").val();

        $.ajax({
         type:'POST',
         url: 'server/api/onlineusers.php/onlineusers',
         data: {uid: uid},

         cache:false,
         success: function(data){
                   
                   var response = JSON.parse(data);
                   $(".control-sidebar-subheading").html(response.username);
           
          if(response.count){
            $("#countuser").html(response.count);       
          }

                   

          $.each(response, function(idx, obj) {
            $(".onlineusers").append('<li class="usersli user" data-id="'+obj.uid+'"><a href="javascript:void(0)" class="showPopup"><img src="'+obj.profilepic+'" class="img-avatar" /><div class="menu-info"><h4 class="control-sidebar-subheading"> '+obj.username+' </h4><p>Lives in karachi</p></div></a></li>');
            
            });
            
             //$(".onlineusers").html('<div class="useers">Hello</div>');

         }
        });
      
    }


     $('.chat_head').click(function(){
        $('.chat_body').slideToggle('slow');
    });
    $('.msg_head').click(function(){
        $('.msg_wrap').slideToggle('slow');
    });
    
    $('.close').click(function(){
        $('.msg_box').hide();
    });


   
    
    $(document).on('click', '.user', function(){

        $('.msg_wrap').show();
        var selected_user = $(this).find('h4').text();
        var selected_uid = $(this).attr('data-id');
        $('.chattingwith').text(selected_user);
        var receiver_msg_id = $('.msg_box').attr('chat-id', selected_uid);
        var shown = $('.msg_box').show();
getchat();
    });





    function getchat(){

              var sender_id = $('#uid').val();      
        var receiver_id = $('.msg_box').attr('chat-id');

        var dataa = {sender_id: sender_id, receiver_id: receiver_id}
        
                $.get('server/api/getchat.php', dataa, function(datas){
            var results = JSON.parse(datas);
            
            // Enable pusher logging - don't include this in production
            // Pusher.logToConsole = true;

            // var pusher = new Pusher('58bfd3799c27ae38b3dd', {
            //   encrypted: true
            // });

            // var channel = pusher.subscribe('test_channel');
            // channel.bind('my_event', function(data) {
            //   //alert("data.message");
            // });
            
             $(".msgslist").html("");
            $.each(results, function(idxs, objs) {
             var msgsender = objs.sender_id;

            if(msgsender == sender_id){
              //
              $(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"><img src="'+objs.profilepic+'"/></div><div class="msg_text_sender">'+objs.message+'</div></div>').insertBefore('.msg_push');
              
            //$(".msg_text_sender").css({'padding': '10px', 'min-height': '15px', 'margin-bottom': '5px', 'position': 'relative', 'margin-left': '10px', 'border-radius': '5px', 'word-wrap': 'break-word', 'box-shadow': 'inset 0px -1px 0px #d0d0d0', 'border-color': 'transparent #007acd transparent transparent', 'margin-right': '50px', 'background': '#ffffff', 'text-shadow': '0 -1px 0 rgba(0,0,0,.3)', 'background-image': '-webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgb(239, 239, 239))', 'box-shadow': '0 1px 0 0 rgba(0, 0, 0, 0.13), 0 2px 0px 0 rgba(210, 210, 210, 0.15), 0 0 0 1px rgba(234, 234, 234, 0.6), inset 0 0 0px 1px)'});
            //$(".sender_msg_li .img_avatar").css({'float':'right','width':'35px', 'height':'35px', 'background':'#C00', 'border-radius':'100px'});
            //$(".msg_text_sender:after").css({'content': '""', 'position': 'absolute', 'width': '0px', 'height': '0px', 'border': '10px solid', 'border-color': 'transparent #f8f8f8 transparent transparent', 'left': '-17px', 'top': '7px'});
            }
            else{
             
              //$(".msg_text_sender").css({'padding': '10px', 'min-height': '15px', 'margin-bottom': '5px', 'position': 'relative', 'margin-left': '10px', 'border-radius': '5px', 'word-wrap': 'break-word', 'color': '#fff', 'box-shadow': 'inset 0px -1px 0px #d0d0d0', 'border-color': 'transparent #007acd transparent transparent', 'margin-left': '50px', 'background': '#0083dc', 'text-shadow': '0 -1px 0 rgba(0,0,0,.3)', 'background-image': '-webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(2, 112, 183, 0.68))', 'box-shadow': '0 1px 0 0 rgba(0,0,0,.25), 0 2px 0px 0 rgba(0,0,0,0.15), 0 0 0 1px rgba(0, 83, 138, .6), inset 0 0 0px 1px rgba(255,255,255,.15)'});
              $(".msgslist").append('<div class="receive_msg_li"><div class="img_avatar"><img src="'+objs.profilepic+'"/></div><div class="msg_text_receiver">'+objs.message+'</div></div>').insertBefore('.msg_push');
               //$(".sender_msg_li .img_avatar").css({'float':'left','width':'35px', 'height':'35px', 'background':'#C00', 'border-radius':'100px'});
             // $(".msg_text_sender:after").css({'content': "", 'position': 'absolute', 'width': '0px', 'height': '0px', 'border': '10px solid', 'border-color': 'transparent #007acd transparent transparent', 'right': '-17px', 'top': '7px'});
            }
            //$(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"></div><div class="msg_text_sender">'+objs.message+'</div></div>').insertBefore('.msg_push');
       
            });

        });
        
    }






   //function getNotification(){
   //getchat();
   
   //}





        var sender_id = $('#uid').val();  

        var pusher = new Pusher('58bfd3799c27ae38b3dd');

    var channel = pusher.subscribe('msg_channel');
    channel.bind('my_event', function(data) {
       //$(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"></div><div class="msg_text_sender">'+data.msg+'</div></div>').insertBefore('.msg_push');
      //if(sender_id){
              //
              //alert("send");
              getchat();
              PushNotification();
               
              
              var msgsender = objs.sender_id;

            if(msgsender == sender_id){
           
              $(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"><img src=""/></div><div class="msg_text_sender">'+data.msg+'</div></div>').insertBefore('.msg_push');
              
            $(".msg_text_sender").css({'padding': '10px', 'min-height': '15px', 'margin-bottom': '5px', 'position': 'relative', 'margin-left': '10px', 'border-radius': '5px', 'word-wrap': 'break-word', 'box-shadow': 'inset 0px -1px 0px #d0d0d0', 'border-color': 'transparent #007acd transparent transparent', 'margin-right': '50px', 'background': '#ffffff', 'text-shadow': '0 -1px 0 rgba(0,0,0,.3)', 'background-image': '-webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgb(239, 239, 239))', 'box-shadow': '0 1px 0 0 rgba(0, 0, 0, 0.13), 0 2px 0px 0 rgba(210, 210, 210, 0.15), 0 0 0 1px rgba(234, 234, 234, 0.6), inset 0 0 0px 1px)'});
            $(".sender_msg_li .img_avatar").css({'float':'right','width':'35px', 'height':'35px', 'background':'#C00', 'border-radius':'100px'});
            $(".msg_text_sender:after").css({'content': '""', 'position': 'absolute', 'width': '0px', 'height': '0px', 'border': '10px solid', 'border-color': 'transparent #f8f8f8 transparent transparent', 'left': '-17px', 'top': '7px'});
            }
            else{
           //PushNotification();
           alert("receive");
 
              $(".msg_text_receiver").css({'padding': '10px', 'min-height': '15px', 'margin-bottom': '5px', 'position': 'relative', 'margin-left': '10px', 'border-radius': '5px', 'word-wrap': 'break-word', 'color': '#fff', 'box-shadow': 'inset 0px -1px 0px #d0d0d0', 'border-color': 'transparent #007acd transparent transparent', 'margin-left': '50px', 'background': '#0083dc', 'text-shadow': '0 -1px 0 rgba(0,0,0,.3)', 'background-image': '-webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(2, 112, 183, 0.68))', 'box-shadow': '0 1px 0 0 rgba(0,0,0,.25), 0 2px 0px 0 rgba(0,0,0,0.15), 0 0 0 1px rgba(0, 83, 138, .6), inset 0 0 0px 1px rgba(255,255,255,.15)'});
              $(".msgslist").append('<div class="receive_msg_li"><div class="img_avatar"><img src=""/></div><div class="msg_text_receiver">'+data.msg+'</div></div>').insertBefore('.msg_push');
               $(".receive_msg_li .img_avatar").css({'float':'left','width':'35px', 'height':'35px', 'background':'#C00', 'border-radius':'100px'});
             $(".msg_text_receiver:after").css({'content': "", 'position': 'absolute', 'width': '0px', 'height': '0px', 'border': '10px solid', 'border-color': 'transparent #007acd transparent transparent', 'right': '-17px', 'top': '7px'});
            }
            //$(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"></div><div class="msg_text_sender">'+objs.message+'</div></div>').insertBefore('.msg_push');
       

      $(".msgslist").animate({"scrollTop": $('.msgslist')[0].scrollHeight}, "slow");
    });
    
    $('.msg_input').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();

            var receiver_id = $('.msg_box').attr('chat-id');
            var sender_id = $('#uid').val();
            var sender_class = $("#send_class").attr('sender-class'); 
            var receiver_class = $("#receiver_class").attr('receiver-class');          
            var msg = $(this).val();

            $(this).val('');

            var message_data = {sender_id: sender_id, receiver_id: receiver_id, msg: msg}

            ajaxCall('server/api/sendmessage.php', message_data)

            
            //$(".msgslist").append('<div class="sender_msg_li"><div class="img_avatar"></div><div class="msg_text_sender">'+objs.message+'</div></div>').insertBefore('.msg_push');
       
          }

            
        
    });


  // AJAX request
  function ajaxCall(ajax_url, ajax_data) {
    $.ajax({
      type: "POST",
      url: ajax_url,
      dataType: "json",
      data: ajax_data,
      success: function(response, textStatus, jqXHR) {
        console.log(jqXHR.responseText);   
        getchat();
       
      },
      error: function(msg) {}
    });
  }
    


function PushNotification(){
    
    var sender_id = $('#uid').val();  

       // var pusher = new Pusher('58bfd3799c27ae38b3dd');

    //var channel = pusher.subscribe('msg_notify_channel');
    //channel.bind('my_notify', function(data) {
    
         var message_data = {sender_id: sender_id}

        $.ajax({
        type: "POST",
        url: "server/api/PushMessage.php",
        data: message_data,
        success: function(response, textStatus, jqXHR) {
          console.log(jqXHR.responseText);
          var results = JSON.parse(response);
          
           $.each(results, function(idxs, res) {
             var msgsender = res.sender_id; 
          //getchat();
          if(msgsender == sender_id){
          //$(".pushmessages").html("");
              
              }
              else
              {
              //alert("you have a new message");
             
              if(Notification.permission !== 'granted'){
    Notification.requestPermission();
  }
  n = new Notification(res.username, {
    body: res.message, 
    icon : res.profilepic
  });
  
  $('<audio id="chatAudio"><source src="lib/sounds/notify.ogg" type="audio/ogg"><source src="lib/sounds/notify.mp3" type="audio/mpeg"><source src="lib/sounds/notify.wav" type="audio/wav"></audio>').appendTo('body');
             $('#chatAudio')[0].play();
              $(".pushmessages").html("");
               $(".pushmessages").append('<li><a href="#"><div class="pull-left"><img src="'+res.profilepic+'" class="img-circle" alt="User Image"></div><h4>'+res.username+'<small><i class="fa fa-clock-o"></i> Just now</small></h4><p>'+res.message+'</p></a></li>');
              }
          });
         
        },
        error: function(msg) {}
   });
    
    //$(".msgslist").scrollTop($(".msgslist")[0].scrollHeight);
    //});
    
    }
