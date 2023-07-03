if(document.readyState === 'ready' || document.readyState === 'complete') {
    headerLinks()
} else {
    document.addEventListener("readystatechange", (event) => {
        if (document.readyState == "complete") {
            headerLinks()
        }
    });
}







function headerLinks(){
    // console.log(window.location)
    let links = document.getElementsByClassName('hilLink')

    for(let i = 0; i < links.length; i++){
        if(links[i].href == window.location.href){
            links[i].classList.add('hilLinkIn')
            break
        }
        // console.log(links[i].href)
    }
}


// returnAPI('get_products', 7).then(res => {
//     console.log('res', res)
// }).catch(err => {
//     console.log('err', err)
// })



function returnAPI(action, params){
    return new Promise(resolve => {
        let user = {
            "action" : action,
            "params" : params
        }

        let options = {
            method: 'POST',
            headers: {'Content-Type': 'application/json;charset=utf-8', "Accept": "application/json"},
            body: JSON.stringify(user)
        }
        
        let fetchRes = fetch(`${window.location.origin}/logic/getApi`, options);

        fetchRes.then(res => res.json()).then(result => {
            resolve([result, 'success'])
            // console.log([result, 'success'])
        }).catch(err => {
            resolve([err, 'error'])
            console.log([err, 'error'])
        });
    })
}