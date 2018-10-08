$(function () {
    $("select").select2();
    $('table').DataTable();
    tinymce.init({
        selector: 'textarea'
    });
});