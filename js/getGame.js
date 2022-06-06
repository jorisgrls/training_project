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
                let validateQuestion = document.querySelector("#validate-question");
                validateQuestion.style.display = "none";
                let buttonValidateYes = document.querySelector("#validate-yes");
                buttonValidateYes.style.display = "none";
                let buttonValidateCancel = document.querySelector("#validate-cancel");
                buttonValidateCancel.style.display = "none";
                let removeOwnGameButton  = document.querySelector("#removeOwnGame");
                removeOwnGameButton.style.display = "block";
                removeOwnGameButton.addEventListener('click', function(){
                    validateQuestion.style.display = "block";
                    buttonValidateYes.style.display = "block";
                    buttonValidateCancel.style.display = "block";
                    removeOwnGameButton.style.display = "none";
                    buttonValidateYes.addEventListener('click', function(){
                        fetch('../controllers/removeGame.php?id='+id)
                        .then(function(response){
                            document.getElementById("id_"+id).style.display = "none";
                            $("#main-modal").modal('hide');
                            removeOwnGameButton.style.display = "block";
                        })
                    })
                    buttonValidateCancel.addEventListener('click', function(){
                        validateQuestion.style.display = "none";
                        removeOwnGameButton.style.display = "block";
                        buttonValidateYes.style.display = "none";
                        buttonValidateCancel.style.display = "none";
                    })
                });
            }
            else if(page == "wishlist.php"){
                let removeWishlistAddOwnGamesButton = document.querySelector("#removeWishlistAddOwnGames");
                removeWishlistAddOwnGamesButton.style.display = "block";
                let removeWishlistButton = document.querySelector("#removeWishlist");
                removeWishlistButton.style.display = "block";
                let validateQuestion = document.querySelector("#validate-question");
                validateQuestion.style.display = "none";
                let validateAddOwnGames = document.querySelector("#validate-add-owngames");
                validateAddOwnGames.style.display = "none";
                let validateRemoveWishlist = document.querySelector("#validate-remove-wishlist");
                validateRemoveWishlist.style.display = "none";
                let validateCancel = document.querySelector("#validate-cancel");
                validateCancel.style.display = "none";
                removeWishlistButton.addEventListener('click', function(){
                    validateQuestion.style.display = "block";
                    validateRemoveWishlist.style.display = "block";
                    validateCancel.style.display = "block";
                    removeWishlistButton.style.display = "none";
                    removeWishlistAddOwnGamesButton.style.display = "none";
                    validateRemoveWishlist.addEventListener('click', function(){
                        fetch('../controllers/removeGame.php?id='+id)
                        .then(function(response){
                            document.getElementById("id_"+id).style.display = "none";
                            $("#main-modal").modal('hide');
                            removeWishlistAddOwnGamesButton.style.display = "block";
                            removeWishlistButton.style.display = "block";
                        })
                    })
                    validateCancel.addEventListener('click', function(){
                        validateQuestion.style.display = "none";
                        removeWishlistButton.style.display = "block";
                        removeWishlistAddOwnGamesButton.style.display = "block";
                        validateRemoveWishlist.style.display = "none";
                        validateCancel.style.display = "none";
                    })
                    
                    
                });
                
                removeWishlistAddOwnGamesButton.addEventListener('click', function(){
                    validateQuestion.style.display = "block";
                    validateAddOwnGames.style.display = "block";
                    validateCancel.style.display = "block";
                    removeWishlistAddOwnGamesButton.style.display = "none";
                    removeWishlistButton.style.display = "none";
                    validateAddOwnGames.addEventListener('click', function(){
                        fetch('../controllers/removeWishlistAddOwnGames.php?id='+id)
                        .then(function(response){
                            document.getElementById("id_"+id).style.display = "none";
                            $("#main-modal").modal('hide');
                            removeWishlistAddOwnGamesButton.style.display = "block";
                            removeWishlistButton.style.display = "block";
                        })
                    })
                    validateCancel.addEventListener('click', function(){
                        validateQuestion.style.display = "none";
                        removeWishlistAddOwnGamesButton.style.display = "block";
                        removeWishlistButton.style.display = "block";
                        validateAddOwnGames.style.display = "none";
                        validateCancel.style.display = "none";
                    })
                });
            }
        });
    });   
});