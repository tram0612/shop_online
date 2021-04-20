$(function(){
		$.ajaxSetup({
		    headers:
		    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
	 $('.reply').click(function(e) {
		e.preventDefault();
		if(user_id == ''){
			alert('Vui lòng đăng nhập để bình luận!');
		}
		else{
		 	$('.form_reply').hide();
		 	$('#form_reply1').show();
		 	$(this).closest('.media-body').find('.form_reply').show();
		 	$(this).closest('.media-body').find('.cmt').focus();
		}
	 
	 //alert($('input[name="parent_id"]').val());
	});
	 
	 $('.form_reply').submit(function(e){

             e.preventDefault();
            /*alert('helo');*/
           
            var route = $(this).attr('action');
            // alert(route);
            var parent_id = $(this).find('input[name="parent_id"]').val();
            var user_id = $(this).find('input[name="user_id"]').val();
            var blog_id = $(this).find('input[name="blog_id"]').val();
            var cmt = $(this).find('.cmt').val();
            
           $.ajax({
                type:'POST',
                url:route,
                data:{
                   
                  'user_id':user_id,
                  'blog_id':blog_id,
                  'cmt':cmt,
                  'parent_id':parent_id,
                },
                success:function (data) {
                  $('.response-area').html(data.html);
                  $('.form_reply').hide();
                  $('#form_reply1').show();
                 	$('.cmt').text('');
                },
                error: function (e) {
                        console.log((e.responseJSON.errors));
                    }
            }, "json");
            //alert(route);
           
        });
	 $('.ratings_stars').hover(
        // Handles the mouseover
        function() {
            $(this).prevAll().andSelf().addClass('ratings_hover');
            // $(this).nextAll().removeClass('ratings_vote'); 
            
        },
         function() {
            $(this).prevAll().andSelf().removeClass('ratings_hover');
        //     // set_votes($(this).parent());
         }
    );

	// $('.ratings_stars').click(function(e){
	// 	// e.preventDefault();
	// 	 if(user_id !== ''){
	// 		var blog_id = $(this).closest('.rate').attr('blog_id');
	// 		 alert(blog_id);
	// 		// alert(user_id);
	// 		var route = $(this).closest('.rate').attr('route');
	// 		alert(route);
	// 		var value =  $(this).attr('value_rate');
	//         alert(value);
	    	
	        

	//         $.ajax({
 //                type:'POST',
 //                url:route,
                
 //                data:{
                   
 //                  'user_id':user_id,
 //                  'blog_id':blog_id,
 //                  'value':value,
 //                },
 //                success:function (data) {
 //                	if ($(this).hasClass('ratings_over')) {
	// 			            $(this).prevAll().nextAll().andSelf().removeClass('ratings_over');
	// 			            $(this).prevAll().andSelf().addClass('ratings_over');
	// 				        } else {
	// 				        	$(this).prevAll().andSelf().addClass('ratings_over');
	// 				        }
 //                  // $('.response-area').html(data.html);
 //                  // $('.form_reply').hide();
 //                  // $('#form_reply1').show();
 //                 	// $('.cmt').text('');
 //                },
 //                // error: function (e) {
 //                //         console.log((e.responseJSON.errors));
 //                //     }
 //            });
 //    	}
 //    	else{
 //    		alert('Vui lòng đăng nhập để đánh giá !')
 //    	}
 //    });


});