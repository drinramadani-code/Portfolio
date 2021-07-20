$(".project_categorie").click(function() {
  let element = $(this)[0];
  $(".project_categorie_div").hide(500);
  $(`#${element.id}_div`).show(500);
  $(`#${element.id}_div > .container > .row > .project`).css({
    width: "300px",
    height: "300px",
    margin: "5px",
    padding: 0
  });

  $("#projects_section .categories ul li.current_project_categorie").removeClass("current_project_categorie");
  $(this).addClass("current_project_categorie");

});

$(document).ready(function() {
  $("input[type='text']").val();
});