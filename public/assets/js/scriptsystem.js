/**
 * Created by Hicham on 18/12/2016.
 * layoutsystem script
 */
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $('#menu ul').hide();
});

function initMenu() {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
    //$('#menu ul:first').show();
    $('#menu li a').click(
        function() {
            var checkElement = $(this).next();
            if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                return false;
            }
            if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                $('#menu ul:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
            }
        }
    );
}
$(document).ready(function() {
    initMenu();
    
    //
    function unfold(callFrom,callTo,getKey){
        $.ajax({
            url: window.location.href.replace(callFrom,callTo),
            type: 'get',
            data: {[getKey]:$(this).data('id')},
            context: this
        }).done(function (response) {
            $(this).after('<tr><td colspan="'+this.cells.length+'"></td></tr>').next().hide().children().append($(response).find('table'));
            $(this).next().find('.kms-action').remove();
            $(this).next().fadeIn();
            $(this).addClass('kms-unfolded').children().not('.kms-action').off('click').click(function(){
                fold.call(this,callFrom,callTo,getKey);
            });
        });
    }
    function fold(callFrom,callTo,getKey){
        $(this).parent().next().fadeOut(400,function(){$(this).remove();});
        $(this).parent().removeClass('kms-unfolded').children().not('.kms-action').off('click').click(function(){
            unfold.call(this.parentNode,callFrom,callTo,getKey);
        });
    }
    
    if (window.location.pathname.endsWith('/class/')){
        
        $('.kms-dataset').not('#kms-add').children().not('.kms-action').css('cursor','pointer').click(function(){
            unfold.call(this.parentNode,'/class/','/child/','class');
        });
    }    
    if (window.location.pathname.endsWith('/parent/')){
        
        $('.kms-dataset').not('#kms-add').children().not('.kms-action').css('cursor','pointer').click(function(){
            unfold.call(this.parentNode,'/parent/','/child/','parent');
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
    //fonction pour appliquer la librairie chosen à un objet et l'afficher comme un formulaire bootstrap
    function styleSelect(jqobj){
        jqobj.chosen({disable_search_threshold:8});
        jqobj.next().css({width:'100%'}).children('ul').addClass('form-control');
    }
    //initialiser la librairie chosen sur les select
    styleSelect($('.chosen-select'));
    //----------add----------


    //si bouton ajout cliqué
    $('#kms-crud-add-btn').click(function (e) {
        e.preventDefault();

        // récupérer les données des input de la ligne ajout
        var data = $(this).closest('.kms-dataset').find('.kms-add').serializeArray();
        var mult = $(this).closest('.kms-dataset').find('.kms-add.kms-select[multiple]');
        mult.each(function(){
            $(this).val().map(function(opt,index){
                data.push({name: mult.attr('name')+'['+index+']', value: opt});
            });
        });

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
    var detached = [];
    var detachedId = [];
    //si bouton 'modifier' cliqué - fonction principale
    function crudUpdatePrepare() {

        //sélectionner la ligne de table courante
        var tr = $(this).closest('.kms-dataset');

        //stocker la valeur des td de la ligne courante dans val et supprimer les td
        var val = [];
        tr.children('.kms-data').each(function () {
            //stocker la/les valeurs de select dans un sous-array
            if($(this).hasClass('kms-select')){
                var sel = [];
                $(this).children('.kms-option').each(function () {
                    sel.push($(this).data('val'));
                }); 
                val.push(sel);
            //stocker les valeurs d'input en string
            } else {
                val.push($(this).html().trim());
            }
        });
            //supprimer
        detached.push(tr.children().not('.kms-action').detach());
        detachedId.push(tr.data('id'));
        //copier les input de la ligne ajout dans la ligne courante
        tr.prepend($('#kms-add').children().clone());
        //remplacer les boutons
        tr.find('.kms-action.kms-update').replaceAll(tr.find('.kms-action.kms-add'));
        tr.find('.chosen-container').remove();
        //changer ensuite les classes de add en update
        tr.find('.kms-add').addClass('kms-update');
        tr.find('.kms-update').removeClass('kms-add');
        //insérer les valeurs depuis le tableau val
        tr.find('.kms-update').each(function () {
            //sélectionner la/les bonnes valeurs du select
            if($(this).hasClass('kms-select')){
                $(this).children('[value="'+val.shift().join('"], [value="')+'"]').attr('selected','true');
                //appliquer la librairie chosen au select nouvellement crée
                $(this).css({display:'initial'});
                styleSelect($(this));
            //afficher le texte dans l'input
            } else {
                $(this).val(val.shift());
            }
        });
        //changer le texte du bouton 'Modifier' en 'Enrégistrer'
        //changer la fonction appelée par le clic de crudUpdatePrepare en crudUpdate
        $(this).after(' <a class="btn btn-info btn-flat kms-crud-abort-btn" href="#"><i class="fa fa-close"></i></a> ');
        
        $(this).next().click(function (e) {
            e.preventDefault();
            tr = $(this).closest('.kms-dataset');
            id = tr.data('id');
            tr.children().not('.kms-action').remove();
            index=detachedId.indexOf(id);
            tr.prepend(detached[index]);
            detached.splice(index,1);
            detachedId.splice(index,1);
            console.log(detached);
            console.log(detachedId);
            $(this).remove();
            tr.find('.kms-crud-update-btn').html('<i class="fa fa-pencil"></i>').addClass('btn-info').removeClass('btn-success').off('click').click(function(e) {
                e.preventDefault();
                crudUpdatePrepare.call(this);
            });
        });
        
        $(this).html('<i class="fa fa-save"></i>').addClass('btn-success').removeClass('btn-info').off('click').click(function(e) {
            e.preventDefault();
            crudUpdate.call(this);
        });
    }

    //si bouton 'modifier' cliqué - fonction principale
    function crudUpdate() {

        // récupérer les données des input de la ligne courante
        tr = $(this).closest('.kms-dataset');
        var data = tr.find('.kms-update').not('.kms-select[multiple]').serializeArray();
        var mult = tr.find('.kms-update.kms-select[multiple]');
        mult.each(function(){
            $(this).val().map(function(opt,index){
                data.push({name: mult.attr('name')+'['+index+']', value: opt});
            });
        });
        // ajouter le paramètre 'method' et l'id de la ligne courante
        data.push({name: 'id', value: tr.data('id')}, {name: 'method', value: 'update'});
        ajaxCall(data);
    }
    
    //enrégistrer directement depuis le bouton (sans passer par crudUpdatePrepare)
    $('.kms-crud-save-btn').click(function (e) {
        e.preventDefault();
        crudUpdate.call(this);
    });
    
    //----------delete----------

    $('.kms-crud-delete-btn').click(function (e) {
        e.preventDefault();
        if (confirm('Voulez-vous vraiment supprimer cette ligne ?')){
            // ajouter l'id de la ligne courante
            data = [{name: 'id', value: $(this).closest('.kms-dataset').data('id')}, {name: 'method', value: 'delete'}];
            ajaxCall(data);
        }
    });

    //----------------add -------------------
    $('#addchild').hide();
    $('.kms-crud-addchild-btn').click(function (e) {
        e.preventDefault();
        $('#list').hide();
        $('#addchild').show();

    });
    //si bouton ajout cliqué
    $('#addchildtolist').submit(function (e) {
        e.preventDefault();

        // récupérer les données des input de la ligne ajout
        var data = $(this).serializeArray();

        //ajouter le paramètre 'method'
        data.push({name: 'method', value: 'insert'});
        ajaxCall(data);
    });





    //----------------cancel an add/edit -------------------
    $('.kms-crud-cancel-btn').click(function (e) {
        e.preventDefault();
        $('#addchild').hide();
        location.search ='';
        $('#list').show();

    });


    //----------------edit -------------------
    $('.kms-crud-edit-btn').click(function (e) {
        e.preventDefault();
        location.search = '?id='+$(this).closest('.kms-dataset').data('id');
        //ajaxCall(data);

    });


    //----------------Select child-------------------
   /* $('#child').hide();
    $('.kms-crud-select-btn').click(function (e) {
        e.preventDefault();
        // ajouter l'id de la ligne courante
        //data = {name: 'id', value: $(this).attr('value')};
        location.search = '?id='+$(this).attr('value');
        //ajaxCall(data);
        $('#child').show();

    });*/
    //---------------------------Calendar----------------

});

