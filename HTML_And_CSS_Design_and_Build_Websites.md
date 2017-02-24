### Ch2.Text 
- headings 
`h1,h2,h3,h4,h5,h6`

- paragraphs
`p`

- bold italic 
`b i`

- superscript subscript
`sup sub`

- breaks horizontal
`br hr`

- strong emphasis
`strong em`


### Ch7.Forms

表单控制类型
- 文本输入
- 密码输入
- 文本域输入
- 单选按钮
- 多选按钮
- 下拉菜单
- 提交按钮
- 图片按钮
- 文件上传

form的结构
```
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
```

### 8.额外markup

### 9.Video和Audio
```
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
```
