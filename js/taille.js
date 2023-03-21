
var select = document.getElementById('taille_select');
var add_select = document.getElementById('taille_add_b_select');

var input = document.getElementById('taille_input');
var add_input = document.getElementById('taille_add_b_input');

var taille_table = document.getElementById('taille_box_table');

var taille_inp = document.getElementById('taille_box_inp');

add_select.addEventListener('click', function() {
    var id = select.options[select.selectedIndex].value;
    var libelle = select.options[select.selectedIndex].text;
    Taille(id, libelle);
});

add_input.addEventListener('click', function() {
    var libelle = input.value;
    var id = 0;
    Taille(id, libelle);
    input.value = "";
});


function Taille(id, libelle) {
    var x = taille_inp.childElementCount + 1;
    if(libelle == undefined || libelle == null || libelle == "" || libelle.includes(";")) {
        return;
    }
    
    var n = document.createElement('div');
    n.className = 'taille_table_row';
    n.setAttribute('data-cid', x);

    var p = document.createElement('p');
    p.setAttribute('data-id', id);
    p.innerHTML = libelle;
    n.appendChild(p);

    var a = document.createElement('a');
    a.id = 'taille_row_del';
    a.setAttribute('data-cid', x);
    a.className = 'btn';
    a.innerHTML = 'SUPPRIMER';
    n.appendChild(a);

    if(x == 1) {
        var d = document.createElement('div');
        d.className = 'taille_table_title';
        d.innerHTML = '<p>Taille :</p>';
        d.id = 'taille_table_title';
        taille_table.parentNode.insertBefore(d, taille_table);
    }

    taille_table.appendChild(n);

    var inp = document.createElement('input');
    inp.type = 'hidden';
    inp.name = 'taille_inp_' + x;
    inp.value = id + ";" + libelle;
    taille_inp.appendChild(inp);

    a.addEventListener('click', function() {
        var cid = this.getAttribute('data-cid');
        var row = document.querySelector('[data-cid="' + cid + '"]');
        var inp = document.querySelector('[name="taille_inp_' + cid + '"]');
        row.remove();
        inp.remove();
        if(taille_inp.childElementCount == 0) {
            document.getElementById('taille_table_title').remove();
        }
    });

}

if(document.getElementById('supressimgbtn')) {
    document.getElementById('supressimgbtn').addEventListener('click', function(e) {
        if(confirm('Voulez-vous vraiment supprimer cette image ?')) {
            e.preventDefault();
            var n = document.createElement('form');
            n.method = 'POST';
    
            var i = document.createElement('input');
            i.type = 'hidden';
            i.name = 'supressimg';
            i.value = 'true';
            n.appendChild(i);
    
            var s = document.createElement('input');
            s.type = 'submit';
            s.value = 'Wait';
            n.appendChild(s);
    
            document.body.appendChild(n);    
    
            n.submit();
        }
    });
}

if(document.getElementById('supressproduct')) {
    document.getElementById('supressproduct').addEventListener('click', function(e) {
        if(confirm('Voulez-vous vraiment supprimer ce produit ?')) {
            e.preventDefault();
            var n = document.createElement('form');
            n.method = 'POST';
    
            var i = document.createElement('input');
            i.type = 'hidden';
            i.name = 'supressproduct';
            i.value = 'true';
            n.appendChild(i);
    
            var s = document.createElement('input');
            s.type = 'submit';
            s.value = 'Wait';
            n.appendChild(s);
    
            document.body.appendChild(n);    
    
            n.submit();
        }
    });
}
