document.getElementById('themeToggleBtn').addEventListener('click', function (e) {
    e.preventDefault();

    fetch('mainnote.php', {
        method: 'POST',
    })
    .then(response => response.text())
    .then(theme => {
        if (theme === 'dark') {
            document.body.classList.remove('light-mode');
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
        }
        
        // Update elements dynamically
        document.querySelectorAll('.form-control').forEach(element => {
            element.classList.toggle('dark-mode');
            element.classList.toggle('light-mode');
        });

        document.querySelectorAll('.card').forEach(element => {
            element.classList.toggle('dark-mode');
            element.classList.toggle('light-mode');
        });
    })
    .catch(error => console.error('Error:', error));
});


function openEditModal(noteId, title, description, tag) {
    // Set the values in the modal input fields
    document.getElementById('note_id').value = noteId;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_tag').value = tag;
    
    // Open the modal
    var modal = new bootstrap.Modal(document.getElementById('editNoteModal'));
    modal.show();
}