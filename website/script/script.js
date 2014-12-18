var links, imageIndex;

loadComments = function (index) {
    var id = links[index].firstChild.id.split(/\_/)[1];

    $.ajax({
        url: "get_comments",
        type: "POST",
        data: {id: id},
        dataType: "json",
        success: function (data) {
            var array = $.map(data, function (value, index) {
                return [value];
            });

            var el = document.getElementById('commentsConainer');
            el.innerHTML = '';

            for (var i = 0; i < array.length; i++) {
                var comment = array[i];

                console.log(comment);

                var p = document.createElement("p");

                var span_content = document.createElement("span");
                span_content.innerHTML = comment.comment_content;

                var span_name = document.createElement("span");
                span_name.innerHTML = comment.user_name;

                var span_date = document.createElement("span");
                span_date.innerHTML = comment.comment_date;

                p.appendChild(span_content);
                p.appendChild(span_name);
                p.appendChild(span_date);

                el.appendChild(p);
            }
        },

        error: function (data) {
            console.log(data);
        }
    });
};

onCommentClick = function () {
    var id = links[imageIndex].firstChild.id.split(/\_/)[1];
    var content = document.getElementById('txtComment').value;
    document.getElementById('txtComment').value = '';

    if (content != '') {
        console.log(content);
        $.ajax({
            url: "set_comment",
            type: "POST",
            data: { id: id, content: content },
            dataType: "json",
            success: function (data) {
                console.log(data);

                loadComments(imageIndex);
            },

            error: function (data) {
                console.log(data);
            }
        });
    }
}
