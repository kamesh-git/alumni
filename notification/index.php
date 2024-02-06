<?php
$pagetitle = "alumni";
include("../template/head.php");
$page = "notification";
include("../template/navbar.php");
?>

<body>
    <div class="container mt-5 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Notification+
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="mb-4">Add Notification</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addNotification.php" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Notifications</h2>
        <div id="notifications" class="row mt-3">
            <div class="alert alert-danger" role="alert">
                No Notifications
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fetch notifications from PHP script
        fetch('get_notifications.php')
            .then(response => response.json())
            .then(data => {
                const notificationsContainer = document.getElementById('notifications');
                if(data.length > 0 ) notificationsContainer.innerHTML = "";

                data.forEach(notification => {
                    const card = document.createElement('div');
                    card.classList.add('col-md-12', 'mb-3');

                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card', 'h-100', 'cursor-pointer');

                    const cardTitle = document.createElement('div');
                    cardTitle.classList.add('card-body');
                    cardTitle.innerHTML = `<h5 class="card-title">${notification.title}</h5>
                    <p class = "m-0">Created By:</p>
                    <small class="card-text fw-light">${notification.name}</small><br>
                    <small class="card-text fw-light">${notification.email}</small><br>
                    <small class="card-text fw-light">${notification.created_at.date.split(" ")[0]}</small>`;

                    
                    cardBody.appendChild(cardTitle);

                    card.appendChild(cardBody);
                    notificationsContainer.appendChild(card);

                    // Add click event to toggle description display
                    card.addEventListener('click', () => {
                        const title = notification.title;
                        const description = notification.description;

                        // Create the modal content
                        const modalContent = `
                            <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="notificationModalLabel">${title}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>${description}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        // Append the modal content to the body
                        document.body.insertAdjacentHTML('beforeend', modalContent);

                        // Show the modal
                        const notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'));
                        notificationModal.show();

                        // Remove the modal from the DOM after it's hidden
                        notificationModal._element.addEventListener('hidden.bs.modal', function () {
                            document.getElementById('notificationModal').remove();
                        });
                    });

                });
            })
            .catch(error => console.error('Error fetching notifications:', error));
    </script>
</body>

</html>