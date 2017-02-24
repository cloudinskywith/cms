<template>
    <form action="url_to_server" method="get">
        <fieldset>
            <legend>账户信息</legend>
            <label for="username">Username</label>
            <input type="text" name="username" maxlength="30"/>
            <label for="password">Password</label>
            <input type="password" name="password" maxlength="30"/>
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" maxlength="11">
        </fieldset>

        <textarea name="comments" id=""></textarea>
        <p>选择最喜欢的音乐类型:
            <input type="radio" name="genre" value="rock" checked="checked">Rock
            <input type="radio" name="genre" value="pop">Pop
            <input type="radio" name="genre" value="jazz">Jazz
        </p>
        <p>选择最喜欢的服务类型:
            <input type="checkbox" name="service" value="itunes" checked="checked">iTunes
            <input type="checkbox" name="service" value="lastfm">Last.fm
            <input type="checkbox" name="service" value="spotify">Spotify
        </p>
        <p>收听音乐的方式:
            <select name="devices">
                <option value="ipod">iPod</option>
                <option value="radio">Radio</option>
                <option value="computer" selected>Computer</option>
            </select>
        </p>
        <p>上传文件: </p>
        <input type="file" name="user-song">

        <input type="submit" name="subscribe" value="上传">
        <input type="image" src="http://news.sohu.com/upload/itoolbar/channel/sohu_channel_logo_0507.gif" width="100"
               height="20">
        <button><img src="http://news.sohu.com/upload/itoolbar/channel/sohu_channel_logo_0507.gif" alt="add" width="10"
                     height="10" name="bookmark">Add
        </button>
    </form>
</template>

<script>

</script>

<style>

</style>