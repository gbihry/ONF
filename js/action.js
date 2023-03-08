function edit(el,type) {
    var parentN = el.parentNode;
    console.log(parentN);
    var data = parentN.dataset.data;
    parentN.innerHTML = '';
    console.log("type: " + type + " | data: " + data);
    switch(type) {
        case 'tel':
            console.log("tel");
            var input = document.createElement('input');
            input.type = 'text';
            input.value = data;
            input.name = 'input_' + type;
            break;
        case 'quantiteEPI':
            console.log("quantiteEPI");
            var input = document.createElement('input');
            input.type = 'number';
            input.value = data;
            input.name = 'input_' + type;
            console.log((input.value));
            break;
        case 'quantiteVET':
            console.log("quantiteVET");
            var input = document.createElement('input');
            input.type = 'number';
            input.value = data;
            input.name = 'input_' + type;
            console.log((input.name));
            break;
        case 'tailleVET':
            var input = document.getElementById('select_taillevet_' + parentN.dataset.produit + '_blank').cloneNode(true);
            input.id = 'select_taillevet';
            input.querySelector('option[value="' + parentN.dataset.taille + '"]').selected = true;   
            input.name = 'input_' + type;
            input.removeAttribute('style');
            break;
            break;
        case 'tailleEPI':
            var input = document.getElementById('select_tailleepi_' + parentN.dataset.produit + '_blank').cloneNode(true);
            input.id = 'select_tailleepi';
            input.querySelector('option[value="' + parentN.dataset.taille + '"]').selected = true;   
            input.name = 'input_' + type;
            input.removeAttribute('style');
            break;
        case 'livraison':
            console.log("livraison");
            var input = document.getElementById('select_lieulivraison_blank').cloneNode(true);
            input.id = 'select_lieulivraison';
            input.querySelector('option[value="' + parentN.dataset.lieu + '"]').selected = true;   
            input.name = 'input_' + type;
            input.removeAttribute('style');
            break;
        case 'responsable':
            console.log("responsable");
            var input = document.getElementById('select_responsable_blank').cloneNode(true);
            input.id = 'select_responsable';
            input.querySelector('option[value="' + parentN.dataset.responsable + '"]').selected = true;
            input.name = 'input_' + type;
            input.removeAttribute('style');
            break;

    }

    var clear = document.createElement('div');
    clear.classList = 'clear';


    var save_btn = document.createElement('a');
    save_btn.name = 'save_btn';
    save_btn.classList = 'edit_btn green';
    save_btn.innerHTML = '<i class="fa-solid fa-save"></i> Sauvegarder';
    save_btn.onclick = function() {
        save(parentN,type);
    }

    var abort_btn = document.createElement('a');
    abort_btn.name = 'abort_btn';
    abort_btn.classList = 'edit_btn red';
    abort_btn.innerHTML = '<i class="fa-solid fa-times"></i> Annuler';
    abort_btn.onclick = function() {
        abort(parentN,type);
    }

    parentN.appendChild(input);
    parentN.appendChild(clear);
    parentN.appendChild(save_btn);
    parentN.appendChild(abort_btn);
    
}


function save(parentN,type) {
    confirm('Voulez-vous vraiment sauvegarder ?');
    var from = document.createElement('form');
    from.method = 'POST';
    switch(type){
        case 'quantiteVET':
            from.action = 'index.php?action=panierVET';
            break;
        case 'quantiteEPI':
            from.action = 'index.php?action=panierEPI';
            break;
        case 'tailleVET':
            from.action = 'index.php?action=panierVET';
            break;
        case 'tailleEPI':
            from.action = 'index.php?action=panierEPI';
            break;
        default: 
            from.action = 'index.php?action=users';
            break;
    }
    

    var input_type = document.createElement('input');
    input_type.type = 'hidden';
    input_type.name = 'type';
    input_type.value = type;

    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = type; 
    switch(type) {
        case 'quantiteEPI':
            input.value = parentN.querySelector('input').value;
            console.log(parentN);
            console.log(input.value);
            break;
        case 'quantiteVET':
            input.value = parentN.querySelector('input').value;
            break;
        case 'tel':
            input.value = parentN.querySelector('input').value;
            break;
        case 'tailleVET':
            input.value = parentN.querySelector('select').value;
            break;
        case 'tailleEPI':
            input.value = parentN.querySelector('select').value;
            break;
        case 'livraison':
            input.value = parentN.querySelector('select').value;
            break;
        case 'responsable':
            input.value = parentN.querySelector('select').value;
            break;
    }

    switch(type){
        case 'quantiteEPI':
            var input_ligneCommande = document.createElement('input');
            input_ligneCommande.type = 'hidden';
            input_ligneCommande.name = 'idLigne';
            input_ligneCommande.value = parentN.dataset.ligne;
            break;
        case 'quantiteVET':
            var input_ligneCommande = document.createElement('input');
            input_ligneCommande.type = 'hidden';
            input_ligneCommande.name = 'idLigne';
            input_ligneCommande.value = parentN.dataset.ligne;
            break;
        case 'tailleVET':
            var input_ligneCommande = document.createElement('input');
            input_ligneCommande.type = 'hidden';
            input_ligneCommande.name = 'idLigne';
            input_ligneCommande.value = parentN.dataset.ligne;
            break;
        case 'tailleEPI':
            var input_ligneCommande = document.createElement('input');
            input_ligneCommande.type = 'hidden';
            input_ligneCommande.name = 'idLigne';
            input_ligneCommande.value = parentN.dataset.ligne;
            break;
        default:
            var input_login = document.createElement('input');
            input_login.type = 'hidden';
            input_login.name = 'login';
            input_login.value = parentN.parentNode.parentNode.dataset.login;
            break;
    }


    

    var submit = document.createElement('input');
    submit.type = 'submit';
    submit.value = 'submit';

    from.appendChild(input);
    from.appendChild(input_type);
    switch(type){
        case 'quantiteEPI':
            from.appendChild(input_ligneCommande);
            break;
        case 'quantiteVET':
            from.appendChild(input_ligneCommande);
            break;
        case 'tailleVET':
            from.appendChild(input_ligneCommande);
            break;
        case 'tailleEPI':
            from.appendChild(input_ligneCommande);
            break;
        default:
            from.appendChild(input_login);
            break;
    }
    from.appendChild(submit);
    document.body.appendChild(from);
    from.submit();
}

function abort(parentN,type) {
    confirm('Voulez-vous vraiment annuler ?');
    var span = document.createElement('span');
    span.innerHTML = parentN.dataset.data;

    var clear = document.createElement('div');
    clear.classList = 'clear';

    var edit_btn = document.createElement('a');
    edit_btn.name = 'edit_btn';
    edit_btn.classList = 'edit_btn';
    edit_btn.innerHTML = '<i class="fa-solid fa-pencil"></i> Modifier';
    edit_btn.onclick = function() {
        edit(this,type);
    }

    parentN.innerHTML = '';
    parentN.appendChild(span);
    parentN.appendChild(clear);
    parentN.appendChild(edit_btn);
}

function addResponsable(){
    var responsable = document.getElementById("responsable");
    var nonResponsable = document.getElementById("nonResponsable");
    var responsableInput = document.getElementById("responsableInput");
    
    if (responsable.checked == true){
        responsableInput.style.visibility = "hidden";
    } else {
        responsableInput.style.visibility = "visible";
    }

    if (nonResponsable.checked == true){
        responsableInput.style.visibility = "visible";
    } else {
        responsableInput.style.visibility = "hidden";
    }


}