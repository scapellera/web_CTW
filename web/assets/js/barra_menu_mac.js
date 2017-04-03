
//barra de menu de abajo
$(function(){
    margin = 10;
    posicionInicial = 0;
    dom = {}
    st = {
        stickyElement: '.stickyfloat_element',
        footer : 'footer',
    };
    catchDom = function(){
        dom.stickyElement = $(st.stickyElement);
        dom.footer = $(st.footer);
    }
    afterCatchDom = function(){
        functions.ubicarPosicionInicial()
    }
    suscribeEvents = function(){
        $(window).on('scroll', events.moveStick);
    }
    events = {
        moveStick : function(){
            windowpos = $(window).scrollTop();
            box = dom.stickyElement;
            footer = dom.footer.offset();
            if ($(window).height() < footer.top - (windowpos + margin)) {
                pos = windowpos + $(window).height() - (box.height() + margin);
                dom.stickyElement.css({
                    top: pos + "px",
                    bottom: ''
                });
            } else{
                pos = footer.top - (box.height() + margin);
                dom.stickyElement.css({
                    top: pos + "px",
                    bottom: ''
                });
            }
        }
    }
    functions = {
        ubicarPosicionInicial : function(){
            var newPosition = $(window).height() - (dom.stickyElement.height() + margin);
            $(st.stickyElement).css('top', newPosition + "px");
            posicionInicial = newPosition;
        }
    }
    var init = function(){
        catchDom();
        afterCatchDom();
        suscribeEvents();
    };
    init();
});



