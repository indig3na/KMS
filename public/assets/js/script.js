/**
 * Created by Etudiant on 13/12/2016.
 */
$(function() {
    
    // Homepage - Google Maps
    
    if(window.location.pathname.endsWith('/public/')){
        // scrolling offset handler
        var offset = 30;

        $('.navbar li a').click(function(event) {
            event.preventDefault();
            $($(this).attr('href'))[0].scrollIntoView();
            scrollBy(0, -offset);
        });
        //google map
        var myLatlng = new google.maps.LatLng(49.52273, 5.888959999999997);
        var mapOptions = {
            zoom: 15,
            center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"TamTam School"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);

        //contact form
        //alert('jquery');
        //console.log('ok');
        // hide messages
        $("#error").hide();
        $("#sent-form-msg").hide();
        $("#message").hide();

        // on submit...

        $("#cform").submit(function(e) {
            e.preventDefault();

            //required:

            //name
            var name = $("#cform#username").val();
            alert(name);
            if(name == ""){
                $("#error").fadeIn().html("<span>Name required.</span>");
                $("#cform#username").focus();
                return false;
            }

            // email
            var email = $("#cform#useremail").val();
            if(email == ""){
                $("#error").fadeIn().html("<span>Email required</span>");
                $("#cform#useremail").focus();
                return false;
            }

            // contact_no
            var phone = $("#cform#userphone").val();
            if(userphone == ""){
                $("#error").fadeIn().html("<span>Contact number required.</span>");
                $("#cform#userphone").focus();
                return false;
            }

            // Message
            var message = $("#cform#usermessage").val();


            // data string
            var dataString = $('#cform').serialize();
            // ajax
            $.ajax({
                method: 'POST',
                url:'action.php',
                //data : inputs,
                data: dataString,
                dataType: 'json'
            }).done(function(data){
                $("#sent-form-msg").fadeIn();
                $('#message').text(data);

            });

            return false;
        });
    }
    
    //CRUD update/delete
    
    if(window.location.pathname.endsWith('/app/manage/country')){
            $('.kms-update').click(function(e) {
                    e.preventDefault();
                    id = $(this).attr('value');
                    tr = $(this).parent().parent();
                    var val=[];
                    tr.children('.kms-datacolumn').each(function(){
                        val.push($(this).html());
                    });
                    tr.html($('#add').html());
                    tr.children('.kms-headercolumn').addClass('kms-datacolumn');
                    tr.children('.kms-datacolumn').removeClass('kms-headercolumn');
                    tr.children('.kms-datacolumn').each(function(){
                        $(this).children().attr('value',(val.shift()));
                    });
                   tr.find('.kms-add').addClass('kms-update').removeClass('kms-add').attr('value','Enrégistrer');
                   tr.find('input.kms-method').attr('method','update');
                   tr.children('.kms-action').append('<input type="hidden" name="id" value="'+id+'"/>')
                    
            });
    }    
});





