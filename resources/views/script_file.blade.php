<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_student').click(function(event)
        {
            event.preventDefault();
            var email = $('#email').val();
            var name = $('#name').val();
            $.ajax({
                url: "{{ route('add') }}",
                method: "POST",
                data: {
                    email: email,
                    name: name
                },
                success: function(response) {
                    alert('Data added successfully');
                    $('#addModal').modal('hide');
                    $('#addStudent')[0].reset();
                    $('.table').load(location.href + ' .table');
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errMsg = '';
                    $.each(errors, function(key, value) {
                        errMsg += '<p class="text-danger">' + value + '</p>';
                    });
                    $('.errMsg').html(errMsg);
                }
            });
        });

        // Click edit button to view edit form
        $('.update_student').click(function(event)
        {
            event.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            $('#update_id').val(id);
            $('#update_name').val(name);
            $('#update_email').val(email);
        });

        // Update data
        $('.update_student_data').click(function(event)
        {
            event.preventDefault();
            var id = $('#update_id').val();
            var name = $('#update_name').val();
            var email = $('#update_email').val();
            $.ajax({
                url: "{{ route('update') }}",
                method: "POST",
                data: {
                    id: id,
                    name: name,
                    email: email
                },
                success: function(response) {
                    alert('Data updated successfully');
                    $('#updateModal').modal('hide');
                    $('.table').load(location.href + ' .table');
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errMsg = '';
                    $.each(errors, function(key, value) {
                        errMsg += '<p class="text-danger">' + value + '</p>';
                    });
                    $('.errMsg').html(errMsg);
                }
            });
        });

        // Delete data
        $('.delete_student').click(function(event)
        {
            event.preventDefault();
            var id = $(this).data('id');
            
            if(confirm('Are you sure you want to delete this student?'))
            {
                $.ajax({
                    url: "{{ route('delete') }}",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        if(response.status == "success")
                        {
                            alert('Student deleted successfully');
                            $('.table').load(location.href + ' .table');
                        }
                    }
                });
            }
        });
    });
</script>