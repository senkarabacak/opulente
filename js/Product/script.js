if(document.readyState === 'ready' || document.readyState === 'complete') {
    productNumberIcons()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            productNumberIcons() 
        }
    });
}









function productNumberIcons(){
    let minus = document.getElementById('pidbbMinus')
    let plus = document.getElementById('pidbbPlus')
    let number = document.getElementById('pidbbNumber')

    minus.onclick = function(){
        if(number.value > 1){
            number.value--
        }
    }
    plus.onclick = function(){
        if(number.value < 99){
            number.value++
        }
    }
}