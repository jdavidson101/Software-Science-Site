/**
 * index.js
 * _________
 * This file populates the 'account' page with the database. It will look cool.
 */

$(document).ready(function() {
    $('#admintable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../php/table.php"
    } );
} );