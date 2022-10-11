// console.log("in atom");
function build(mode) {
  $("#log").load("log.php?mode=" + mode);
  tally();
}
function tally() {
  $("#tally").load("log.php?mode=tally");
}

// ajax
$(document).ready(function () {
  setInterval(function () {
    let mode = $("#btn-mode").data("mode") == "restor" ? "restor" : "build";

    build(mode);
  }, 30000);

  $("#btn-mode").on("click", function (event) {
    event.preventDefault();
    let mode = $(this).data("mode");
    if (mode == "restor") {
      build("restor");
      $(this).data("mode", "live");
      $("#lbl-mode").html("Live");
    } else {
      build("build");
      $(this).data("mode", "restor");
      $("#lbl-mode").html("Restore");
    }
  });
  $("#form-new").submit(function (event) {
    event.preventDefault();

    let form = $(this);
    let data = form.serialize();

    var task = $("#task").val();

    $.ajax({
      url: "log.php?mode=newTesk",
      data: data,
      success: function () {
        build("build");
      },
    });
  });
});

// ------------ stop botun
$("#log").on("click", ".btn-stop", function () {
  let id = $(this).data("id");
  console.log("id", id);

  $.ajax({
    url: "log.php?mode=stop&id=" + id,
    success: function () {
      build();
    },
  });
});

// ------------ removr botun
$("#log").on("click", ".btn-remove", function () {
  let id = $(this).data("id");

  $.ajax({
    url: "log.php?mode=remove&id=" + id,
    success: function () {
      build("build");
    },
  });
});

// ------------ restor botun
$("#log").on("click", ".btn-restor", function () {
  let id = $(this).data("id");

  $.ajax({
    url: "log.php?mode=restorStatus&id=" + id,
    success: function () {
      build("restor");
    },
  });
});

// $( document ).ready(function() {
//     console.log( "ready!" );
// });
