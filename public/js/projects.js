if (is_admin) {
    var project_btns = document.querySelectorAll('.project_button');
    project_btns.forEach(project => project.addEventListener('click', showOptions))
    var modal_arr = [];
    var all_modal = document.querySelectorAll(".modal");
    all_modal.forEach(modal => modal_arr.push(new bootstrap.Modal(modal, {})))
}

function showOptions(e) {
    e.preventDefault();
    // project_btns.forEach(project => project.nextElementSibling.classList.remove('active'))
    // this.nextElementSibling.classList.toggle('active')
    // myModal.show();
    modal_arr[this.dataset.id - 1].show();
}