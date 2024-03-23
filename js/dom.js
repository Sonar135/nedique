$(window).scroll(()=>{
    console.log(window.scrollY)
    var scrollPosition = window.scrollY; // Get the current scroll position

    
  

   

    if(scrollPosition>=180 ){
       $(".upper_nav").addClass("upper_nav_close");
       $(".nav").css("background", "#04091e85");
       $("#line").css("border-bottom", "1px solid transparent ");  
    }



        if(scrollPosition<180 ){
            $(".upper_nav").removeClass("upper_nav_close");
            $(".nav").css("background", "transparent");
            $("#line").css("border-bottom", "1px solid #39353e");  
    }
     
    

   

})

$(document).ready(function() {
$(".no_acc").click(()=>{
    $(".login").css("display", "none")
    $(".signup").css("display", "flex")
})

$(".has_acc").click(()=>{
    $(".login").css("display", "flex")
    $(".signup").css("display", "none")
})



$('#toggle').click(()=>{
    $(".edit_overlay").css("display", "flex");
})


$('#blood_toggle').click(()=>{
    $(".blood_overlay").css("display", "flex");
})

$(".exit").click(()=>{
    $(".edit_overlay").css("display", "none");
    $(".blood_overlay").css("display", "none");
})


$(".right_btn").click(()=>{
    $(".line").css("display", "block");
    $(".bar").css("display", "none");
    $(".right_btn").css("background", "#37215f62")
    $(".left_btn").css("background", "#7856b3")
})


$(".left_btn").click(()=>{
    $(".bar").css("display", "block");
    $(".line").css("display", "none");
    $(".left_btn").css("background", "#37215f62")
    $(".right_btn").css("background", "#7856b3")
})




let lists = document.querySelectorAll("#list");


lists.forEach(list => {
    list.addEventListener("click", () => {
        $("#selected").html(list.innerHTML);
        $("#myInput").val(list.innerHTML);
    });
});


$('#prof').change(function(){
    // Get the selected file
    const file = $(this)[0].files[0];
    
    // Check if a file is selected
    if (file) {
        // Get the filename
        const fileName = file.name;
        
        // Output the filename
        console.log("Selected file: " + fileName);

        $(".label").html(fileName);
       
    } else {
        console.log("No file selected");
    }
});






$("#my_btn").prop("disabled", true);

$("#my_input").on("input", function() {
    if ($(this).val() !== "") {
        $("#my_btn").prop("disabled", false);
    } else {
        $("#my_btn").prop("disabled", true);
    }
});




$("#left_btn").prop("disabled", true);

$("#nav_btn").click((e) => {
    e.preventDefault(); // Invoking the preventDefault function

    $(".phase1").css("display", "none")
    $(".phase2").css("display" , "block")
    $("#left_btn").prop("disabled", false);
    $("#nav_btn").prop("disabled", true);
});




$("#sign_up_btn").prop("disabled", true); // Initially disable the sign-up button

$("input[type='text'], textarea, input[type='date'], input[type='email'], input[type='password']").on("input", function() { // Check all text input fields, textarea, and date input for changes
    var allFilled = true;
    $("input[type='text'], textarea, input[type='date'], input[type='email'], input[type='password']").each(function() {
        if ($(this).val().trim() === "") { // Use trim() to remove whitespace
            allFilled = false;
            return false; // Exit the loop early if any input field, textarea, or date input is empty
        }
    });
    
    if (allFilled) {
        $("#sign_up_btn").prop("disabled", false); // Enable the sign-up button if all input fields, textarea, and date input have values
    } else {
        $("#sign_up_btn").prop("disabled", true); // Disable the sign-up button if any input field, textarea, or date input is empty
    }
});







$("#left_btn").click((e) => {
    e.preventDefault(); // Invoking the preventDefault function
    $(".phase1").css("display", "block")
    $(".phase2").css("display", "none")
    $("#left_btn").prop("disabled", true);
    $("#nav_btn").prop("disabled", false);
});


})