document.addEventListener('DOMContentLoaded', (event) => { 

    let modalButton = document.querySelectorAll(".card-img-top");
    const buttonsAction = document.querySelectorAll('.action-button');
    const questionAction = document.querySelector('.question-action');
    const buttonValidate = document.querySelectorAll('.validate-button');
    const buttonCancel = document.querySelector('.cancel-button');
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
                }
            });
        });
    });

    buttonsAction.forEach( (buttonAction,index) => {
        //console.log(buttonAction); //ok
        displayButtonAction(buttonsAction, questionAction, buttonValidate[index], buttonCancel);
        buttonAction.addEventListener('click', (event) => {
            //console.log(buttonAction); //ok
            hideButtonsAction(buttonsAction);

            questionAction.style.display = "block";
            buttonValidate[index].style.display = "block";
            buttonCancel.style.display = "block";
            //console.log(buttonValidate);
            const fct = () => {
                console.log({
                    button:buttonValidate[index],
                    index,
                    buttonAction
                });
                const dataAction = buttonValidate[index].getAttribute("data-action");
                fetch('../controllers/'+dataAction+'.php?id='+id)
                .then(function(response){
                    document.getElementById("game_"+id).style.display = "none";
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

    const btnClose = document.querySelector(".btn-close");
    btnClose.addEventListener('click', (event) => {
        $("#main-modal").modal('hide');
    });

});
    