document.addEventListener('DOMContentLoaded', (event) => { 

    let modalButton  = document.querySelectorAll(".card-img-top");
    modalButton.forEach(modal =>{
        let id = modal.getAttribute("data-id");
        let removeOwnGameButton  = document.querySelector("#removeOwnGame");
        removeOwnGameButton.addEventListener('click', function(){
            console.log("ok");
            /*Ici il faudra mettre une modal de confirmation de suppression*/
            fetch('../controllers/removeOwnGame.php?id='+id)
            .then(function(response){
                document.getElementById("id_"+id).style.display = "none";
                $("#main-modal").modal('hide');
            })
            
        });
    })
    
    
})

/*
let modalButton  = document.querySelector(".card-img-top");
    let id = modalButton.getAttribute("data-id");
    let removeOwnGameButton  = document.querySelector("#removeOwnGame");
    removeOwnGameButton.addEventListener('click', function(){
        console.log("ok");
        
        fetch('../controllers/removeOwnGame.php?id='+id)
        .then(function(response){
            document.getElementById("id_"+id).style.display = "none";
            $("#main-modal").modal('hide');
        })
        
    });
 */