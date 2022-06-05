document.addEventListener('DOMContentLoaded', (event) => { 

    const path = window.location.pathname;
    const page = path.split("/").pop();

    let modalButton  = document.querySelectorAll(".card-img-top");
    modalButton.forEach(modal =>{
        modal.addEventListener('click', function(){
            let id = modal.getAttribute("data-id");
            $("#main-modal").modal('show');
            $.ajax({
                url:'../controllers/getGame.php?id='+id,
                dataType: 'json',
                success: function(data) {
                    document.querySelector("#exampleModalLongTitle").innerHTML = data.title;
                    document.querySelector("#img-modal").src = data.img;
                    document.querySelector("#desc-modal").innerHTML = data.description;
                    document.querySelector("#nb-players-modal").innerHTML = "Nombre de joueurs : "+data.nb_players;
                    document.querySelector("#editor-modal").innerHTML = "Editeur : "+data.id_editor;
                }
            });
            if(page == "owngames.php"){
                /* REMOVE OWN GAME */
                let removeOwnGameButton  = document.querySelector("#removeOwnGame");
                removeOwnGameButton.addEventListener('click', function(){
                    /*Ici il faudra mettre une modal de confirmation de suppression*/
                    fetch('../controllers/removeGame.php?id='+id)
                    .then(function(response){
                        document.getElementById("id_"+id).style.display = "none";
                        $("#main-modal").modal('hide');
                    })
                });
            }
            else if(page == "wishlist.php"){
                let removeWishlistButton = document.querySelector("#removeWishlist");
                removeWishlistButton.addEventListener('click', function(){
                    fetch('../controllers/removeGame.php?id='+id)
                    .then(function(response){
                        document.getElementById("id_"+id).style.display = "none";
                        $("#main-modal").modal('hide');
                    })
                });

                let removeWishlistAddOwnGamesButton = document.querySelector("#removeWishlistAddOwnGames");
                removeWishlistAddOwnGamesButton.addEventListener('click', function(){
                    fetch('../controllers/removeWishlistAddOwnGames.php?id='+id)
                    .then(function(response){
                        document.getElementById("id_"+id).style.display = "none";
                        $("#main-modal").modal('hide');
                    })
                });
            }
        });
    });

    let closeButton = document.querySelector(".close");
    closeButton.addEventListener('click', function(){
        $("#main-modal").modal('hide');
    });
});