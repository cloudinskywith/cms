<template>
    <div>
        <video src="video/puppy.mp4"
               poster="images/puppy.jpg"
               width="400" height="300"
               preload
               controls
               loop>
            <p>猫在玩雪</p>
        </video>

        <video poster="images/puppy.jpg" width="400"
               height="320" preload controls loop>
            <source src="video/puppy.mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
            <source src="video/puppy.webm" type='video/webm;codecs="vp8, vorbis"' />
            <p>猫在玩雪</p>
        </video>

        <audio src="audio/test-audio.ogg"
               controls autoplay>
            <p>This browser does not support our audio
                format.</p>
        </audio>

        <audio controls autoplay>
            <source src="audio/test-audio.ogg" />
            <source src="audio/test-audio.mp3" />
            <p>This browser does not support our audio format.</p>
        </audio>
    </div>
</template>

<script>

</script>

<style>

</style>