var chauffeur = document.querySelector("#divchauffeur #formChauffeur");
var chauffeurdisp = document.querySelector("#divchauffeur #formdispChauffeur");
var selectindisp = document.querySelector("#divchauffeur #formChauffeur select");
var selectdisp = document.querySelector("#divchauffeur #formdispChauffeur select");
    

if(chauffeur != null){
    selectindisp.onchange = ()=>{
    let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "../php/mdchauffeur.php", true);
        let formData = new FormData(chauffeur);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data + " 1");
                }
            }
        }
        xhr.send(formData);
    }
}
if(chauffeurdisp != null){
    selectdisp.onchange = ()=>{
        let xhrs = new XMLHttpRequest(); //creating XML object
        xhrs.open("POST", "../php/mdchauffeur.php", true);
        xhrs.onload = ()=>{
            if(xhrs.readyState === XMLHttpRequest.DONE){
                if(xhrs.status === 200){
                    let data = xhrs.response;
                    console.log(data+ " 2");
                }
            }
        }
        let formDatas = new FormData(chauffeurdisp);
        xhrs.send(formDatas);
    }
}