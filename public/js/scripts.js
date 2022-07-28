
function openTab(evt, tabStatus, content, links, style) {
    var i, tab__content, tab__links;

    tab__content = document.getElementsByClassName(content);
    for (i = 0; i < tab__content.length; i++) {
        tab__content[i].style.display = "none";
    }

    tab__links = document.getElementsByClassName(links);
    for (i = 0; i < tab__links.length; i++) {
        tab__links[i].className = tab__links[i].className.replace(" active", "");
    }

    switch (style) {
        case 'grid':
            document.getElementById(tabStatus).style.display = "grid";
            break;
        case 'flex':
            document.getElementById(tabStatus).style.display = "flex";
            break;
        case 'block':
            document.getElementById(tabStatus).style.display = "block";
            break;
    }

    evt.currentTarget.className += " active";
}

const cardId = [];


function changeFrame(rarity) {
    const divToChange = document.getElementById(rarity).classList;

    switch (rarity) {
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
        case 'super-rare':
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


function changeLabel(rarity) {
    const divToChange = document.getElementById(rarity).classList;

    switch (rarity) {
        case 'N':
            divToChange.add('n-tag');
            divToChange.remove('rarity-tag');
            document.getElementById(rarity).id = rarity + ' ';
            break;

        case 'E':
            divToChange.add('e-tag');
            divToChange.remove('rarity-tag');
            document.getElementById(rarity).id = rarity + ' ';
            break;

        case 'R':
            divToChange.add('r-tag');
            divToChange.remove('rarity-tag');
            document.getElementById(rarity).id = rarity + ' ';
            break;

        case 'SR':
            divToChange.add('sr-tag');
            divToChange.remove('rarity-tag');
            document.getElementById(rarity).id = rarity + ' ';
            break;

        case 'UR':
            divToChange.add('ur-tag');
            divToChange.remove('rarity-tag');
            document.getElementById(rarity).id = rarity + ' ';
            break;

    }

}

function changeScoreColor(score) {
    const divToChange = document.getElementById(score).classList;
    if (score == 11) {
        divToChange.add('score-9');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 10.5) {
        divToChange.add('score-8');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 10) {
        divToChange.add('score-7');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 8) {
        divToChange.add('score-6');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 6) {
        divToChange.add('score-5');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 4) {
        divToChange.add('score-4');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 2) {
        divToChange.add('score-3');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else if (score >= 1) {
        divToChange.add('score-2');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    } else {
        divToChange.add('score-1');
        divToChange.remove('sac');
        document.getElementById(score).id = score + ' ';
    }

}


function changeFaction(faction) {
    const divToChange = document.getElementById(faction).classList;

    switch (faction) {
        case 'dragon':
            divToChange.add('dragon-empire');
            break;
        case 'eagle':
            divToChange.add('eagle-union');
            break;
        case 'iris':
            divToChange.add('iris-libre');
            break;
        case 'iron':
            divToChange.add('iron-blood');
            break;
        case 'parliament':
            divToChange.add('northern-parliament');
            break;
        case 'royal':
            divToChange.add('royal-navy');
            break;
        case 'sakura':
            divToChange.add('sakura-empire');
            break;
        case 'sardegna':
            divToChange.add('sardegna-empire');
            break;
        case 'vichya':
            divToChange.add('vichya-dominion');
            break;
    }
}


function evaluateSkills(a, b, eval) {
    evaluator = document.getElementById(eval);

    if (a >= b) {
        if (a > b) {
            evaluator.innerHTML = '<';
        }
        else if (a == b) {
            evaluator.innerHTML = '=';
        }
    }

}

function displayItem(divId) {
    const divToChange = document.getElementById(divId).classList;
    if (divToChange.contains('d-none')) {
        divToChange.remove('d-none');
    }
}

function changeGear(rarity) {
    const divToChange = document.getElementById(rarity).classList;

    if (divToChange.contains('pl-hd')) {
        switch (rarity) {
            case 'n':
                divToChange.add('gear-n');
                divToChange.remove('pl-hd');
                document.getElementById(rarity).id = rarity + ' ';
                break;

            case 'e':
                divToChange.add('gear-e');
                divToChange.remove('pl-hd');
                document.getElementById(rarity).id = rarity + ' ';
                break;

            case 'r':
                divToChange.add('gear-r');
                divToChange.remove('pl-hd');
                document.getElementById(rarity).id = rarity + ' ';
                break;

            case 'sr':
                divToChange.add('gear-sr');
                divToChange.remove('pl-hd');
                document.getElementById(rarity).id = rarity + ' ';
                break;

            case 'ur':
                divToChange.add('gear-ur');
                divToChange.remove('pl-hd');
                document.getElementById(rarity).id = rarity + ' ';
                break;

        }
    }


}

function changeFactionTag(faction) {
    const divToChange = document.getElementById(faction).classList;

    switch (faction) {
        case 'De':
        case 'DE':
            divToChange.add('pill-tag--DE');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'EU':
            divToChange.add('pill-tag--EU');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'IL':
            divToChange.add('pill-tag--IL');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'IB':
            divToChange.add('pill-tag--IB');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'NP':
            divToChange.add('pill-tag--NP');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'RN':
            divToChange.add('pill-tag--RN');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'SE':
            divToChange.add('pill-tag--SE');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'RM':
            divToChange.add('pill-tag--RM');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
        case 'VD':
            divToChange.add('pill-tag--VD');
            divToChange.add('text-black');
            divToChange.remove('pl-hd');
            break;
    }

}

function changeTextColor(text) {
    const divToChange = document.getElementById(text).classList;

    if (text == 'backline-any' || text == 'submarine-all' || text == 'vanguard-any') {
        divToChange.add('text-color-any');
        divToChange.remove('cl-hd');
    }
    else if (text == 'backline-flagship' || text == 'submarine-flagship') {
        divToChange.add('text-color-flagship');
        divToChange.remove('cl-hd');
    }
    else if (text == 'backline-off_flag' || text == 'submarine-off_flag') {
        divToChange.add('text-color-offflag');
        divToChange.remove('cl-hd');
    }
    else if (text == 'vanguard-mid' || text == 'vanguard-mid-offtank') {
        divToChange.add('text-color-mid');
        divToChange.remove('cl-hd');
    }
    else if (text == 'vanguard-tank' || text == 'vanguard-tank-off_tank' || text == 'vanguard-tank-mid') {
        divToChange.add('text-color-tank');
        divToChange.remove('cl-hd');
    }
    else if (text == 'vanguard-offtank') {
        divToChange.add('text-color-offtank');
        divToChange.remove('cl-hd');
    }

}


function displaySelect(select, counter) {
    $("#" + select + counter).show();
}


