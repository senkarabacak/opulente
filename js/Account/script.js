if(document.readyState === 'ready' || document.readyState === 'complete') {
    setCountry()
    forLinks()
    checkPassMaching()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            setCountry()
            forLinks()
            checkPassMaching()
        }
    });
}





function setCountry(){
    let options = document.getElementsByClassName('countryOption')

    for(let i = 0; i < options.length; i++){
        if(options[i].value == userCountry){
            options[i].selected = 'selected'
        }
    }
}


function checkPassMaching(){
    let pass = document.getElementById('pass')
    let passRep = document.getElementById('passRep')
    let form = document.getElementById('accForm')

    form.onsubmit = function(){
        if(pass.value != '' && passRep.value != ''){
            if(pass.value != passRep.value){
                alert("passwords didn't match")
                return
            }
        }
    }
}


function forLinks(){
    let links = document.getElementsByClassName('bilLinkBlock')
    let sections = document.getElementsByClassName('birSection')

    for(let i = 0; i < links.length; i++){
        links[i].onclick = function(){

            for(let k = 0; k < links.length; k++){
                if(i != k){
                    sections[k].style.display = 'none'
                    links[k].classList.remove("bilLinkBlockSelected")
                }
            }

            sections[i].style.display = 'flex'
            links[i].classList.add("bilLinkBlockSelected")
        }
    }

    links[0].click()
}