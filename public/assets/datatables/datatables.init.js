(function($) {
    "use strict"
    //example 1
    var table = $('#examplebasictable').DataTable({
        createdRow: function(row, data, index) {
            $(row).addClass('selected')
        }
    });

    table.on('click', 'tbody tr', function() {
        var $row = table.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });



    //example 2
    // var table2 = $('#example2').DataTable({
    //     createdRow: function(row, data, index) {
    //         $(row).addClass('selected')
    //     },

    //     "scrollY": "42vh",
    //     "scrollCollapse": true,
    //     "paging": false
    // });

    var table2 = $('#invoicegtable').DataTable({
        createdRow: function(row, data, index) {
            $(row).addClass('selected')
        }
    });

    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });

    // 
    var table = $('#example3, #example4, #example5').DataTable();
    $('#example tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
    });

})(jQuery);