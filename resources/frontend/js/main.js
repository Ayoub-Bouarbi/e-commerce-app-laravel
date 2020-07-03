$(function () {
   "use strict";

    $('.home-banner').css("height",window.innerHeight);
    $('.banner-content').css("margin-top",($('.home-banner').height() - $(".banner-content").height())/2);


    $(".menu li").click(function(){
        $(this).children("ul").toggle(300);
    })

});

function OpenTab(e,tabId) {
    var tabContents,tabLinks;


    tabContents = document.getElementsByClassName('tabcontent');

    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
    }

    tabLinks = document.getElementsByClassName('tab-link');

    for (let i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace("active","");
    }

    document.getElementById(tabId).style.display ="block";
    e.currentTarget.className += ' active';

}