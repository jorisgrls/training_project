document.addEventListener('DOMContentLoaded', (event) => { 
    var searchbar = document.querySelector("#searchbar");
    var results = document.querySelector("#results");
    let isWriting;
    searchbar.addEventListener('keydown', function(){
        if(isWriting){
            clearTimeout(isWriting);
            results.style.display = "none";
            results.innerHTML = '';
        }
        isWriting = setTimeout(isNotWriting, 2000);
    });

    function isNotWriting(){
        let value = searchbar.value;
        value = value.replace(/ /g, '+');
        results.style.display = "block";
        $.ajax({
            url:'../controllers/callApi.php?name='+value,
            dataType: 'json',
            success: function(data) {
                data.forEach(element => {
                    results.innerHTML += "<li class='list-group-item list-group-item-action name-game' id='"+element[1]+"'>"+element[0]+"</li>";
                });
                const games = document.querySelectorAll(".name-game");
                games.forEach( (game) => {
                    game.addEventListener('click', (event) => {
                        const id = game.getAttribute("id");
                        checkGame(id);
                    });
                });
            }
        }); 
    }

    function checkGame(idGame){
        $.ajax({
            url:'../controllers/gameInDatabase.php?id='+idGame,
            dataType: 'json',
            success: function(data) {
                //actions

            }
        });
    }
});