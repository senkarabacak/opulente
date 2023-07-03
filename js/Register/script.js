if(document.readyState === 'ready' || document.readyState === 'complete') {
    checkValidity()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            checkValidity()
        }
    });
}





function checkValidity(){
    let form = document.getElementById('biForm')

    let salutationInput = document.getElementById('salutation')
    let countryInput = document.getElementById('country')
    let pass = document.getElementById('pass')
    let passRep = document.getElementById('passRep')

    form.onsubmit = function(){
        if(salutationInput.value == 'false'){
            alert('Bitte wählen Sie eine Anrede')
            return false
        }
        if(countryInput.value == 'false'){
            alert('Bitte wählen Sie Ihr Land')
            return false
        }

        if(pass.value != passRep.value){
            alert("Passwörter stimmen nicht überein")
            return false
        }
    }

}