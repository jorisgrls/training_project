function initButtonsAction(selector){
    const buttonsAction = document.querySelectorAll(`${selector} .action-button`);
    const questionAction = document.querySelector(`${selector} .question-action`);
    const buttonValidate = document.querySelectorAll(`${selector} .validate-button`);
    const buttonCancel = document.querySelector(`${selector} .cancel-button`);
    buttonsAction.forEach( (buttonAction,index) => {
        displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
        buttonAction.addEventListener('click', (event) => {
            const gameId = buttonAction.getAttribute("data-id");
            hideButtonsAction(buttonsAction);
            questionAction.style.display = "block";
            buttonValidate[index].style.display = "block";
            buttonCancel.style.display = "block";
            const fct = () => {
                const dataAction = buttonValidate[index].getAttribute("data-action");
                fetch('../controllers/'+dataAction+'.php?id='+gameId)
                .then(function(response){
                    document.getElementById("game_"+gameId).style.display = "none";
                    displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
                    buttonValidate[index].removeEventListener('click', fct);
                })

                $("#main-modal").modal('hide');
            }
            buttonValidate[index].addEventListener('click', fct);

            buttonCancel.addEventListener('click', (event) => {
                displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
                buttonValidate[index].removeEventListener('click', fct);
            });
        });
    });
}

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

document.addEventListener('DOMContentLoaded', (event) => { 

    let modalButton = document.querySelectorAll(".card-img-top");
    let id = null;

    modalButton.forEach( modal => {
        modal.addEventListener('click', (event) => {
            id = modal.getAttribute("data-id");
            $("#main-modal").modal('show');
            $.ajax({
                url:'../controllers/getGame.php?id='+id,
                dataType: 'json',
                success: function(data) {
                    document.querySelector("#exampleModalLongTitle").innerHTML = data.title;
                    document.querySelector("#img-modal").src = data.img;
                    document.querySelector("#desc-modal").innerHTML = data.description;
                    document.querySelector("#nb-players-modal").innerHTML = data.nb_players+" players";
                    document.querySelector("#editor-modal").innerHTML = data.name_editor;
                    document.querySelector("#playingtime-modal").innerHTML = data.playingtime+" minuts";
                    document.querySelectorAll("#main-modal .action-button").forEach(button => {
                        button.setAttribute("data-id",id);
                    });
                }
            });
        });
    });

    initButtonsAction("#main-modal");


    const btnClose = document.querySelector(".btn-close");
    btnClose.addEventListener('click', (event) => {
        $("#main-modal").modal('hide');
    });

});
    