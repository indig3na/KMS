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
    //initialiser la librairie chosen sur les select
    $('.chosen-select').chosen({disable_search_threshold:8});
    $('.chosen-select').next().css({width:'100%'});
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
            if($(this).hasClass('kms-datacolumn-select')){
                var sel = [];
                $(this).children('span').each(function () {
                    sel.push($(this).attr('value'));
                });
                val.push(sel);
            } else {
                val.push($(this).html());
            }
            $(this).remove();
        });

        //copier les input de la ligne ajout dans la ligne courante
        tr.prepend($('.kms-add-inp').clone());
        tr.find('.kms-add-inp').wrap('<td></td>');
        /*tr.find('.chosen-container').each(function(){
         $(this).prev().append($(this));
         });*/

        //changer ensuite les classes de add en update
        tr.find('.kms-add-inp').addClass('kms-update-inp');
        tr.find('.kms-update-inp').removeClass('kms-add-inp');
        console.log(val);
        //insérer les valeurs depuis le tableau val
        tr.find('input.kms-update-inp').each(function () {
            $(this).attr('value', (val.shift().trim()));
        });

        tr.find('select.kms-update-inp').each(function () {
            $(this).children('[value="'+val.shift().join('"], [value="')+'"]').attr('selected','true');
            $(this).css({display:'initial'});
            $(this).chosen();
            $(this).next().css({width:'100%'});
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
        var data = $(this).parent().parent().find('.kms-update-inp').not('.chosen-select').serializeArray();
        var mult = $(this).parent().parent().find('.kms-update-inp.chosen-select');
        mult.val().map(function(opt,index){
            data.push({name: mult.attr('name')+'['+index+']', value: opt});
        });
        // ajouter le paramètre 'method' et l'id de la ligne courante
        data.push({name: 'id', value: $(this).attr('value')}, {name: 'method', value: 'update'});
        ajaxCall(data);
    }

    //----------delete----------

    $('.kms-crud-delete-btn').click(function (e) {
        e.preventDefault();
        if (confirm('Voulez-vous vraiment supprimer cette ligne ?')){
            // ajouter l'id de la ligne courante
            data = [{name: 'id', value: $(this).attr('value')}, {name: 'method', value: 'delete'}];
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
        $('#list').hide();
        // ajouter l'id de la ligne courante
        data = {name: 'id', value: $(this).attr('value')};
        location.search = '?id='+$(this).attr('value');
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
    YUI().use(
        'aui-scheduler',
        function(Y) {
            var events = [
                {
                    content: 'Partial Lunar Eclipse',
                    endDate: new Date(2016, 12, 25, 5),
                    startDate: new Date(2016, 12, 25, 1)
                },
                {
                    color: "#8d8",
                    content: 'Earth Day Lunch',
                    disabled: true,
                    endDate: new Date(2016, 12, 22, 13),
                    meeting: true,
                    reminder: true,
                    startDate: new Date(2016, 12, 22, 12)
                },
                {
                    content: "Weeklong",
                    endDate: new Date(2016, 12, 27),
                    startDate: new Date(2016, 12, 21)
                }
            ];

            var agendaView = new Y.SchedulerAgendaView();
            var dayView = new Y.SchedulerDayView();
            var weekView = new Y.SchedulerWeekView();
            var monthView = new Y.SchedulerMonthView();

            var eventRecorder = new Y.SchedulerEventRecorder();

            new Y.Scheduler(
                {
                    activeView: weekView,
                    boundingBox: '#myScheduler',
                    date: new Date(2013, 3, 25),
                    eventRecorder: eventRecorder,
                    items: events,
                    render: true,
                    views: [dayView, weekView, monthView, agendaView]
                }
            );
        }
    );










});

