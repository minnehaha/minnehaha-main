var socket = io.connect('/');//sends connections request to server from which the page was loaded.(triggers 'connection' event at server)

//waiting for message to arrive. Once received, renders on page
socket.on('message', function (data) {
    data = JSON.parse(data);
    $('#message').append('<div class="'+data.type+'">' + data.message + '</div>');
});

$(function(){
    $('#submit').click(function(){
        var data = {
//                message: $('#message').val(),
            title: $('#title').val(),
            content: $('#content').val(),
            submittedBy: $('#submittedBy').val(),
            recommendedFor: $('#recommendedFor').val(),
            type:'postReview'
        };
        socket.send(JSON.stringify(data));
        $('#title').val('');
        $('#content').val('');
        $('#submittedBy').val('');
        $('#recommendedFor').val('');
    });
//        $('#setname').click(function(){
//            socket.emit("set_name", {name:
//                $('#nickname').val() });
//        });
});