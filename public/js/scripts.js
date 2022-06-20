function openTab(evt, tabStatus, content, links) {
    var i, tab__content, tab__links;

    tab__content = document.getElementsByClassName(content);
    for(i=0; i < tab__content.length; i++){
        tab__content[i].style.display = "none";
    }

    tab__links = document.getElementsByClassName(links);
    for(i = 0 ; i < tab__links.length; i++){
        tab__links[i].className = tab__links[i].className.replace(" active", "");
    }

    document.getElementById(tabStatus).style.display= "grid";
    evt.currentTarget.className += " active";
}


