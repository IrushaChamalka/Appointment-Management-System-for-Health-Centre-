
document.addEventListener('DOMContentLoaded', function() {
    const boxes = document.querySelectorAll('.box');
    const modal = document.getElementById('staffModal');
    const modalContent = document.querySelector('.modal-content');
    const closeModal = document.querySelector('.close');

    boxes.forEach(box => {
        box.addEventListener('click', function() {
            const staffName = box.querySelector('h3').textContent;
            const staffPosition = box.querySelector('span').textContent;

            document.getElementById('modal-name').textContent = staffName;
            document.getElementById('modal-email').textContent = staffPosition;

            modal.style.display = "block";
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = "none";
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});

