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
            alert('Please select salutation')
            return false
        }
        if(countryInput.value == 'false'){
            alert('Please select your country')
            return false
        }

        if(pass.value != passRep.value){
            alert("Passwords didn't match")
            return false
        }
    }

}