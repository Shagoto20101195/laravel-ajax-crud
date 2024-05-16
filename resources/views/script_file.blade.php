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
    });
</script>