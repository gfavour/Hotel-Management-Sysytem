$(function () {
    $(".export2csvbtn").on('click', function (event) {
        // CSV
        var filename = $(".export2csvbtn").data("filename")
        var args = [$('#exptable'), filename + ".csv", 0];
        exportTableToCSV.apply(this, args);
    });
    $(".export2pdfbtn").on('click', function (event) {
        // txt
        var filename = $(".export2pdfbtn").data("filename")
        var args = [$('#exptable'), filename + ".txt", 0];
        exportTableToCSV.apply(this, args);
    });

    
    function exportTableToCSV($table, filename, type) {
        var startQuote = type == 0 ? '"' : '';
        var $rows = $table.find('tr').not(".no-csv"),
            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character
            // actual delimiter characters for CSV/Txt format
            colDelim = type == 0 ? '","' : '\t',
            rowDelim = type == 0 ? '"\r\n"' : '\r\n',
            // Grab text from table into CSV/txt formatted string
            csv = startQuote + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td,th');
                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text().trim().indexOf("is in cohort") > 0 ? $(this).attr('title') : $col.text().trim();
                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + startQuote;
        // Deliberate 'false', see comment below
        if (false && window.navigator.msSaveBlob) {
            var blob = new Blob([decodeURIComponent(csv)], {
                type: 'text/csv;charset=utf8'
            });

              window.navigator.msSaveBlob(blob, filename);

        } else if (window.Blob && window.URL) {
            // HTML5 Blob        
            var blob = new Blob([csv], { type: 'text/csv;charset=utf8' });
            var csvUrl = URL.createObjectURL(blob);

            $(this)
                .attr({
                    'download': filename,
                    'href': csvUrl
                });
        } else {
            // Data URI
            var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

            $(this)
                .attr({
                    'download': filename,
                    'href': csvData,
                    'target': '_blank'
                });
        }
    }

});