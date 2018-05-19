<div id="srcAula">
</div>

<script>
//Padrao para iniciar frame Com Youtube API
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('srcAula', {
          height: '360',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          events: {
            // 'onReady': onPlayerReady,
            // 'onStateChange': onPlayerStateChange
            // 'stopVideo': popo
          }
        });
      }
      // function popo(event) {
      //   alert("pausou");
      // }
      // function onPlayerReady(event) {
      //         alert("carregou video");
      //       }
      //
      // function onPlayerStateChange(event) {
      //   alert('play2');
      //   // if (event.data == YT.PlayerState.PLAYING && !done) {
      //   //   setTimeout(stopVideo, 6000);
      //   //   done = true;
      //   // }
      // }

</script>
