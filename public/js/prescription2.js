var i=1;
function ajout(){
                i++;
                var ajt=document.getElementById("tab");
                var tr=document.createElement("tr");
                tr.setAttribute("id",i);
                var ordon=document.createElement("td");
                var produit=document.createElement("td");
                var quantite=document.createElement("td");
                var posologie=document.createElement("td");
                var supprimer=document.createElement("td");
                var produitcompo=document.createElement("input");
                var quantitecompo=document.createElement("input");
                var posologiecompo=document.createElement("textarea");
                var supprimercompo=document.createElement("input");
                var ordoncompo=document.createElement("input");
                //produit compo
                produitcompo.setAttribute("class","form-control");
                produitcompo.setAttribute("name","prod"+i);
                produitcompo.setAttribute("required","true");

                //quantite compo
                quantitecompo.setAttribute("class","form-control");
                quantitecompo.setAttribute("name","quant"+i);
                quantitecompo.setAttribute("required","true");
                //quantite compo
                posologiecompo.setAttribute("class","form-control");
                posologiecompo.setAttribute("name","poso"+i);
                posologiecompo.setAttribute("required","true");
                //supprimer compo
                supprimercompo.setAttribute("class","btn btn-danger");
                supprimercompo.setAttribute("type","button");
                supprimercompo.setAttribute("value","supprimer");
                supprimercompo.setAttribute("onclick","supprimer("+i+")");
                //ordonnance compo
                ordoncompo.setAttribute("hidden","false");
                ordoncompo.setAttribute("type","text");
                ordoncompo.setAttribute('value','');
                        
                //ajout d'elements
                produit.appendChild(produitcompo);
                quantite.appendChild(quantitecompo);
                posologie.appendChild(posologiecompo);
                supprimer.appendChild(supprimercompo);
                ordon.appendChild(ordoncompo);
                tr.appendChild(ordon);
                tr.appendChild(produit);
                tr.appendChild(quantite);
                tr.appendChild(posologie);
                tr.appendChild(supprimer);
                ajt.appendChild(tr);
                
                
            }
function supprimer(id){
	if(i>1){
		var elemtId=document.getElementById(id);
        var elemtId2=elemtId.parentNode;
        elemtId.parentNode.removeChild(elemtId);  
        i--;
    }
}