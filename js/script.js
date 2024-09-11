document.getElementById('themeToggleBtn').addEventListener('click', function (e) {
    e.preventDefault();

    // Toggle the theme in the front-end
    let currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
    let newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    // Update body class for the theme
    if (newTheme === 'dark') {
        document.body.classList.remove('light-mode');
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
        document.body.classList.add('light-mode');
    }

    // Update form elements dynamically
    document.querySelectorAll('.form-control').forEach(element => {
        element.classList.toggle('dark-mode');
        element.classList.toggle('light-mode');
    });

    document.querySelectorAll('.card').forEach(element => {
        element.classList.toggle('dark-mode');
        element.classList.toggle('light-mode');
    });

    fetch('mainnote.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `theme=${newTheme}`
    })
    .then(response => response.text())
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