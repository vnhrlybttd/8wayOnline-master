$(document).ready(function () {
    $('#products').DataTable(
        {
            "order": [
                [0, "desc"]
            ]
        }
    );
});

$(document).ready(function () {
    $('#pendingOrder').DataTable(
        {
            "order": [
                [0, "desc"]
            ]
        }
    );
});

$(document).ready(function () {
    $('#confirmedOrder').DataTable(
        {
            "order": [
                [0, "desc"]
            ]
        }
    );
});

$(document).ready(function () {
    $('#image').DataTable(
        
    );
});


$(document).ready(function () {
    $('#delivery').DataTable(
        {
            "order": [
                [0, "desc"]
            ],
            colReorder: true
        }
    );
});

$(document).ready(function () {
    $('#shipped').DataTable(
        {
            "order": [
                [0, "desc"]
            ]
        }
    );
});

$(document).ready(function () {
    $('#pendingDelivery').DataTable(
        {
            "order": [
                [0, "desc"]
            ]
        }
    );
});

$(document).ready(function () {
    $('#product').DataTable(
        {"order": []}
    );
});

$(document).ready(function () {
    $('#stock').DataTable(
        {"order": []}
    );
});

$(document).ready(function () {
    $('#category').DataTable(
        {"order": []}
    );
});