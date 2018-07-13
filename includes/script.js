var owner=[];
var isMenuOpen = 0;
var userName = document.querySelector(".user").textContent;


 $("#menuButt").click(function() {    // Opening and closing menu with animation
        if(isMenuOpen == 0) {
            $("section nav, section h1").css("display", "block");
            $("section nav, section h1").animate({left: "0px"});
            $("#menuButt").html("<i class=\"fa fa-arrow-left fa-2x\" aria-hidden=\"true\"></i>");
            $("main").css("position", "relative");
            $("main").animate({left: "600px"});
            $("main").css("display", "none");
            isMenuOpen = 1;
        }
        else {
            $("main").css("display", "block");
            $("main").animate({left: "0px"});
            $("#menuButt").html("<i class=\"fa fa-bars fa-2x\" aria-hidden=\"true\"></i>");
            $("section nav, section h1").animate({left: "-500px"});
            $("section nav, section h1").css("display", "none");
            isMenuOpen = 0;
        }
    })

$("#indexMain section button ").click(function() {
    window.location.href = 'addCars.html';
})

// check the user name and the car he uses -> continue to allowed cars
if (document.getElementById("addCarsMain")){
    var carList = document.querySelector("#addCarsMain");
    carList.addEventListener("click",checkPressed);
    function checkPressed(e){
        var el=e.target;
        if (el.classList.contains("addCarBoxes")){
            c=el.childNodes[3].textContent;
            var checkUser = c.includes(userName);
            if (checkUser==true){chooseCar()}
            else{notAllowedCar()}
        }
        else if(el.parentNode.classList.contains("addCarBoxes")){
            var cF=el.parentNode;
            var c=cF.childNodes[3].textContent;
            var checkUser = c.includes(userName);
            if (checkUser==true){chooseCar()}
            else{notAllowedCar()}
        }
    }
    function chooseCar(){
        window.location.href = 'allowedCar.html';
    }
    function notAllowedCar(){
        window.location.href = 'notAllowedCar.html';
    }
}
// allowed cars -> continue to the friends list
else if (document.getElementById("chooseAllowed")){
    var continueAllowedCar = document.querySelector("#chooseAllowed");
    continueAllowedCar.addEventListener("click",friendSelection);
    function friendSelection(e){
        var el=e.target;
        console.log(el);
        console.log(el.parentNode);
        console.log(el.childNodes[0]);
        console.log(el.childNodes[0].classList.contains("allowedCar"));
        console.log(el.parentNode.classList.contains("allowedCar"));
        if (el.childNodes[0].classList.contains("allowedCar")){
            friends();
        }
        else if(el.parentNode.classList.contains("allowedCar")){
            friends();
        }
    }
    function friends(){
        window.location.href = "friendsList.html";
    }
}

//friends list -> continue to systems list

else if(document.getElementById("friendsList")){
    var systemsPage = document.querySelector('.nextBtn');
    systemsPage.addEventListener("click",goToSystems);
    var friend = document.querySelectorAll(".addFriendPlus");
    for (i=0;i<friend.length;i++){
        friend[i].addEventListener("click",selectFriends);
    }
    function selectFriends(e){
        var el=e.target;
        if (el.textContent=='+'){
            el.textContent='-';
            el.style.backgroundColor = '#ff0000';
        }
        else if(el.textContent=='-'){
            el.textContent='+';
            el.style.backgroundColor = '#008000'
        }
    }
    function goToSystems(e){
        var el=e.target;
        if(el.classList.contains("nextBtn")){
            window.location.href = 'systemList.html';
        }
    }
}

// systems list -> continue to play list

else if (document.getElementById("systemsList")){
    var playListPage=document.querySelector('.nextBtn');
    playListPage.addEventListener("click",goToMusic);
    var system = document.querySelectorAll(".addSystemPlus");
    for(i=0;i<system.length;i++){
        system[i].addEventListener("click",selectSystem);
    }
    function selectSystem(e){
        var el=e.target;
        if(el.textContent=='+'){
            el.textContent='-';
            el.style.backgroundColor = '#ff0000';
        }
        else if(el.textContent=='-'){
            el.textContent='+';
            el.style.backgroundColor = '#008000';
        }
    }
    function goToMusic(e){
        var el=e.target;
        if(el.classList.contains("nextBtn")){
            window.location.href = 'playList.php';
        }
    }
}

$(document).on ('click' , '.fa-trash',  function () {   // delete song function
        var id = $(this).attr('id');
        var splitid = id.split("_");
        var deleteid = splitid[0];
        $.ajax({
            url: 'includes/action.php',
            type: 'POST',
            cache: true,
            data: { id: deleteid },
            success: function (response) {
                var json = JSON.parse(response);
                var songs = '<section class="songBox"></section>';
                for (var obj of json) {
                    songs += '<section class="songBox"><img class="songImg" src=' + obj.img +
                        '><p class="songName needFont"> ' + obj.songName +
                        ' ---- ' + obj.time +
                        ' ---- ' + obj.user +
                        '</p><p class="writerName needFont">' + obj.singer +
                        '</p><button><i class="fa fa-trash" id=' + obj.id +
                        ' aria-hidden="true"></i></button></section>';
                }
                songs += '<audio controls>';
                for(var obj1 of json) {
                    songs += '<source src= ' + obj1.mp3 +  ' type= "audio/mpeg">';
                }
                songs += '</audio>';
                $('#dynamic_data').html(songs);

                $(this).closest('section').fadeOut(500, function() {
                    $(this).remove();
                })
            }
        })
     })