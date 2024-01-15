$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
    var data = $('input[name="subject_ids"]').val();
    $('body').on('change', '.subject-course', function () {
         var value = $(this).val() + ',';
         var checked = $(this).attr('data-checked');

         if (checked == 0) {
             data += value;
             $(this).attr('data-checked', 1);
         } else {
             $(this).attr('data-checked', 0);
             data = data.replace(value, '');
         }
        $('input[name="subject_ids"]').val(data);
    });

    var book = $('input[name="book_ids"]').val();
    $('body').on('change', '.subject-book', function () {
         var value = $(this).val() + ',';
         var checked = $(this).attr('data-checked');

         if (checked == 0) {
             book += value;
             $(this).attr('data-checked', 1);
         } else {
             $(this).attr('data-checked', 0);
             book = book.replace(value, '');
         }
        $('input[name="book_ids"]').val(book);
    });
});