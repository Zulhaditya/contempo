// function tambahWorkspace() {
//   var div = document.getElementById("contentUtama"),
//     clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
//   clone.id = "some_id";
//   document.body.appendChild(clone);
// }

$(document).ready(function () {
  $("#eventBtn").click(function () {
    $(".main").clone().appendTo("#gas");
    
  });
});

// $("body").on("click", ".add-btn", function () {
//   var copyContent = $("#copy-this-div").clone();

//   $(".parent-div").append(copyContent);
// });