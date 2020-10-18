let createButton = document.getElementById("create-button");
let createForm = document.getElementById("create-form");

let isCreateFormDisplaying = false;
let isUpdateFormDisplaying = false;
let isDeleteFormDisplaying = false;

// {// toggle form with DOM

// createButton.onclick = () => {
//     if(!isCreateFormDisplaying){
//         createForm.style.display = "block";
//         isCreateFormDisplaying = true;
//     }
//     else{
//         createForm.style.display = "none";
//         isCreateFormDisplaying = false;
//     }
// }

// $("#create-button").click( () => {
   
//     if(!isCreateFormDisplaying){
//         $("#create-form").css("display", "block");
//         isCreateFormDisplaying = true;
//     }
//     else{
//         $("#create-form").css("display", "none");
//         isCreateFormDisplaying = false;
//     }
// })

// }

// fade toggle create, update, delete form
{
    $("#create-button").click( () => {
        //$("#create-form").fadeToggle(5000);
        if(!isCreateFormDisplaying){
            $("#create-form").fadeIn();
            isCreateFormDisplaying = true;
        }
        else{
            $("#create-form").fadeOut();
            isCreateFormDisplaying = false;
        }
    });
    
    $("#update-button").click( () => {
        if(!isUpdateFormDisplaying){
            $("#update-form").fadeIn();
            isUpdateFormDisplaying = true; 
        }
        else{
            $("#update-form").fadeOut();
            isUpdateFormDisplaying = false;
        }
    });
    
    $("#delete-button").click( () => {
        if(!isDeleteFormDisplaying){
            $("#delete-form").fadeIn();
            isDeleteFormDisplaying = true;
        }
        else{
            $("#delete-form").fadeOut();
            isDeleteFormDisplaying = false;
        }
    });

}


// only number in ID input
{
    function validateNumber(event){
        if((event.keyCode < 48) || (event.keyCode > 57)){
            event.preventDefault();
            alert("Please, enter a number!");
        }
    };

    $(document).ready( () => {
        $(".only-number").keypress(validateNumber);
    });

    $(document).ready( () => {
        $(".only-number").keypress(validateNumber);
    })
}

/* $(document).ready( () => {
    $("#myAnchor").click( function (event){
        event.preventDefault();
    })
}) */

$(document).ready( () => {
    $("#logo-span").mouseover( () => {
        $("#para-header").css("display","block");
    })
})

$(document).ready( () => {
    $("#logo-span").mouseout( () => {
        $("#para-header").css("display", "none");
    })
})

$(document).ready( () => {
    $("#dropdown").mouseover( () => {
        $("#sublist").css("display", "block");
    })
})

$(document).ready( () => {
    $("#dropdown").mouseout( () => {
        $("#sublist").css("display", "none");
    })
})
