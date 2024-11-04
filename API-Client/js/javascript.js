// js/app.js

document.addEventListener('DOMContentLoaded', function() {
    var addModal = document.getElementById("addModal");
    var editModal = document.getElementById("editModal");
    var addBtn = document.getElementById("myBtn");
    var closeBtns = document.getElementsByClassName("close");
    var cancelAddBtn = document.getElementById("btn-cancel-add");
    var cancelEditBtn = document.getElementById("btn-cancel-edit");
    var editBtns = document.getElementsByClassName("btn-edit-county");

    // Function to open modal
    function openModal(modal) {
        modal.style.display = "flex";
    }

    // Function to close modal
    function closeModal(modal) {
        modal.style.display = "none";
    }

    // Open add modal
    addBtn.onclick = function() {
        openModal(addModal);
    }

    // Open edit modal
    Array.from(editBtns).forEach(function(btn) {
        btn.onclick = function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            openModal(editModal);
        }
    });

    // Close modals
    Array.from(closeBtns).forEach(function(btn) {
        btn.onclick = function() {
            closeModal(this.closest('.modal'));
        }
    });

    cancelAddBtn.onclick = function() {
        closeModal(addModal);
    }

    cancelEditBtn.onclick = function() {
        closeModal(editModal);
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            closeModal(event.target);
        }
    }
});