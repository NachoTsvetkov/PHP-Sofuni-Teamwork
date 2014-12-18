var links;

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

            var el = document.getElementById('commentsConainer')
            el.innerHTML = '';

            for (var i = 0; i < array.length; i++) {
                var comment = array[i];

                var span = document.createElement("span");
                span.innerHTML = comment.comment_content;
                el.appendChild(span);
            }
        },

        error: function (data) {
            console.log(data);
        }
    });
};

onCommentClick = function () {
    alert('Comment Clicked');
}
