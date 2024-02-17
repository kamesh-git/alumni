<?php
if (isset($_SESSION["admin"]))
    if ($_SESSION["admin"])
        echo '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGalleryModal" >Add Gallery Photos +</button>'
            ?>


        <div class="row p-2" id="gallery">
        <div class="alert alert-danger" role="alert">
                No gallery
            </div>
        </div>
        </div>
        <script>
            // Fetch gallerys from PHP script
            function galleryinit() {
                fetch('/alumni/gallery/get_gallery.php')
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        const galleryContainer = document.getElementById('gallery');
                        if (data.length > 0) galleryContainer.innerHTML = "";

                        data.forEach(gallery => {
                            const card = document.createElement('div');
                            card.classList.add('col-md-3', 'mb-3');

                            const cardBody = document.createElement('div');
                            cardBody.classList.add('card', 'h-100', 'cursor-pointer');

                            const cardTitle = document.createElement('div');
                            cardTitle.classList.add('card-body');
                            cardTitle.innerHTML = `
                                        <?php
if (isset($_SESSION["admin"]))
    if ($_SESSION["admin"])
        echo '
                <button type="button" class="btn btn-outline-danger delete-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                    </svg>
                    </button>';

?>
    <div style="
    height: 272px;
    overflow-y: scroll">
                    <img style="width:100%;" src="/alumni/galleryphoto/${gallery.photo}">
                    </div>
                    `


                    cardBody.appendChild(cardTitle);
                    card.appendChild(cardBody);

                    galleryContainer.appendChild(card);

                    // delete click event to toggle description display
                    if (card.querySelector(".delete-button")) {
                        card.querySelector(".delete-button").addEventListener('click', () => {
                            const URI = `/alumni/gallery/deleteGallery.php?id=${gallery.ID}`
                            fetch(URI).then(resp => resp.text()).then(data => { console.log(data); location.reload(); }).catch(err => console.log(err))
                        })
                    }




                });
            })
            .catch(error => console.error('Error fetching notifications:', error));

    }

    galleryinit()
</script>