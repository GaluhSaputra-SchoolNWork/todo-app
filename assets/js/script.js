$(document).ready(function() {
    
    // Toggle Complete status task
    $('.toggle-completed').on('change', function(){
        const todoId = $(this).closest('li').data('id');
        const completed = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'index.php?action=updateStatus',
            method: 'POST',
            data: { id: todoId, completed: completed },
            dataType: 'json',
            success: function(response) {
                if(response.success){
                    location.reload();
                } else{
                    alert(response.message)
                }
            },
            error: function(){
                alert('Terjadi kesalahan dalam memperbarui status task.');
            }
        });
    })

    // Handle Edit task
   $('.edit-todo').on('click', function() {
        const todoId = $(this).closest('li').data('id');
        
        window.location.href = 'index.php?action=edit&id=' + todoId;
    });

     // Handle Delete task
     $('.delete-todo').on('click', function() {
        const todoId = $(this).closest('li').data('id');
        if (confirm("Apakah Anda yakin ingin menghapus task ini?")) {
        $.ajax({
            url: 'index.php?action=delete&id=' + todoId,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
               if(response.success){
                    location.reload();
                }else{
                    alert(response.message);
                }
            },
            error: function(){
                alert('Terjadi kesalahan dalam menghapus task.');
            }
        });
        }
    });
});