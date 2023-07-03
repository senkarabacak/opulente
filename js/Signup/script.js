if(document.readyState === 'ready' || document.readyState === 'complete') {
    checkbox()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            checkbox()
        }
    });
}










function checkbox(){
    let checkbox = document.getElementById('bifrlCheckbox')

    checkbox.onclick = function(){
        checkbox.classList.toggle('checked')

        if(checkbox.classList.contains('checked') == true){
            document.getElementById('isRememberTicked').value = 'true'
        }else{
            document.getElementById('isRememberTicked').value = 'false'
        }
    }
}