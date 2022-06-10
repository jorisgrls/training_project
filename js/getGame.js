document.addEventListener('DOMContentLoaded', (event) => { 

    let modalButton = document.querySelectorAll(".card-img-top");
    modalButton.forEach( modal => {
        modal.addEventListener('click', (event) => {
            const id = modal.getAttribute("data-id");
            const buttonsAction = document.querySelectorAll('.action-button');
            const questionAction = document.querySelector('.question-action');
            const buttonValidate = document.querySelectorAll('.validate-button');
            const buttonCancel = document.querySelector('.cancel-button');
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
            buttonsAction.forEach( (buttonAction,index) => {
                displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
                buttonAction.addEventListener('click', (event) => {
                    hideButtonsAction(buttonsAction);

                    questionAction.style.display = "block";
                    buttonValidate[index].style.display = "block";
                    buttonCancel.style.display = "block";

                    buttonValidate[index].addEventListener('click', (event) => {
                        const dataAction = buttonValidate[index].getAttribute("data-action");
                        fetch('../controllers/'+dataAction+'.php?id='+id)
                        .then(function(response){
                            document.getElementById("game_"+id).style.display = "none";
                        })
                        $("#main-modal").modal('hide');

                    });
                    buttonCancel.addEventListener('click', (event) => {
                        displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
                    });
                });
            });
        });
    });

    function displayButtonAction(buttonsAction, questionAction, buttonValidate, buttonCancel){
        buttonsAction.forEach( (buttonAction) => {
            buttonAction.style.display = "block";
        });
        questionAction.style.display = "none";
        buttonValidate.style.display = "none";
        buttonCancel.style.display = "none";
    }

    function hideButtonsAction(buttonsAction){
        buttonsAction.forEach( (buttonAction) => {
            buttonAction.style.display = "none";
        });
    }

});
    