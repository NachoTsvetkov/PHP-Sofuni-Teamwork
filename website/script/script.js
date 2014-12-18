var links;

loadComments = function (index) {
    var id = links[index].firstChild.id.split(/\_/)[1];
    console.log(id);
};

onCommentClick = function () {
    alert('Comment Clicked');
}
