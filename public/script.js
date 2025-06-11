document.addEventListener('DOMContentLoaded', () => {
    const updateButtons = document.querySelectorAll('.updateStudentBTN');
    const deleteForms = document.querySelectorAll('form[action*="deleteStudent"]');

    updateButtons.forEach(button => {
        button.addEventListener('click', () => {
            const form = document.querySelector('#updateStudentForm');
            form.action = `/updateStudent/${button.getAttribute('data-id')}`;
            form.querySelector('input[name="firstname"]').value = button.getAttribute('data-firstname');
            form.querySelector('input[name="lastname"]').value = button.getAttribute('data-lastname');
            form.querySelector('input[name="middlename"]').value = button.getAttribute('data-middlename');
            form.querySelector('input[name="age"]').value = button.getAttribute('data-age');
            form.querySelector('select[name="gender"]').value = button.getAttribute('data-gender');
            form.querySelector('input[name="address"]').value = button.getAttribute('data-address');
        });
    });

    deleteForms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const confirmation = confirm('Are you sure you want to delete this student?');
            if (confirmation) {
                form.submit();
            }
        });
    });
});