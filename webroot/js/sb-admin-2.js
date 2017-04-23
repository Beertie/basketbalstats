$(function() {

    //$('#side-menu').metisMenu();
	
	var expandMenu = !$('#wrapper').hasClass('nav-closed');
	
    if(!expandMenu){
        Cookies.remove('expmenu');
        $("#wrapper,  #nav-wrapper").addClass("nav-closed");
    } else {
        Cookies.set('expmenu', true);
        $("#wrapper, #wrapper, #nav-wrapper").removeClass("nav-closed");
    }
	
    $("li.toggle-menu a").click(function(){

        $("i.toggle-menu .fa-chevron-right").toggle();
        $("i.toggle-menu .fa-chevron-left").toggle();
        $(".navbar-default.sidebar").toggleClass("closed");
        $("#wrapper, #nav-wrapper").toggleClass("nav-closed");
        
         // Inverse status
        expandMenu = !expandMenu;

        if(!expandMenu){
            Cookies.remove('expmenu');
        } else {
            Cookies.set('expmenu', true);
        }
        return false;
        
        return false;

    });

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });

    $("body.changelog h2").wrapInner("<span></span>");

    $('.btn.newservicepoint').click(function() {
        var rel = $(this).attr('data-rel');

        $("#" + rel).slideDown();
        $(this).fadeOut();
        return false;
    });

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
/*
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });
*/

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});
