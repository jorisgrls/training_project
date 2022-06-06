document.addEventListener('DOMContentLoaded', (event) => { 
    let searchbar = document.querySelector("#searchbar");
    let x;
    searchbar.addEventListener('keypress', function(){
        if(x){
            clearTimeout(x);
        }
        x = setTimeout(isNotWriting, 2000);
    });

    function isNotWriting(){
        /* BINGOOOOOO */
        console.log(searchbar.value);
    }

    
});