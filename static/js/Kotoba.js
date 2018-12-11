$('#Btn_SearchSong').click(
    function () {
        //Search Songs.

        var keyWord = $('#SongName').val();

        $('#songTableContent').empty();

        $.ajax({
            type:'GET',
            async: false,
            url: 'https://c.y.qq.com/soso/fcgi-bin/search_cp?ct=24&aggr=1&cr=1&lossless=1&p=1&n=8&w=' + keyWord + '&format=jsonp&inCharset=utf8&outCharset=utf-8&callback=callback&_=1544531077787',
            dataType: "jsonp",
            jsonpCallback: 'callback',
            success : function(data) {
                for(var i = 0; i < data['data']['song']['list'].length; i++){
                    var singleSongModel =
                        '<tr>\n' +
                        '<td>' + data['data']['song']['list'][i]['songname'] + '</td>\n' +
                        '<td>' + data['data']['song']['list'][i]['singer'][0]['name'] + '</td>\n' +
                        '<td><button onclick="showLyric(\'' + data['data']['song']['list'][i]['songmid'] + '\')" type="button" class="btn btn-primary btn-sm">Load</button></td>\n' +
                        '</tr>';

                    $('#songTableContent').append(singleSongModel);
                }

            }
        })
    }
);


function showLyric(_mid){
    $.ajax({
        type : "GET",
        async: false,
        url : '/Manage/GetLyric?mid=' + _mid,
        dataType: "jsonp",
        jsonpCallback: 'MusicJsonCallback',
        success : function(data) {
            //Used to decode the lyric.
            var t = document.createElement("div");
            t.innerHTML = data.lyric;

            lrc = LrcKit.Lrc.parse(t.innerHTML).lyrics;

            //Load the lyric into the container.

            //Clean the container first.
            $('#LyricContainer').empty();

            for(var i = 0; i < lrc.length; i++){

                if(lrc[i]['content'] == ''){
                    continue;
                }

                var str =
                    '<div class="custom-control custom-checkbox">\n' +
                    '<input type="checkbox" class="custom-control-input" id="lrc_' + i + '">\n' +
                    '<label class="custom-control-label" for="lrc_'+ i +'">' + lrc[i]['content'] + '</label>\n' +
                    '</div>\n';
                $('#LyricContainer').append(str);
            }
        }
    });
}