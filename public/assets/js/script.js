/**
 * Created by Etudiant on 13/12/2016.
 */
$(function () {

    //------------ Homepage - Google Maps-----------

    if (window.location.pathname.endsWith('/public/')) {
        // scrolling offset handler
        var offset = 30;

        $('.navbar li a').click(function (event) {
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
            title: "TamTam School"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);

        //-------------------------contact form-------------------------
        //alert('jquery');
        //console.log('ok');
        // hide messages
        $("#error").hide();
        $("#sent-form-msg").hide();
        $("#message").hide();

        // on submit...

        $("#cform").submit(function (e) {
            e.preventDefault();

            //required:

            //name
            var name = $("#cform#username").val();
            alert(name);
            if (name == "") {
                $("#error").fadeIn().html("<span>Name required.</span>");
                $("#cform#username").focus();
                return false;
            }

            // email
            var email = $("#cform#useremail").val();
            if (email == "") {
                $("#error").fadeIn().html("<span>Email required</span>");
                $("#cform#useremail").focus();
                return false;
            }

            // contact_no
            var phone = $("#cform#userphone").val();
            if (userphone == "") {
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
                url: 'action.php',
                //data : inputs,
                data: dataString,
                dataType: 'json'
            }).done(function (data) {
                $("#sent-form-msg").fadeIn();
                $('#message').text(data);

            });

            return false;
        });
    }

    //--------------------------CRUD add/update/delete -----------------------

    function ajaxCall(data) {
        $.ajax({
            url: '',
            type: 'post',
            dataType: 'json',
            data: data
        }).done(function (response) {
            //reload on success, else show errors           
            if (response.code == 0) {
                alert(response.message);
            } else if (response.code == 1) {
                alert(response.message);
                location.reload();
            }
        });
    }
    $('.chosen-select').chosen({diable_search:false});
    //----------add----------


    //si bouton ajout cliqué
    $('#kms-crud-add-btn').click(function (e) {
        e.preventDefault();

        // récupérer les données des input de la ligne ajout
        var data = $(this).parent().parent().find('.kms-add-inp').not('.chosen-select').serializeArray();
        var mult = $(this).parent().parent().find('.kms-add-inp.chosen-select');
        mult.val().map(function(opt,index){
            data.push({name: mult.attr('name')+'['+index+']', value: opt});
        });
        console.log(data);

        //ajouter le paramètre 'method'
        data.push({name: 'method', value: 'insert'});
        ajaxCall(data);
    });


    //----------update------------  

    //si bouton 'modifier' cliqué
    $('.kms-crud-update-btn').click(function (e) {
        e.preventDefault();
        crudUpdatePrepare.call(this);
    });

    //si bouton 'modifier' cliqué - fonction principale
    function crudUpdatePrepare() {

        //sélectionner la ligne de table courante
        var tr = $(this).parent().parent();

        //stocker la valeur des td de la ligne courante dans val et supprimer les td
        var val = [];
        tr.children('.kms-datacolumn').each(function () {
            val.push($(this).html());
            $(this).remove();
        });

        //copier les input de la ligne ajout dans la ligne courante
        tr.prepend($('.kms-add-inp').clone());
        tr.find('.kms-add-inp').wrap('<td></td>');

        //changer ensuite les classes de add en update
        tr.find('.kms-add-inp').addClass('kms-update-inp');
        tr.find('.kms-update-inp').removeClass('kms-add-inp');

        //insérer les valeurs depuis le tableau val
        tr.find('.kms-update-inp').each(function () {
            $(this).attr('value', (val.shift()));
        });

        //changer le texte du bouton 'Modifier' en 'Enrégistrer'
        //changer la fonction appelée par le clic de crudUpdatePrepare en crudUpdate

        $(this).html('Enrégistrer').off('click').click(function(e) {


            e.preventDefault();
            crudUpdate.call(this);
        });
    }

    //si bouton 'modifier' cliqué - fonction principale
    function crudUpdate() {

        // récupérer les données des input de la ligne courante
        var data = $(this).parent().parent().find('.kms-update-inp').serializeArray();

        // ajouter le paramètre 'method' et l'id de la ligne courante
        data.push({name: 'id', value: $(this).attr('value')}, {name: 'method', value: 'update'});
        ajaxCall(data);
    }

    //----------delete----------

    $('.kms-crud-delete-btn').click(function (e) {
        e.preventDefault();
        // ajouter l'id de la ligne courante
        data = [{name: 'id', value: $(this).attr('value')}, {name: 'method', value: 'delete'}];
        ajaxCall(data);
    });

});





