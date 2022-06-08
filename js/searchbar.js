document.addEventListener('DOMContentLoaded', (event) => { 
    const searchbar = document.querySelector("#searchbar");
    let isWriting;
    searchbar.addEventListener('keydown', function(){
        if(isWriting){
            clearTimeout(isWriting);
        }
        isWriting = setTimeout(isNotWriting, 2000);
    });

    function isNotWriting(){
        /* BINGOOOOOO */
        console.log(searchbar.value);
    }

    
});