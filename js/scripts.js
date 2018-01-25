$( document ).ready(function() {

    $( "#go" ).click(function() {
        $("#results").empty();
        var userInputGame = $("#q").val();

        var jqxhr = $.post( "util_get_games.php", {q: userInputGame}, function(data) {

            if(data[0]=="no result"){
               alert("No result found");
            }else{
                displayResults(data);
            }

        })
            .fail(function() {
                console.log( "error" );
            });
    });

    function displayResults(data){
        var gameRow="";
        $.each(data, function( index, value ) {
            gameRow +=' <div class="list-group-item clearfix">\n' +
                '        <div class="pull-left">\n' +
                '            <h4 class="list-group-item-heading">Game name: '+value["name"]+'</h4>\n' +
                '            <p class="list-group-item-text">id: '+value["id"]+'</p>\n' +
                '        </div>\n' +
                '        <span class="pull-right">\n' +
                '            <img src="/game_search/'+value["image"]+'" class="img-responsive" style="max-height: 100px">\n' +
                '        </span>\n' +
                '    </div>';

        });

        $("#results").append(gameRow);

    }

});