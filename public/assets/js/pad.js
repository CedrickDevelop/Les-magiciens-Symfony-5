
tbimage=new Array(1,2,3,4,5,6,7,8,9,0)

function securi(){

    document.getElementById('secuid10').value=''
    var allElements = document.getElementById('secure').getElementsByTagName('p');

    for (var i = 0; i< allElements.length; i++){

        if(tbimage.length==1){
            allElements[i].firstChild.nodeValue=tbimage[0]
        }
        else{
            var spl=Math.round(Math.random()*(tbimage.length-1))
            allElements[i].firstChild.nodeValue=tbimage[spl]
            tbimage.splice(spl,1)
        }
        var dd='secuid'+i+''
        allElements[i].id=dd
        allElements[i].onmouseover=function(event){parde(event)};
        allElements[i].onmouseout=finparde
    }
}

function inval(lui){
    var obja=document.getElementById('secuid10')
    obja.value=obja.value+document.getElementById(lui).firstChild.nodeValue
}

function parde(lui){
    var di=(navigator.appName.substring(0,3)=="Mic") ? event.srcElement.id : lui.currentTarget.id
    terin=setTimeout("inval('"+di+"')",500)
}

function finparde(){
    clearTimeout(terin)
}

function roze(){
    document.getElementById("inputPassword10").value=''
}