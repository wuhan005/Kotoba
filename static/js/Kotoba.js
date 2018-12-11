$('#Btn_SearchSong').click(
    function () {
        
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
            $('#LyricContainer').remove('.custom-checkbox');

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