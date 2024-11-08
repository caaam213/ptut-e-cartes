//PARTIE 1


    //variable dans laquelle il y a le contenu de ce qu'il y a écrit dans le formulaire
    var formulaire = document.getElementById("formModA1").innerHTML  ; 
    //on recup le <div>
    var div = document.getElementById("grandeDiv"); 

    //evenement lors d'un click
    document.getElementById("grandeDiv").addEventListener("dblclick", function(e){
        e.preventDefault();
        // a la place de tout le <p> on met le formulaire
        div.innerHTML = formulaire;

        var change = document.getElementById("formModA2"); 
        change.setAttribute('type','text');
        return false 
    });

    //modification de la saisie
    document.getElementById("lien").addEventListener("click", function(e){
        var saisie = document.getElementById("formModA2").value;
        div.innerHTML = saisie;
        var change = document.getElementById("formModA2"); 
        change.setAttribute('type','hidden');
        var saisie2 = document.getElementById("idIngr").value;
        var changement = document.getElementById("lien"); 
        changement.setAttribute('href','index.php?page=gestionIngrédients&nomModif=' + saisie + '&idModif='+ saisie2);
    });


//PARTIE2 
    //variable dans laquelle il y a le contenu de ce qu'il y a écrit dans le formulaire
    var formulaire2 = document.getElementById("formModB1").innerHTML  ; 
    //on recup le <div>
    var div2 = document.getElementById("grandeDiv2"); 

    //evenement lors d'un click
    document.getElementById("grandeDiv2").addEventListener("dblclick", function(e){
        e.preventDefault();
        // a la place de tout le <p> on met le formulaire
        div2.innerHTML = formulaire2;

        var change2 = document.getElementById("formModB2"); 
        change2.setAttribute('type','text');
        return false 
    });

    //modification de la saisie
    document.getElementById("lien2").addEventListener("click", function(e){
        var saisie2 = document.getElementById("formModB2").value;
        div2.innerHTML = saisie2;
        var change2 = document.getElementById("formModB2"); 
        change2.setAttribute('type','hidden');
        var saisie3 = document.getElementById("idIngr2").value;
        var changement2 = document.getElementById("lien2"); 
        changement2.setAttribute('href','index.php?page=gestionIngrédients&nomModif=' + saisie2 + '&idModif='+ saisie3);

    });