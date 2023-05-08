import lightGallery from 'lightgallery'; 

var be_projects_grid = document.querySelectorAll('.be-projects-grid');

be_projects_grid.forEach(element => {
    lightGallery(document.getElementById( element.getAttribute('id') ), {
        selector: '.zoom-image'
    });
});


