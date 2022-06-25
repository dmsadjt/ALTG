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

const cardId = [];

function changeFrame(rarity){
    const divToChange = document.getElementById(rarity).classList;

    switch(rarity){
        case 'common':
            divToChange.add('character-card-common');
            divToChange.remove('character-card');
            document.getElementById(rarity).id = rarity + ' ';
            break;
        case 'elite':
            divToChange.add('character-card-elite');
            divToChange.remove('character-card');
            document.getElementById(rarity).id = rarity + ' ';
            break;
        case 'rare':
            divToChange.add('character-card-rare');
            divToChange.remove('character-card');
            document.getElementById(rarity).id = rarity + ' ';
            break;
        case 'specially-super-rare':
            divToChange.add('character-card-sr');
            divToChange.remove('character-card');
            document.getElementById(rarity).id = rarity + ' ';
            break;
        case 'ultra-rare':
            divToChange.add('character-card-ur');
            divToChange.remove('character-card');
            document.getElementById(rarity).id = rarity + ' ';
            break;
    }


}
