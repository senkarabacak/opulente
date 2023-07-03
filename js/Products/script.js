if(document.readyState === 'ready' || document.readyState === 'complete') {
    addProducts()
    categoryAnimation()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            addProducts()  
            categoryAnimation()
        }
    });
}




function categoryAnimation(){
    const items = document.querySelectorAll(".pipfcCategory button");
    
    for (let i = 0; i < items.length; i++){
        items[i].onclick = function(){
            const itemToggle = items[i].getAttribute('aria-expanded');
        
            for (k = 0; k < items.length; k++) {
                items[k].setAttribute('aria-expanded', 'false');
                document.getElementsByClassName('pipfcciImgHolder')[k].innerHTML = `
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 8L13 1" stroke="#34241E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `
            }
            
            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
                document.getElementsByClassName('pipfcciImgHolder')[i].innerHTML = `
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 8L7 1L1 8" stroke="#34241E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `
            }else{
                document.getElementsByClassName('pipfcciImgHolder')[i].innerHTML = `
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 8L13 1" stroke="#34241E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                `
            }
        }
    }
}





function addProducts(){

    let productsHolder = document.getElementById('pipProducts')
    productsHolder.innerHTML = ''
    
    returnAPI('get_products', {'limit' : 1000}).then(res => {
        console.log(res)
        if(res[1] == 'success'){
            for(let i = 0; i < res[0].length; i++){ 
                productsHolder.insertAdjacentHTML('beforeend', `
                    <div class="pippProduct reveal active fade-bottom">
                        <a href="../Product/${res[0][i]['name']}"><img src="productpictures/${res[0][i]['type']}/${res[0][i]['gender']}/${res[0][i]['color']}/${res[0][i]['file']}" alt="" class="pipppImg"></a>
                        <div class="pipppTitle text-extrabig-size w500">${res[0][i]['title']}</div>
                        <div class="pipppDescription text-small-size">${res[0][i]['description']}</div>
                        <div class="pipppPrice text-small-size w600">${res[0][i]['price']}</div>
                    </div>
                `)
            }

            filterCheckboxes(res[0])
            filterSearch()
        }else{
            console.log('something went wrong')
            console.log(res)
        }
    }).catch(err => {
        console.log('something went wrong')
        console.log(err)
    })
}




function filterCheckboxes(res){
    // console.log(res)

    let blocksDevider = document.getElementsByClassName('pipfccicField')
    let products = document.getElementsByClassName('pippProduct')
    let selBoxValues = []
    
    for(let i = 0; i < blocksDevider.length; i++){
        let blockCheckboxes = blocksDevider[i].getElementsByClassName('pipfccicffCheckbox')
        let texts = blocksDevider[i].getElementsByClassName('pipfccicffcName')

        for(let k = 0; k < blockCheckboxes.length; k++){
            blockCheckboxes[k].onclick = function(){
                
                selBoxValues[i] = texts[k].innerText
                
                for(let m = 0; m < blockCheckboxes.length; m++){

                    if(blockCheckboxes[k].checked == false){ //This makes sure that at lease one checkbox is selected
                        allUnselected = true

                        if(blockCheckboxes[m].checked == true){
                            allUnselected = false
                        }
                        if(blockCheckboxes[m].checked == false && m == blockCheckboxes.length - 1){
                            return false
                        }
                    }
                    
                    
                    for(let p = 0; p < products.length; p++){  //This goes through all products and shows only products that are selected by filters
                        
                        let filtersPassed = true
                        
                        if(res[p]['type'].charAt(0).toUpperCase() + res[p]['type'].slice(1) != selBoxValues[0] && selBoxValues[0] != 'All types'){ //Checking if first filter is passed (Type)
                            filtersPassed = false
                        }else if(res[p]['color'].charAt(0).toUpperCase() + res[p]['color'].slice(1) != selBoxValues[1] && selBoxValues[1] != 'All colors'){ //Checking if second filter is passed (Color)
                            filtersPassed = false
                        }else if(res[p]['gender'].charAt(0).toUpperCase() + res[p]['gender'].slice(1) != selBoxValues[2] && selBoxValues[2] != 'All genders'){ //Checking if third filter is passed (Gender)
                            filtersPassed = false
                        }
                        
                        if(filtersPassed == false){
                            products[p].style.display = 'none'
                        }else{
                            products[p].style.display = 'flex'
                        }
                    }
                    
                    if(k != m){
                        if(blockCheckboxes[m].checked == true){
                            blockCheckboxes[m].checked = false
                        }
                    }
                }
            }
        }


        blockCheckboxes[0].click()
    }

    // console.log(selBoxValues)
}




function filterSearch(){
    let searchInput = document.getElementById('pipfSearch')


    let inputs = 0
    let timeouts = 0
    searchInput.oninput = function(){
        inputs++

        if(searchInput.value.replace(new RegExp(" ", "g"), "") == ""){
            searchInput.style.backgroundImage = ""
        }else{
            searchInput.style.backgroundImage = "url(../../img/Products/searchbar.png)"
        }


        setTimeout(function(){
            timeouts++

            let products = document.getElementsByClassName('pippProduct')
            let searchables = document.getElementsByClassName('pipppTitle')

            if(inputs == timeouts){
                for(let i = 0; i < searchables.length; i++){
                    if(searchInput.value.replace(new RegExp(" ", "g"), "") == ""){
                        products[i].style.display = 'flex'
                    }else{
                        if(searchables[i].innerText.toLowerCase().includes(searchInput.value.toLowerCase())){
                            products[i].style.display = 'flex'
                        }else{
                            products[i].style.display = 'none'
                        }
                    }
                }
            }
        }, 200)
    }
    
}