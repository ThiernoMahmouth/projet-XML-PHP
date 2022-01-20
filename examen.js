var totalExo = 1;
var totalQuestions = 0;
document.getElementById("addExo").addEventListener("click", function (e) {
    document.getElementById("nbExos").value = totalExo;
    creerExercice(totalExo,1);
})
function creerExercice(numExo, nbQ)
{
    totalQuestions = 1;
    // Recuperation du div examen
    divExos = document.getElementById("divExos");
    // Creation de l'exercice
    var divExo = document.createElement("div");
    divExo.setAttribute("id", "exo" + numExo);
    // Ligne
    var divLigne = document.createElement("div");
    divLigne.setAttribute("class", "form-row");
    // Bouton pour ajouter les questions
    var boutonAddQ = document.createElement("button");
    boutonAddQ.setAttribute("class","btn btn-info");
    boutonAddQ.setAttribute("id","addQ");
    
    boutonAddQ.innerText = "Ajouter une question";
    // Numero Exo
    var divNumExo = document.createElement("div");
    divNumExo.setAttribute("class", "form-group col-md-3");
    var labelNumExo = document.createElement("label");
    labelNumExo.setAttribute("for", "numExo" + numExo);
    labelNumExo.innerText = "Numéro de l'exercice";
    var numEx = document.createElement("input");
    numEx.setAttribute("class", "form-control");
    numEx.setAttribute("type", "number");
    numEx.setAttribute("name", "numExo" + numExo);
    numEx.setAttribute("id", "numExo" + numExo);
    numEx.setAttribute("value", numExo);
    divNumExo.appendChild(labelNumExo);
    divNumExo.appendChild(numEx);
    // Nb Point
    var divNbPointExo = document.createElement("div");
    divNbPointExo.setAttribute("class", "form-group col-md-3");
    var labelNbPointExo = document.createElement("label");
    labelNbPointExo.setAttribute("for", "nbPointExo" + numExo);
    labelNbPointExo.innerText = "Nombre de points";
    var nbPointExo = document.createElement("input");
    nbPointExo.setAttribute("class", "form-control");
    nbPointExo.setAttribute("type", "number");
    nbPointExo.setAttribute("name", "nbPointExo" + numExo);
    nbPointExo.setAttribute("id", "nbPointExo" + numExo );
    nbPointExo.setAttribute("placeholder", "Nombre de points");
    divNbPointExo.appendChild(labelNbPointExo);
    divNbPointExo.appendChild(nbPointExo);
    // On récupère le nombre de questions de l'exercice
    var nbQExo = document.createElement("input");
    nbQExo.setAttribute("class", "form-control");
    nbQExo.setAttribute("type", "hidden");
    nbQExo.setAttribute("name", "nbQExo" + numExo);
    nbQExo.setAttribute("id", "nbQExo" + numExo );
    nbQExo.setAttribute("value", totalQuestions);
    //
    divExo.appendChild(nbQExo); 
    divExo.appendChild(boutonAddQ);
    divLigne.appendChild(divNumExo);
    divLigne.appendChild(divNbPointExo);
    divExo.appendChild(divLigne);

    // Creation de la premiere question de l'exercice
    creerQuestion(divExo, numExo, nbQ);
    // On ajoute l'exercice creer dans l'examen
    divExos.appendChild(divExo);
    document.getElementById("addQ").addEventListener("click", function (e) {
        creerQuestion(divExo, numExo, totalQuestions);
    })
    totalExo ++;
}
function creerQuestion(divExo, numExo, nbQ)
{
    if (document.getElementById("nbQExo" + numExo))
    {
        document.getElementById("nbQExo" + numExo).value = nbQ;
    }
    var divide = document.createElement("hr");
    divExo.appendChild(divide);
    // Ligne
    var divLigne = document.createElement("div");
    divLigne.setAttribute("class", "form-row");
    var divNumQ = document.createElement("div");
    divNumQ.setAttribute("class", "form-group col-md-12");
    // Numero
    var labelNum = document.createElement("label");
    labelNum.setAttribute("for", "numQ" + numExo + nbQ);
    labelNum.innerText = "Numéro Question";
    var numQ = document.createElement("input");
    numQ.setAttribute("class", "form-control");
    numQ.setAttribute("type", "number");
    numQ.setAttribute("name", "numQ" + numExo + nbQ);
    numQ.setAttribute("id", "numQ" + numExo + nbQ);
    numQ.setAttribute("value", nbQ);
    numQ.setAttribute("required", true);
    divNumQ.appendChild(labelNum);
    divNumQ.appendChild(numQ);
    // NbPoint
    var divNbPointQ = document.createElement("div");
    divNbPointQ.setAttribute("class", "form-group col-md-12");
    var labelNbPoint = document.createElement("label");
    labelNbPoint.setAttribute("class", "class");
    labelNbPoint.innerText = "Nombre de points";
    var nbPointQ = document.createElement("input");
    nbPointQ.setAttribute("class", "form-control");
    nbPointQ.setAttribute("type", "number");
    nbPointQ.setAttribute("name", "nbPointQ" + numExo + nbQ);
    nbPointQ.setAttribute("id", "nbPointQ" + numExo + nbQ);
    nbPointQ.setAttribute("placeholder", "Nombre de points");
    divNbPointQ.appendChild(labelNbPoint);
    divNbPointQ.appendChild(nbPointQ);
    // Libelle
    var divLibQ = document.createElement("div");
    divLibQ.setAttribute("class", "form-group col-md-12");
    var labelLib = document.createElement("label");
    labelLib.setAttribute("class", "class");
    labelLib.innerText = "Libellé";
    var libelle = document.createElement("input");
    libelle.setAttribute("class", "form-control");
    libelle.setAttribute("type", "text");
    libelle.setAttribute("name", "libelleQ" + numExo + nbQ);
    libelle.setAttribute("id", "libelleQ" + numExo + nbQ);
    libelle.setAttribute("placeholder", "Libellé");
    libelle.setAttribute("required", "true");
    divLibQ.appendChild(labelLib);
    divLibQ.appendChild(libelle);
    // Type
    var divTypeQ = document.createElement("div");
    divTypeQ.setAttribute("class", "form-group col-md-12");
    var labelType = document.createElement("label");
    labelType.setAttribute("class", "class");
    labelType.innerText = "Type";
    var type = document.createElement("select");
    type.setAttribute("class", "form-control");
    type.setAttribute("type", "text");
    type.setAttribute("name", "typeQ" + numExo + nbQ);
    type.setAttribute("id", "typeQ" + numExo + nbQ);
    type.setAttribute("placeholder", "Type");
    let typeReponses = [
        ["Choisir ...", ""],
        ["réponse courte", "repCourte"],
        ["réponse longue", "repLongue"],
        ["réponse unique", "repUnique"],
        ["réponse multiple", "repMultiple"] 
    ];
    typeReponses.forEach((typeRep) => {
        let option = document.createElement("option");
        option.innerText = typeRep[0];
        option.value = typeRep[1];
        type.appendChild(option);
    })

    type.addEventListener('change', function(e) {
        if (e.target.value == "repUnique" || e.target.value == "repMultiple")
        {
            var divider = document.createElement("hr");
            divExo.appendChild(divider);
            // On récupère le nombre de questions de l'exercice
            var nbOptionQExo = document.createElement("input");
            nbOptionQExo.setAttribute("class", "");
            nbOptionQExo.setAttribute("type", "hidden");
            nbOptionQExo.setAttribute("name", "nbOptionQ" + numExo + nbQ);
            nbOptionQExo.setAttribute("id", "nbOptionQ" + numExo + nbQ);
            divExo.appendChild(nbOptionQExo);
            addOption(divExo, numExo, nbQ, 1);
        }
        else
        {

        }
    })
    divTypeQ.appendChild(labelType);
    divTypeQ.appendChild(type);
    // On ajoute la question dans l'exercice
    divLigne.appendChild(divNumQ);
    divLigne.appendChild(divNbPointQ);
    divLigne.appendChild(divTypeQ);
    divExo.appendChild(divLigne);
    divExo.appendChild(divLibQ);
    //divExo.appendChild(divTypeQ);
    totalQuestions++;
}
function addOption(div, numExo, nbQ, nb)
{
    // Type
    if (document.getElementById("addOptionButton"))
    {
        div.removeChild(document.getElementById("addOptionButton"));
    }
    document.getElementById("nbOptionQ"+numExo+nbQ).value = nb;
    var labelOption = document.createElement("label");
    labelOption.setAttribute("for", "optionQ" + numExo + nbQ + nb);
    labelOption.innerText = "Choix" + nb;
    var choix = document.createElement("input");
    choix.setAttribute("class", "form-control");
    choix.setAttribute("type", "text");
    choix.setAttribute("name", "optionQ" + numExo + nbQ + nb);
    choix.setAttribute("id", "optionQ" + numExo + nbQ + nb);
    choix.setAttribute("placeholder", "Choix" + nb);
    div.appendChild(labelOption);
    div.appendChild(choix);
    var boutonAddOpt = document.createElement("button");
    boutonAddOpt.setAttribute("id", "addOptionButton");
    boutonAddOpt.innerText = "Ajouter choix";
    boutonAddOpt.addEventListener("click", function(e)
    {
        addOption(div, numExo, nbQ, nb+1)
    });
    div.appendChild(boutonAddOpt);

}