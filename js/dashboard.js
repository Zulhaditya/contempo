$(document).ready(function () {
  var list = $(".list");
  var list_block;

  for (var key in song_list) {
    list_block = $('<div class="list_block"></div>');
    list.append(list_block);

    list_block.append(
      '<span class="play_btn"><img class="play_icon" src="img/play.png"><img class="pause_icon" src="img/pause.png"></span>'
    );

    list_block.append(
      '<span class="song_title">' + song_list[key].title + "</span>"
    );

    list_block.append(
      '<span class="song_creator">' + song_list[key].creator + "</span>"
    );

    list_block.append(
      '<span class="song_genre">' + song_list[key].genre + "</span>"
    );

    list_block.append(
      '<span class="song_duration">' + song_list[key].duration + "</span>"
    );

    list_block.append(
      '<span class="beat_animation"><ul><li></li><li></li><li></li><li></li><li></li></ul></span>'
    );

    list_block.append(
      '<span class="track"><audio id="audio" controls><source src="lagu/' +
        song_list[key].track +
        '" type="audio/mp3"></audio></span>'
    );

    list_block.append(
      '<span class="download_btn"><a target="_blank" href="lagu/' +
        song_list[key].track +
        '"><img src="img/download.png"></a></span>'
    );
  }

  // Fungsi play
  $(".list_block .play_btn .play_icon").on("click", function (current) {
    $(this).parent().find(".play_icon").css("display", "none");
    $(this).parent().find(".pause_icon").css("display", "inline-block");
    $(".play_icon")
      .not(this)
      .parent()
      .find(".pause_icon")
      .css("display", "none");
    $(".play_icon")
      .not(this)
      .parent()
      .find(".play_icon")
      .css("display", "inline-block");

    // Class add dan remove
    $(this).parent().parent().addClass("isPlaying");
    $(".play_icon").not(this).parent().parent().removeClass("isPlaying");

    // Animasi tombol play
    $(this)
      .parent()
      .parent()
      .find(".beat_animation li")
      .css("animation-play-state", "running")
      .css("opacity", "1");

    $(".play_icon")
      .not(this)
      .parent()
      .parent()
      .find(".beat_animation li")
      .css("animation-play-state", "paused")
      .css("opacity", ".1");

    // Pause lagu yang diputar disaat next/prev lagu
    $("audio").each(function (e) {
      if (e != current.currentTarget) {
        $(this)[0].pause();
      }
    });

    // Play salah satu lagu
    $(this).parent().parent().find(".track audio")[0].play();
  });

  // Fungsi Pause
  $(".list_block .play_btn .pause_icon").on("click", function () {
    // Sembunyikan tombol pause
    $(this).parent().find(".pause_icon").css("display", "none");

    // Tampilkan tombol play
    $(this).parent().find(".play_icon").css("display", "inline-block");

    // Animasi beat saat pause
    $(this)
      .parent()
      .parent()
      .find(".beat_animation li")
      .css("animation-play-state", "paused");

    // Pause salah satu lagu
    $(this).parent().parent().find(".track audio")[0].pause();
  });
});
