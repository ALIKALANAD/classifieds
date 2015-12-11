(function(){

    $.goup({
        title: 'Go Top',
        titleAsText: true,
    });

    $('#category-filter, #states-filter').metisMenu({
        doubleTapToGo: false,
    });

    $('#user-posts-table').DataTable();

}());