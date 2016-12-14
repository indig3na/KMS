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
    
    //--------------------------CRUD add/update/delete -----------------------
    
    //add
    
    $('#kms-crud-add-btn').click(function(e) {
        e.preventDefault();
        var data = $(this).parent().parent().find('.kms-add-inp').serializeArray();
        data.push({name:'method',value:'insert'});
        $.ajax({
            url:'',
            type:'post',
            dataType:'json',
            data:data
        }).done(function(response){
            //reload on success, else show errors
        });
    });
    
    $('.kms-crud-update-btn').click(function(e) {
        e.preventDefault();
        crudUpdatePrepare.call(this);
    });
    
    //update
    
    function crudUpdatePrepare (){
        var tr = $(this).parent().parent();
        var val=[];
        tr.children('.kms-datacolumn').each(function(){
            val.push($(this).html());
            $(this).remove();
        });
        tr.prepend($('.kms-add-inp').clone());
        tr.find('.kms-add-inp').wrap('<td></td>');
        tr.find('.kms-add-inp').addClass('kms-update-inp');
        tr.find('.kms-update-inp').removeClass('kms-add-inp');
        tr.find('.kms-update-inp').each(function(){
            $(this).attr('value',(val.shift()));
        });
        $(this).html('Enrégistrer').off('click').click(function(e) {
            e.preventDefault();
            crudUpdate.call(this);
        });
    }    
    function crudUpdate(){
        var data = $(this).parent().parent().find('.kms-update-inp').serializeArray();
        data.push({name:'id',value:$(this).attr('value')},{name:'method',value:'update'});
        $.ajax({
            url:'',
            type:'post',
            dataType:'json',
            data:data
        }).done(function(response){
            //reload on success, else show errors
        });
    }
    
    //delete
    
    $('#kms-crud-delete-btn').click(function(e) {
        e.preventDefault();
        data=[{name:'id',value:$(this).attr('value')},{name:'method',value:'delete'}];
        $.ajax({
            url:'',
            type:'post',
            dataType:'json',
            data:data
        }).done(function(response){
            //reload on success, else show errors
        });
    });
});





