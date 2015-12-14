(function(){

    $('[data-toggle="tooltip"]').tooltip();

    $.goup({
        title: 'Go Top',
        titleAsText: true,
        bottomOffset: 20,
        trigger: 450,
    });

    $('#category-filter, #states-filter').metisMenu({
        doubleTapToGo: false,
    });

}());