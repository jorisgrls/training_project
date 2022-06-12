document.addEventListener('DOMContentLoaded', (event) => { 
    var searchbar = document.querySelector("#searchbar");
    var results = document.querySelector("#results");
    let isWriting;
    searchbar.addEventListener('keydown', listenIfIsWriting, false); 
    searchbar.addEventListener('click', listenIfIsWriting, false);

    function listenIfIsWriting(){
        if(isWriting){
            clearTimeout(isWriting);
            results.style.display = "none";
            results.innerHTML = '';
        }
        isWriting = setTimeout(isNotWriting, 1000);
    }

    function isNotWriting(){
        results.style.display = "block";
        $.ajax({
            url:'../controllers/callApi.php?name='+searchbar.value,
            dataType: 'json',
            success: function(data) {
                if(!searchbar.value){
                    results.style.display = "none";
                    results.innerHTML = '';
                }
                else if (data.length == 0){
                    results.innerHTML += "<li class='list-group-item list-group-item-action'>No results for this game</li>";
                }
                else{
                    data.forEach(element => {
                        results.innerHTML += "<li class='list-group-item list-group-item-action name-game' id='"+element[1]+"'>"+element[0]+"</li>";
                    });
                }   
            }
        }); 
        setTimeout(resultsManagement,1100); //on attend que ce soit bien affiché

        function resultsManagement(){
            const games = document.querySelectorAll(".name-game");
            games.forEach( (game) => {
                game.addEventListener('click', (event) => {
                    searchbar.value = '';
                    let id = game.getAttribute("id");
                    checkGame(id);
                });
            });
        }
        
    }

    function checkGame(idGame){
        $.ajax({
            url:'../controllers/gameInDatabase.php?id='+idGame,
            dataType: 'json',
            success: function(data) {
                console.log("ok");
                results.style.display = "none";
                results.innerHTML = '';
                openModalSearchbar();
            }
        });
    }

    function openModalSearchbar(){
        $("#searchbar-modal").modal('show');
    }

    document.addEventListener('click',(event) =>{
        if(!(event.target.id == "searchbar")){
            results.style.display = "none";
            results.innerHTML = '';
            
        }
    })
});